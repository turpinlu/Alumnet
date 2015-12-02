<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<?php
session_start();
include "dataLogin.php";


$email = mysql_fetch_assoc("SELECT EMAIL FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$fname = mysql_query("SELECT FNAME FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$lname = mysql_query("SELECT LNAME FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$degree = mysql_query("SELECT DEGNAME FROM DEGNAME WHERE DEGNAME.DEGREE = DEGREE.DEGREE AND ACCOUNTNUM = '$i'");

$reason = mysql_query("SELECT INTVALUE FROM INTEREST WHERE INTEREST.INTNUM = ACCDEG.DEGNUM AND ACCDEG.ACCOUNTNUM = ACCOUNT.ACCOUTNUM AND ACCOUNTNUM = '$i'");

$gradyear = mysql_query("SELECT GRADDATE FROM DEGREE WHERE DEGREE.DEGNUM =  WHERE ACCOUNTNUM = '$i'");

$city = mysql_query("SELECT CITY FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$state = mysql_query("SELECT STATE FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$description = mysql_query("SELECT COVERSUM FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$phoneNum = mysql_query("SELECT ZIP FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");


$email = $_POST['email'];
$usernameHOLDER = $_POST['usernameHOLDER'];
$userID = $_POST['userID'];
$securityHolder = $_POST['securityHolder'];
$password = $_POST['password'];

?>

<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<head>
<title>Alumnet&#153 - Networking Made Easy</title>
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="theme.min.css">
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
<body>


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
                <li class="active"><a href="profile.php">Profile</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
            <form role="search" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                </div>
            </form>
        </div>
    </nav>

<div class="container">
    <h1>Edit Profile</h1>
    <hr>
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
<div class="col-md-10 col-lg-10 " align="center"> <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> </div>
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>"" method = "post">

            <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newphoneNum" value = "<? echo $phoneNum ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newemail" type="text" value = "<? echo $email ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Degree:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newdegree" type="text" value = "<? echo $degree ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Graduation Year:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newgradyear" type="text" value = "<? echo $gradyear ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">City:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newcity" type="text" value= "<? echo $city ?>" >
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">State:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newstate" type="text" value= "<? echo $state ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Description:</label>
            <div class="col-lg-8">
              <input class="form-control" name="description" type="textbox" value= "<? echo $description ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Reason:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_reason" class="form-control">
                  <option value="looking">Looking</option>
                  <option value="hiring">Hiring</option>
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" name="newPassword" type="password" value="<?echo $password ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="newPassword" type="password" value="<?echo $password ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">

              <input type="button" value="Update" name="update">
              <span></span>

              <input type="button" value="Cancel" onclick="location='profile.php'" > 

            </div>
          </div>


        </form>
      </div>
  </div>
</div>
<hr>


</body>
</html>
