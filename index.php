<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Hunger Heroes</title>

<style>
body, html {
    height: 100%;
}

.bg {
    background-image: url("images/cover.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

 input { 
  border-width:2px;
  border-color:#545454;
  padding : 5px;
  margin : 5px;
}

input[type="submit"] { 
  border-width:2px;
  border-color:#545454;
  background-color:#545454;
  padding:7px;
  margin : 10px;
  width:220px;
  font-weight:bold;
  color:#ffffff;
}
</style>

</head>
<body class='bg'>

 
<br><br><br><br><br><br><br><br><br>

<section style="margin-right: 450px;margin-left: 450px; background: #fff; position: fixed;">

 
<div align="center" style="padding-right: 40px;padding-left: 40px;">
<br><br>
<?php
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
  echo('<p align="center" style="padding-right:20px;"><font size="2" color="#545454">'.$msg.'</font></p>');
}
?>
<br>
<form action="validate.php" method="post">
<font size="4" color="#545454"><strong>LOGIN </strong></font>
<br><br>
<input type="text" name="email" placeholder="EMAIL" size="30" style="border:2px solid #545454;border-radius:5px;" required /><br>
<input type="password" name="password" placeholder="PASSWORD" size="30" style="border:2px solid #545454;border-radius:5px;" required/><br>
<input type="submit" value="LOGIN" size="30" style="border:2px solid #545454;border-radius:7px;" />

<p align="right" style="padding-right:20px;"><font size="2" color="#545454">New User? <a href="signUp.html">Click here to Sign Up </a></font></p>

</form>
<br>
</div>
 
</section>
</body>
</html>