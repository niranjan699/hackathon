
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


$userid=$_SESSION['user_id'];
$result2= mysqli_query($conn,"select id from users where ");

$foodname=$_POST['fname']; 
$description=$_POST['descr']; 
$fquant=$_POST['fquantity'];
 


$donor_id = $_SESSION['user_id'];

$units = "10";

$foodDescription = "sd";
#$date = "2018-08-08";
$date = date("Y-m-d");
echo($date);
#$query = "insert into donations(id,donorId,foodType,units,foodDescription,date,status) values(NULL,'$donor_id','$units','$foodDescription','$date',NULL)";

#$query = "insert into donations(id,donorId,foodType,units,foodDescription,date,status) values(NULL,'2','10','dsfoodDescription','2018-08-08','Pending')";

$sql = 'INSERT INTO `donations` (id,donorId,foodName,units,foodDescription,date,status)
VALUES (NULL,"'.$donor_id.'","'.$foodname.'","'.$fquant.'","'.$description.'","'.$date.'","Pending")';


if (mysqli_query($conn, $sql)) {
   # echo "New record created successfully";
	header("Location:donations.php");
	echo "<script type='text/javascript'>alert('Successfull posted');</script>";
	exit();
} else {
	#header("Location:.php");
	echo "<script type='text/javascript'>alert('Wrong Credentials');</script>";
	exit();
    #echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$conn->close();



?>