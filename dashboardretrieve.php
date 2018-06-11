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
$user=$_SESSION['user_id'];

$sql1 = "SELECT SUM(units) as total from donations";
$sql2="SELECT SUM(units) as contrib from donations where donorId='$user'  ";

$result = mysqli_query($conn, $sql1);
$result1 = mysqli_query($conn, $sql2);
  $a = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	//$row = mysqli_fetch_assoc($result)
	
	$i = 0;
    while($row = mysqli_fetch_assoc($result)) {

		$a[$i] = $row;

		$i++;


    }
   

while($row = mysqli_fetch_assoc($result1)) {

		$a[$i] = $row;

		$i++;


    }



  
	echo json_encode($a);

}

else {
    echo "0 results";
}

mysqli_close($conn);

?>
