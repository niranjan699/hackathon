<?php
$config = include('config.php');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$name = $phone = $email = $address = $locaton = $city = $pincode = $password = "";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	echo('location:notFound.html');
}else{
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$locaton = $_POST["location"];
	$city = $_POST["city"];
	$pincode = $_POST["pincode"];
	$password = $_POST["password"];

	$dbserver = $config['dbserver'];
	$dbuser = $config['dbuser'];
	$dbpass = $config['dbpass'];
	$dbname = $config['dbname'];


	$conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "INSERT INTO users (name,phone,email,address,location,city,pincode,password) values('$name','$phone','$email','$address','$location','$city','$pincode','$password');";
	echo($sql);
	
	if ($conn->query($sql) === TRUE) {
		$msg = 'Successfully created your profile';
    	header('location:index.php?msg='.$msg);
	} else {
		$msg = 'Failed to create your profile';
    	header('location:index.php?msg='.$msg);
	}
	$conn->close();
}

?>