<!DOCTYPE html>
<?php 
session_start();
include "pageVerification.php";
include "dataLogin.php";

?>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">
<?php $fname = $_POST['fname'];?>
<?php $lname = $_POST['lname'];?>
<?php $degree = $_POST['degree'];?>
<?php $grad = $_POST['grad'];?>
<?php $city = $_POST['city'];?>
<?php $state = $_POST['state'];?>

<head>
<title>Alumnet&#153 - Networking Made Easy</title>
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="theme.min.css">
<link rel="stylesheet" href="style.js">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
    .navbar{
        margin-top: 20px;
    }
    .jumbotron{
        margin-top: 15px;
    }
</style>
</head>

<nav class="navbar navbar-custom navbar-static-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="index.php">
        <img src="logo2.png" style="max-height:50px;max-width:200px;padding-left:10px;">
    </a>
  </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li class="active"><a href="browse.php">Browse</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Search Alumnet Database</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                          <fieldset>
                              <div class="form-group">
                                  <label for="fname" class="col-lg-2 control-label">First Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php if(isset($fname)){ echo htmlspecialchars($fname);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="lname" class="col-lg-2 control-label">Last Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php if(isset($lname)){ echo htmlspecialchars($lname);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="degree" class="col-lg-2 control-label">Degree</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="degree" name="degree" placeholder="Degree" value="<?php if(isset($degree)){ echo htmlspecialchars($degree);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="grad" class="col-lg-2 control-label">Graduation Year</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="grad" name="grad" placeholder="Graduation" value="<?php if(isset($grad)){ echo htmlspecialchars($grad);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="city" class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php if(isset($city)){ echo htmlspecialchars($city);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="state" class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php if(isset($state)){ echo htmlspecialchars($state);} ?>">
                                  </div>
                              </div>
                               <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
                </fieldset>
                </form>
                <?php include "browse_form.php";?>
              </div>   
             </div>            
           </div>
          </div> 
          <div class="col-lg-6">
              <?php include "browse_display.php";?>
          </div>   
        </div>
      </div>
    </div>
  </div>
</div>
    
   <!-- <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '0b99ac80-5fc3-44b9-9271-c80c2153292f', f: true }); done = true; } }; })();</script>
    -->
</html>


