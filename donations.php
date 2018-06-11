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
<script>
  
      

$(document).ready(function()
    {

  var userid = "<?php echo $_SESSION['user_id'] ?>";
  var userName = "<?php echo $_SESSION['name'] ?>";
  var n=11;

  var content='<div>Place<br/>Venue<br/>Time<br/><br/><br/><br/><button>click</button>';
  var id=[];
  var donorId=[];
  var foodType=[];
  var units=[];
  var foodDescription=[];
  var date=[];
  var status=[];
  var donorname=[];
  var phoneno=[];
  var location=[];
 $("#Welcometext").text("Welcome "+userName);
 
  $("#add_form").validate({

        rules: {
            fname: {
                required: true
            },
            descr: {
                required: true
            },
           fquantity: {
                required: true,
                digits:true
            },
            
        },
        messages: {
            fname: {
                required: "Please enter Food name."
            },
            descr: {
                required: "Please enter Description of Food. "
            },
          fquantity: {
                required: "Please enter Quantity of Food."
            }
           
        },
    submitHandler: function(form) {
            var fname=$("#fname").val();
            var descr=$("#descr").val();
            var fquantity=$("#fquantity").val();
         
            var data={fname:fname,descr:descr,fquantity:fquantity}
    
   $.ajax({
    
   type : 'POST',
   url  : 'pushdata.php',
   data : data,
   beforeSend: function()
   { 
 
   },
   success :  function(response)
      {        
      	alert('Post SuccessFull ');
     $('#myModal').modal('toggle');    

        window.location.reload(true);
     }
   });
    return false;
        }
       });
        
$(function(){
 $.get("retrievedata.php",function(data)
  {
  var obj = JSON.parse(data);
  n = obj.length;
  for(i=0;i<n;i++)
  id[i]=obj[i]['id'];
for(i in id)
  {
    donorId[i]=obj[i]['donorId'];
    foodType[i]=obj[i]['foodType'];
    units[i]=obj[i]['units'];
    foodDescription[i]=obj[i]['foodDescription'];
    date[i]=obj[i]['date'];
    status[i]=obj[i]['status'];
    donorname[i]=obj[i]['name'];
    phoneno[i]=obj[i]['phone'];
    location[i]=obj[i]['location'];
  if(i%4==0)
        {
          $("#accordion").append('<div> <div class="row"');
          
        }
       
          if(userid!=donorId[i]){
        $("#accordion").append('<div class="col-sm-3"> <div class="card" style="margin:0px; margin-bottom: 50px;  padding: 0px; "><div class="card-block" align="center"   ><img class="card-img-top" src="images/login.jpg" width="100%"  ><table style="margin: 10px"><tr><td>Item</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>'+foodType[i]+'</td></tr><tr><td>Quantity</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>'+units[i]+'</td></tr></table><button class="bt" id='+i+' style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center"  >VIEW DETAILS</button><button class="btv" id='+i+' style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center" >REQUEST</button></div></div></div>');
			}
   
   else
   {

		$("#accordion").append('<div class="col-sm-3"> <div class="card" style="margin:0px; margin-bottom: 50px;  padding: 0px; "><div class="card-block" align="center"   ><img class="card-img-top" src="images/login.jpg" width="100%"  ><table style="margin: 10px"><tr><td>Item</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>'+foodType[i]+'</td></tr><tr><td>Quantity</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>'+units[i]+'</td></tr></table><button class="bt" id='+i+' style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center"  >VIEW DETAILS</button>');

    }




          if(i%4==0)
          {
            $("#accordion").append('</div></div>'); 
          }

 }




});
});



 $('body').on('click','.bt',function() {
       var name=$(this).attr('id');

       $('#foodType').text(foodType[name]);
       $('#unit').text(units[name]);
       $('#name').text(donorname[name]);
       $('#phone').text(phoneno[name]);
       $('#location').text(location[name]);
       $('#foodDescription').text(foodDescription[name]);
       $('#haha').modal('show'); 
    });


 $('#close_detail').on('click', function () {
   $('#haha').modal('none');
    });


 $('body').on('click','.btv',function() {
       var name=$(this).attr('id');
       var donationid=id[name];
       var donorid=donorId[name];
       var food=foodType[name];
	   var data={donorid:donorid,donationid:donationid}
 $.ajax({
    
   type : 'POST',
   url  : 'sendRequest.php',
   data : data,
   beforeSend: function()
   { 
 
   },
   success :  function(response)
      {   alert("request done");     
    window.location.reload();
     }
   });
    return false;

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
    <div id="accordion">
    
    </div>
 </div>

<div id="haha" class="modal"  id="mm">
      
        <!-- Modal content -->
        <div class="modal-content" style="margin:70px;">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="container">
          <div class="row">
          <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-5" align="center">
          <img class="card-img-top" src="images/login.jpg" alt="Card image cap" width="100%" height="auto" style="border: 2px solid #545454;padding:0px;margin: 50px;">
          </div>
          <div align="center" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
          <br/>
          <table>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Food Type</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td id="foodType"class="desc_table" style="padding: 10px; margin: 20px; "></td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Units</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" id="unit" style="padding: 10px; margin: 20px; ">10</td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Description</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" id="foodDescription" style="padding: 10px; margin: 20px; "></td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Donor Name</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td  id="name" class="desc_table" style="padding: 10px; margin: 20px; "></td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Donor Phone Number</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" id="phone" style="padding: 10px; margin: 20px; "></td>
              </tr>

          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Pickup Location</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table"id="location" style="padding: 10px; margin: 20px; "></td>
              </tr>
            
          </table>
        
          <br><br><br>
         
        
          </div>
          </div>
          </div>
        </div>

</div>

 


<!--Modal for entry-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please enter  Donation Details</h4>
        </div>
        <div class="modal-body">
          <form method="POST" id="add_form">
            <div class="form-group">
              <label for="fname"> Food Item Name </label>
            <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <div class="form-group">
              <label for="descr">Description:</label>
              <input type="text" class="form-control" id="descr" name="descr">
            </div>
            <div class="form-group">
              <label for="fquantity">Quantity</label>
              <input type="text" class="form-control" id="fquantity" name="fquantity">
            </div>
            
            <button type="submit" id="create_post" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>  
    </div>
  </div>
  
    
    </div>
</div>

    </div>

  </div>
</div>

 
<!--<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>-->

</body>
</html>