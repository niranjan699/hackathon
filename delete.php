<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "awt";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
if(mysqli_query($conn,"delete from company_details where name='$name'"))
{
	echo "Record deleted!";
}

?>
