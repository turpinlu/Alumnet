<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<head>
<title>Alumnet&#153 - Networking Made Easy</title>
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="theme.min.css">
<script type="text/javascript" src="style.js"></script>
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
<div class="container">
    <nav role="navigation" class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
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
                <li><a href="index.php">Log Out</a></li>
                <!-- <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </nav>
</div>
<div class="row">
    <div class="container">
        <div class="row-md-6">
            <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search keywords" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                 <div class="form-group">
                                    <label for="filter">Search by</label>
                                    <select class="form-control">
                                        <option value="0" selected>Select</option>
                                        <option value="1">Name</option>
                                        <option value="2">Zip Code</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option value="0" selected>Select</option>
                                        <option value="1">Hiring</option>
                                        <option value="2">Seeking</option>
                                    </select>
                                    </div>    

                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
        </div>
        <p>

        </p>
        <div class="row-md-6">
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
         <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>Juliet Ramsey</h2>

                    <p><strong>Degree: </strong> Computer Science </p>
                    <p><strong>Grad Year: </strong> 2014 </p>
                    <p><strong>City,State </strong> Salisbury, Maryland </p>
                    <p><strong>Reason </strong> Seeking Employment </p>
                    <p><strong>About: </strong> Hello my name is Juliet, I just moved to the DC metro area looking for employment in the programming field.<div class="col-xs-12 col-sm-4 emphasis">                
                </div> </p>
    
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" alt="" class="img-circle img-responsive">
                        <p><strong>Last Online</strong> <br> May 21,2010 </p>  
                    </figure>
                </div>
            </div> 

            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">                
                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Save </button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">                
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
                </div>
               <div class="col-xs-12 col-sm-4 emphasis">                
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span> Email </button>
                </div>
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