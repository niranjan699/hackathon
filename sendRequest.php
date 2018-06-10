
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION['user_id'])){
  header('location:index.php');
}
$config = include('config.php'); 

$dbserver = $config['dbserver'];
	$dbuser = $config['dbuser'];
	$dbpass = $config['dbpass'];
	$dbname = $config['dbname'];

	$conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 




$requesterid=$_SESSION['user_id'];
$donationid=$_POST['donationid']; 
$donorid=$_POST['donorid'];

$date = date("Y-m-d");




#$query = "insert into donations(id,donorId,foodType,units,foodDescription,date,status) values(NULL,'$donor_id','$units','$foodDescription','$date',NULL)";

#$query = "insert into donations(id,donorId,foodType,units,foodDescription,date,status) values(NULL,'2','10','dsfoodDescription','2018-08-08','Pending')";

$sql = 'INSERT INTO `requests` (id,requestorid,donationid,date,status)
VALUES (NULL,"'.$requesterid.'","'.$donationid.'","'.$date.'","Pending")';



if (mysqli_query($conn, $sql)) {
   # echo "New record created successfully";
	#header("Location:donations.php");
	echo "<script type='text/javascript'>alert('Successfull posted');</script>";
	
} else {
	#header("Location:.php");
	echo "<script type='text/javascript'>alert('Wrong Credentials');</script>";
	#exit();
    #echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql2="SELECT id from requests where donationid='$donationid'";
$result = $conn->query($sql2);
$row = $result->fetch_assoc();
$requstid=$row['id'];
echo "$requstid";

$sql4 = "UPDATE donations SET status='BLOCKED' WHERE id='$donationid'";
$sql3 = 'INSERT INTO `notifications` (id,requestid,receiverid,status)
VALUES (NULL,"'.$requstid.'","'.$donorid.'","Pending")';


if (mysqli_query($conn, $sql3)) {
   # echo "New record created successfully";
	#header("Location:donations.php");
	echo "<script type='text/javascript'>alert('Successfull posted');</script>";
	
} else {
	#header("Location:.php");
	echo "<script type='text/javascript'>alert('Wrong Credentials');</script>";
	#exit();
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql4)) {
   # echo "New record created successfully";
	#header("Location:donations.php");
	echo "<script type='text/javascript'>alert('Successfull posted');</script>";
	
} else {
	#header("Location:.php");
	echo "<script type='text/javascript'>alert('Wrong Credentials');</script>";
	#exit();
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$conn->close();



?>