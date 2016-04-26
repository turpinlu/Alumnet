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
    body{ margin-top:50px;}
    .nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
    .tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
    .tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
    .tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
    .tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
    .tab-pane .list-group .glyphicon { margin-right:5px; }
    .tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
    a.list-group-item.read { color: #222;background-color: #F3F3F3; }
    hr { margin-top: 5px;margin-bottom: 10px; }
    .nav-pills>li>a {padding: 5px 10px;}
    .ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
    .ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
    .ad a.url {color: #093;text-decoration: none;}
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
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Mail <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Mail</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Tasks</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 col-md-10">
            <!-- Split button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default">
                    <div class="checkbox" style="margin: 0;">
                        <label>
                            <input type="checkbox">
                        </label>
                    </div>
                </button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">All</a></li>
                    <li><a href="#">None</a></li>
                    <li><a href="#">Read</a></li>
                    <li><a href="#">Unread</a></li>
                    <li><a href="#">Starred</a></li>
                    <li><a href="#">Unstarred</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
                   <span class="glyphicon glyphicon-refresh">Refresh</span></button>
            <!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    More <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Mark all as read</a></li>
                    <li class="divider"></li>
                    <li class="text-center"><small class="text-muted">Select messages to see more actions</small></li>
                </ul>
            </div>
            <div class="pull-right">
                <span class="text-muted"><b>1 &#9866 50</b> of <b>277</b></span>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
            <hr />
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right" style="font-color:black;">42</span> Inbox </a>
                </li>
                <li><a href="">Starred</a></li>
                <li><a href="">Important</a></li>
                <li><a href="">Sent Mail</a></li>
                <li><a href=""><span class="badge pull-right">3</span>Drafts</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                <li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>
                    Social</a></li>
                <li><a href="#messages" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>
                    Promotions</a></li>
                <li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
                </span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                            <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                        display: inline-block;">Jeremy Powell</span> <span class="">Not sure where to work?</span>
                            <span class="text-muted" style="font-size: 11px;">- Call me!</span> <span
                                class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span></a><a href="#" class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                        </label>
                                    </div>
                                    <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                        display: inline-block;">Richard McVay</span> <span class="">Delaware Position</span>
                                    <span class="text-muted" style="font-size: 11px;">- Looking forward to meeting.</span> <span
                                        class="badge">1:02 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                        </span></span></a><a href="#" class="list-group-item read">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                </label>
                                            </div>
                                            <span class="glyphicon glyphicon-star"></span><span class="name" style="min-width: 120px;
                                                display: inline-block;">Lucas Turpin</span> <span class="">Job Offer</span>
                                            <span class="text-muted" style="font-size: 11px;">- Hey, buddy!</span> <span
                                                class="badge">2:45 PM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                                </span></span></a>
                    </div>
                </div>
                <div class="tab-pane fade in" id="profile">
                    <div class="list-group">
                        <div class="list-group-item">
                            <span class="text-center">This tab is empty.</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="messages">
                    This tab is empty.</div>
                <div class="tab-pane fade in" id="settings">
                    This tab is empty.</div>
            </div>
            
        </div>
    </div>
</div>

<!--
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Inbox</h1>
                </div>
                 

                <table width='1200'>
                <tr><th>FROM</th><th>MESSAGE</th><th>DATE</th></tr>

                <?php

                    //echo "<tr><td>$fromfirst $fromlast</td><td>$message</td><td>$date</td></tr>";

                ?>

                </table>
            </div>
        </div>
        
    </div>
  </div>-->
</html>


