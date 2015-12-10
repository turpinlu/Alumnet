<!DOCTYPE html>
<?php 
session_start();
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
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
<header class="header">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="content">
                  <div class="pull-middle">
                    <h1 class="page-header">Welcome to Alumnet</h1>
                    <p class="lead">Mobile applications are on the way!</p>
                    
                  </div>              
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1 text-center mt-100 mb-100">
                <div class="phone">
                    <img class="img-responsive img-rounded" src="watson.jpg">
                </div>
            </div>
          </div>
        </div>
    </header>  

</div>            
    
</html>