<?php

$config = include('config.php'); 

$dbserver = $config['dbserver'];
	$dbuser = $config['dbuser'];
	$dbpass = $config['dbpass'];
	$dbname = $config['dbname'];

	$conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


$sql = "SELECT * FROM donations,users where donations.donorId=users.id and donations.status='PENDING'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	//$row = mysqli_fetch_assoc($result)
	$a = array();
	$i = 0;
    while($row = mysqli_fetch_assoc($result)) {

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
