<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<?php
session_start();
include "dataLogin.php";

$i = $_SESSION['userID'];

$email = mysql_query("SELECT EMAIL FROM ACCOUNT WHERE ACCOUNTNUM = '$i'");

$fname = "SELECT FNAME FROM ACCOUNT WHERE ACCOUNTNUM = '$i'";

$lname = "SELECT LNAME FROM ACCOUNT WHERE ACCOUNTNUM = '$i'";

$degree = "SELECT DEGNAME FROM DEGNAME WHERE DEGNAME.DEGREE = DEGREE.DEGREE AND ACCOUNTNUM = '$i'";

$reason = "SELECT INTVALUE FROM INTEREST WHERE INTEREST.INTNUM = ACCDEG.DEGNUM AND ACCDEG.ACCOUNTNUM = ACCOUNT.ACCOUTNUM AND ACCOUNTNUM = '$i'";

$gradyear = "SELECT GRADDATE FROM DEGREE WHERE DEGREE.DEGNUM =  WHERE ACCOUNTNUM = '$i'";

$city = "SELECT CITY FROM ACCOUNT WHERE ACCOUNTNUM = '$i'";

$state = "SELECT STATE FROM ACCOUNT WHERE ACCOUNTNUM = '$i'";

$description = "SELECT COVERSUM FROM ACCOUNT WHERE ACCOUNTNUM = '$i'";

$phoneNum = "SELECT ZIP FROM ACCOUNT WHERE ACCOUNTNUM = '$i'";


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
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $fname; echo $lname?></h3>
              <A href="edit.php" >Edit Profile</A>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> </div>

                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Degree:</td>
                        <td><? echo $degree ?></td>
                      </tr>
                    <tr>
                        <td>Grad Year:</td>
                        <td><? echo $gradyear ?></td>
                      </tr>
                       <tr>
                        <td>City,State:</td>
                        <td><? echo $city ?>, <? echo $state; ?></td>
                      </tr>
                      <tr>
                        <td>Reason:</td>
                        <td><? echo $reason ?></td>
                      </tr>
                       <tr>
                        <td>Description:</td>
                        <td><? echo $description ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?  echo $email ?></td>
                      </tr>
                        <td>Phone Number:</td>
                        <td><br><? echo $phoneNum ?>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>
