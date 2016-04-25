<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<?php
session_start();
include "dataLogin.php";
//include "pageVerification.php";

$i = $_SESSION['email'];

    $query = "SELECT * FROM ACCOUNT WHERE EMAIL = '$i'";
    $r = mysql_query($query);
    $row = mysql_fetch_array($r);
    $username =$row['USERNAME'];
    $city = $row['CITY'];
    $accountnum = $row['ACCOUNTNUM'];
    $state = $row['STATE'];
    $zip = $row['ZIP'];
    $email = $row['EMAIL'];
    $fname = $row['FNAME']; 
    $lname = $row['LNAME'];
    $intnum = $row['INTNUM'];
    $description = $row['COVERSUM'];   

    $query2 = "SELECT * FROM INTEREST WHERE INTNUM = '$intnum'";
    $s = mysql_query($query2);
    $row2 = mysql_fetch_array($s);

    $interest = $row2['INTVALUE']; 

    $query3 = "SELECT * FROM ACCDEG WHERE ACCOUNTNUM = '$accountnum'";
    $a = mysql_query($query3);
    $row3 = mysql_fetch_array($a);

    $accdeg = $row3['DEGNUM']; 

    $query4 = "SELECT * FROM DEGREE WHERE DEGNUM = '$accdeg'";
    $a = mysql_query($query4);
    $row4 = mysql_fetch_array($a);

    $degree = $row4['DEGREE']; 
    $gradyear = $row4['GRADDATE'];

    $query5 = "SELECT * FROM DEGNAME WHERE DEGREE = '$degree'";
    $b = mysql_query($query5);
    $row5 = mysql_fetch_array($b);

    $degreename = $row5['DEGNAME']; 


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


<style>
      #map {
        width: 500px;
        height: 400px;
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
                <li><a href="inbox.php">Inbox</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

                

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><? echo $fname; echo " "; echo $lname; ?></h3>
              <A href="edit.php" >Edit Profile</A>
            </div>
            <div class="panel-body">
              <div class="row">
                <?php
                  $i = $_SESSION['email'];
                  $query = "SELECT * FROM ACCOUNT WHERE EMAIL = '$i'";
                  $r = mysql_query($query);
                  $row = mysql_fetch_array($r);
                  $accountnum = $row['ACCOUNTNUM'];
                  $select_query = "SELECT images_path FROM  images_tbl WHERE ACCOUNTNUM='$accountnum'";
                  $sql = mysql_query($select_query) or die(mysql_error());   
                  while($row = mysql_fetch_array($sql)){
                    $image="uploads/".$row['images_path'];
                    echo '<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> </div>';
                  }
                ?>
                

                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Username:</td>
                        <td> <? echo $username ?> </td>
                      </tr>
                    <tr>
                      <tr>
                        <td>Degree:</td>
                        <td> <? echo $degreename ?> </td>
                      </tr>
                    <tr>
                        <td>Grad Year:</td>
                        <td><? echo $gradyear ?></td>
                      </tr>
                        <tr>
                        <td>City:</td>
                        <td><? echo $city ?></td>
                      </tr>
                      <tr>
                        <td>State:</td>
                        <td><? echo $state ?></td>
                      </tr>
                      <tr>
                        <td>Interest:</td>
                        <td><? echo $interest ?></td>
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
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                   
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
 <div class="panel-body">
  <center>
<div id="map"></div>
    <script>
      function initMap() {
        var myLatLng = {lat: 38.346515, lng: -75.6056542};
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
          center: myLatLng,
          zoom: 15
        });
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
</div>
</center>

</body>
</html>
