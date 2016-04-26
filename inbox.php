<!DOCTYPE html>
<?php 
session_start();
include "pageVerification.php";
include "dataLogin.php";


    $i = $_SESSION['email'];

    $query = "SELECT ACCOUNTNUM FROM ACCOUNT WHERE EMAIL = '$i'";
    $sql2 = mysql_query($query);
    while($row2 = mysql_fetch_array($sql2)){
        $accnum = "{$row2[0]}";
    }

    //Start Messaging Queries

    $query3 = "SELECT * FROM `MESSAGES` WHERE `TO_USER` = '$accnum' AND `DELETED` = '0' ORDER BY `DATE_SENT` DESC";
    $sql = mysql_query($query3);
    while($row3 = mysql_fetch_array($sql)){
        $fromuser = "{$row3[2]}";
        $message = "{$row3[3]}";
        $date = "{$row3[6]}";
    }

    $query4 = "SELECT FNAME FROM ACCOUNT WHERE EMAIL = '$fromuser'";
    $r4 = mysql_query($query4);
    while($row4 = mysql_fetch_array($r4)){
        $fromfirst = "{$row4[0]}";
    }
    $query5 = "SELECT LNAME FROM ACCOUNT WHERE EMAIL = '$fromuser'";
    $r5 = mysql_query($query5);
    while($row5 = mysql_fetch_array($r5)){
        $fromlast = "{$row5[0]}";
    }

?>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

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
                <li><a href="inbox.php">Inbox</a></li>
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
                    <h1 id="forms">Inbox</h1>
                </div>
                <!-- Start of Inbox -->

                <table width='1200'>
                <tr><th>FROM</th><th>MESSAGE</th><th>DATE</th></tr>

                <?php
                    for(int x=0;x<10;x++){
                    echo "<tr><td>$fromfirst $fromlast</td><td>$message</td><td>$date</td></tr>";
                    }
                ?>

                </table>
            </div>
        </div>
        
    </div>
  </div>
</div>
</html>


