<?php
$config = include('config.php');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

$id = $status = "";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	echo('location:notFound.html');
}else{
	$id = $_POST["id"];
	$status = $_POST["status"];

	$dbserver = $config['dbserver'];
	$dbuser = $config['dbuser'];
	$dbpass = $config['dbpass'];
	$dbname = $config['dbname'];

	$conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = 'Update notifications set status = 1 where id ='.$id.';';

	if ($conn->query($sql) === TRUE) {
		$sql = 'Select * from notifications where id= '.$id.';';
		$result = $conn->query($sql);
		if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
		}
		$row = $result->fetch_assoc();
		 $sql = 'Update requests set status="'.$status.'" where id = '.$row['requestId'];

		if ($conn->query($sql) === TRUE) {
			$sql = 'Select * from requests where id = '.$row['requestId'].';';
			$result = $conn->query($sql);
			if (!$result) {
			trigger_error('Invalid query: ' . $conn->error);
			}
			$row = $result->fetch_assoc();
			$donationStatus = $status == 'ACCEPTED'? 'DONATED' : 'PENDING';
			 $sql = 'Update donations set status="'.$donationStatus.'" where id = '.$row['donationId'].';';

			if ($conn->query($sql) === TRUE) {
				header('location:notifications.php');
			} else {
				echo "Error updating record: " . $conn->error;
			}
			 
			 

			} else {
			    echo "Error updating record: " . $conn->error;
		}

	} else {
	    echo "Error updating record: " . $conn->error;
	}
	$conn->close();
}
?>
