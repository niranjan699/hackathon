<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

$email = $password = "";
echo('Hello');

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	echo('location:notFound.html');
}else{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$dbserver = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "hackathon";

	$conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = 'SELECT * FROM users WHERE email LIKE "'.$email.'";';
	
	$result = $conn->query($sql);
	if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
	}
	if($result->num_rows == 0){
		header('location:index.php?msg=Invalid Username or Password');
	}else{
		$row = $result->fetch_assoc();
		if($row['password'] == $password){
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $row['name'];
			$_SESSION['user_id'] = $row['id'];
			header('location:donations.php');
		}else{
			header('location:index.php?msg=Invalid Username or Password');
		}
	}
	$conn->close();
}
?>
