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


  var n=11;
  var a=["Post1","Post1","Post1"];
  var headings=["Post1","Post1","Post1"];
  var content='<div>Place<br/>Venue<br/>Time<br/><br/><br/><br/><button>click</button>';

      for(i=0;i<17;i++)
      {
        if(i%4==0)
        {
          $("#accordion").append('<div> <div class="row"');
          
        }

         
        $("#accordion").append('<div class="col-sm-3"> <div class="card" style="margin:0px; margin-bottom: 50px;  padding: 0px; "><div class="card-block" align="center"   ><img class="card-img-top" src="images/login.jpg" width="100%"  ><table style="margin: 10px"><tr><td>Item</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>ITEM 1</td></tr><tr><td>Quantity</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>1234</td></tr></table><button class="bt" id='+i+' style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center"  >VIEW DETAILS</button></div></div></div>');


          if(i%4==0)
          {
            $("#accordion").append('</div></div>');
          }

      }



$("#add_form").validate({

        rules: {
            fname: {
                required: true
            },
            descr: {
                required: true
            },
           fquantity: {
                required: true
            },
            
        },
        messages: {
            fname: {
                required: "Please enter company name."
            },
            descr: {
                required: "Please enter Description."
            },
          fquantity: {
                required: "Please enter link for form."
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
    location.reload();
     }
   });
    return false;
        }
       });
        
      

      














       $('#home').on('click', function () {
   var n=11;
  var a=["Post1","Post1","Post1"];
  var headings=["Post1","Post1","Post1"];
  var content='<div>Place<br/>Venue<br/>Time<br/><br/><br/><br/><button>click</button>';

      for(i=0;i<17;i++)
      {
        if(i%4==0)
        {
          $("#accordion").append('<div> <div class="row"');
          alert(i);
        }


        $("#accordion").append('<div class="col-sm-3"><div id="panel" class="panel panel-primary"> <div class="card" style="margin:0px; margin-bottom: 50px;  padding: 0px; "><div class="card-block" align="center"   ><img class="card-img-top" src="images/temp/biriyani.jpg" width="100%"  ><table style="margin: 10px"><tr><td>Item</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>ITEM 1</td></tr><tr><td>Quantity</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>1234</td></tr></table><button class="bt"  style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center" onClick="showDetails("a","haha")" >VIEW DETAILS</button></div></div></div>,</div>');


          if(i%4==0)
          {
            $("#accordion").append('</div></div>');
          }

      }




    });
        $('body').on('click','.bt',function() {
       var name=$(this).attr('id');
        alert(name);
$('#haha').modal('show'); 
    });


 $('#close_detail').on('click', function () {
   $('#haha').modal('none');
    });


  $('#rfu').on('click', function () {
        alert('requst for u');
    });

$('#pending_r').on('click', function () {
        alert('pending requests');
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
      <h4 style="padding-top: 10px" class="text-center"><b>Welcome, User!</b></h4>
      <div style="display:table-cell; vertical-align:middle; text-align:center">
      <img src="images/admin.png" class="img-circle" height="100" width="100" alt="Avatar">
      </div>
      <ul class="nav nav-pills nav-stacked" style="padding-top: 10px">
        <li class="active"><a href="#section1">Home</a></li>
         <li class="active" data-toggle="modal" data-target="#myModal"><a href="#section1">Create Post</a></li>
         <li class="active"><a href="#section2">Your Requests</a></li>
        <li class="active"><a href="#section2">Requests For You</a></li>
        <li class="active"><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
	 
    <div class="col-sm-10 text-left" style="padding-top: 20px">

    


<div >
    <div id="accordion">
    

  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
    <div class="card" style="margin:0px; margin-bottom: 50px;  padding: 0px; ">
  
    <div class="card-block" align="center"  onClick="showDetails('a','haha')" >
    <img class="card-img-top" src="images/login.jpg" width="100%"  >

    <table style="margin: 10px">
      <tr><td>Item</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>ITEM 1</td></tr>
      <tr><td>Quantity</td><td>&nbsp;&nbsp; : &nbsp;&nbsp;</td><td>1234</td></tr>
    </table>
    <button id="bt'.$model.'" style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center" onClick="showDetails('a','haha')" >VIEW DETAILS</button>
    </div>
    </div>
  </div>



  

<div id="haha" class="modal">
      
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
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Biriyani</td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Units</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" style="padding: 10px; margin: 20px; ">10</td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Description</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" style="padding: 10px; margin: 20px; ">hmmm</td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Donor Name</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" style="padding: 10px; margin: 20px; ">SACHIN</td>
              </tr>
          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Donor Phone Number</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" style="padding: 10px; margin: 20px; ">9876543210</td>
              </tr>

          <tr style="border-bottom: 1px solid #545454;">
              <td class="desc_table" style="padding: 10px; margin: 20px; ">Pickup Location</td>
              <td class="desc_table" style="padding: 0px; margin: 0px; "> : </td>
              <td class="desc_table" style="padding: 10px; margin: 20px; ">JP nagar, Bangalore</td>
              </tr>
            
          </table>
        
          <br><br><br>
          <a href="#" ><button style="margin:10px; background-color:#545454; border: 0; color: #fff; padding: 5px 40px 5px 40px;" align="center" >REQUEST</button></a>
        
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