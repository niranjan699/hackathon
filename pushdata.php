<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "awt";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name=$_POST['cname']; 
$description=$_POST['descr']; 
$form=$_POST['formli'];
$list=$_POST['sheetli'];  

// Matching user input email and password with stored email and password in database.
$sql = 'INSERT INTO `company_details` (name, descr, form_link,stud_list)
VALUES ("'.$name.'", "'.$description.'", "'.$form.'", "'.$list.'")';

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


  
?>
