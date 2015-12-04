<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<?php
session_start();
include "dataLogin.php";

$i = $_SESSION['email'];

    $query = "SELECT * FROM ACCOUNT WHERE EMAIL = '$i'";
    $r = mysql_query($query);
    $row = mysql_fetch_array($r);

    $city = $row['CITY'];
    $accountnum = $row['ACCOUNTNUM'];
    $state = $row['STATE'];
    $zip = $row['ZIP'];
    $email = $row['EMAIL'];
    $fname = $row['FNAME']; 
    $lname = $row['LNAME'];
    $intnum = $row['INTNUM'];
    $description = $row['COVERSUM'];   

    $query1 = "SELECT DEGNAME.DEGNAME DEGREE.GRADDATE WHERE ACCDEG.DEGNUM=DEGREE.DEGNUM AND DEGREE.DEGREE=DEGNAME.DEGREE AND ACCOUNT.EMAIL = '$i' ";
    $s = mysql_query($query1);
    $row2 = mysql_fetch_array($s)

    $query2 = "SELECT INTVALUE FROM INTEREST WHERE INTEREST.INTNUM = ACCOUNT.INTNUM AND ACCOUNT.EMAIL = '$i' ";
    $v = mysql_query($query2);
    $row3 = mysql_fetch_array($v);


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
            <form role="search" action="<?php echo $_SERVER['PHP_SELF'];?>" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                </div>
            </form>
        </div>
    </nav>

                  <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><? echo $fname; echo " "; echo $lname; ?></h3>
              <A href="edit.php" >Edit Profile</A>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Degree:</td>
                        <td> <? echo $degree ?> </td>
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
