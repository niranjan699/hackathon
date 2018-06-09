<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "awt";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$result2= mysqli_query($conn,"select * from company_details");

echo "<COMPANIES>";  
while($data = mysqli_fetch_row($result2))
{
  echo "<COMPANY>";
  echo "<NAME>$data[1]</NAME>";
  echo "<DESCRI>$data[2]</DESCRI>";
  echo "<FORML>$data[3]</FORML>";
    echo "<STUDL>$data[4]</STUDL>";

  echo "</COMPANY>";
}
echo "</COMPANIES>";  
?>
