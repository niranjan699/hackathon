<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodshare";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$email=$_POST['email']; 
$password= ($_POST['pass']); 
  
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
// Matching user input email and password with stored email and password in database.
$result= mysqli_query($conn,"select * from user_details where email='$email' and Password='$password'");
$data = mysqli_num_rows($result);
if($data==1){
	$_SESSION['username'] = "lock";
echo "Successfully Logged in...";
}else{
echo "Email or Password is wrong...!!!!";
}
}
  
?>
