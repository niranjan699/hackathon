<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

if(!isset($_SESSION['user_id'])){
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hunger Heroes</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="default.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js">
  </script>
 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
 
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    label.error {
  color: #a94442;
  border-color: #ebccd1;
  font-size: 12px;
  /*padding:1px 20px 1px 20px;*/
}
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  
  
  
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  
  .card{
    transition: 0.1s;
    border-width: 2px;
  }
  
  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(54,54,55,0.99);
    cursor:pointer;
  }


  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Food', 'Wastage'],
  ['Sauce,Pasta,Rice', 18],
  ['Meat and Fish', 7],
  ['Fresh Fruit', 8],
  ['Dairy and Eggs', 10],
  ['Meals', 10],
  ['Bakery', 11],
  ['Drinks', 17],
  ['Fresh Vegeatables', 19]

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'House Hold Food Waste', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<script>
$(document).ready(function()
    {

  var userid = "<?php echo $_SESSION['user_id'] ?>";
  var userName = "<?php echo $_SESSION['name'] ?>";
  var n=11;
  var a=["Post1","Post1","Post1"];
  var headings=["Post1","Post1","Post1"];
  var content='<div>Place<br/>Venue<br/>Time<br/><br/><br/><br/><button>click</button>';
  var total;
  var contrib;

  $("#Welcometext").text("Welcome "+userName);
      




  $.get("dashboardretrieve.php",function(data)
  {
  var obj = JSON.parse(data);
  n = obj.length;
 total=obj[0]['total'];
  contrib=obj[1]['contrib'];

   $('#total').text("The total units of Food Saved "+total);
 $('#contrib').text("The total units of Food Saved by You "+contrib);

});



  

 });
</script>
  

<style>
  #accordion-resizer {
    padding: 10px;
    width: 100%;
    height:auto;
  }
  </style>
</head>

<body style="font-family: Georgia;">

<div id="header-wrapper">
  <div id="header-wrapper2">
    <div id="header" class="container" >
      <div id="logo">
        <h1><span style="color:white">SHARE THE FOOD</span></a></h1>
      </div>
      
    </div>
  </div>
</div>  

<div class="container-fluid text-center"> 

  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4 style="padding-top: 10px" id="Welcometext" class="text-center"><b></b></h4>
      <div style="display:table-cell; vertical-align:middle; text-align:center">
      <img src="images/admin.png" class="img-circle" height="100" width="100" alt="Avatar">
      </div>
      <ul class="nav nav-pills nav-stacked" style="padding-top: 10px">
        <li class="active"><a href="donations.php">Home</a></li>
         <li class="active" data-toggle="modal" data-target="#myModal"><a href="donations.php#section1">Create Post</a></li>
         <li class="active"><a href="requestStatus.php">Your Requests</a></li>
        <li class="active"><a href="notifications.php">Requests For You</a></li>
        <li class="active"><a href="dashboard.php">DashBoard</a></li>
        <li class="active"><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
   

<div class="col-sm-10 text-left" style="padding-top: 20px">

    


<div >
   <div class="row">
 
  <div class="col-sm-6" ">
<iframe width="420" height="345" src="https://www.youtube.com/embed/IoCVrkcaH6Q">
</iframe>
  </div>

  <div class="col-sm-6"  >
    <div id="piechart"></div>

    </div>


</div>
 <h1 id="total" align="center"></h1>
  <h1 id="contrib" align="center"></h1> 
</div>


</body>
</html>