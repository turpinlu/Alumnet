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
    $email = $row['EMAIL'];
    $username =$row['USERNAME'];
    $accountnum = $row['ACCOUNTNUM'];
    $fname = $row['FNAME']; 
    $lname = $row['LNAME'];
    $city = $row['CITY'];
    $state = $row['STATE'];
    $description = $row['COVERSUM'];
    $intnum = $row['INTNUM'];
    $password = $row['PASSWORD'];


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


if (isset($_POST['update'])){

          $newemail = $_POST['newemail'];
          $newcity = $_POST['newcity'];
          $newstate = $_POST['newstate'];
          $newdescript = $_POST['newdescript'];
          $newusername = $_POST['newusername'];
         // $newpassword = $_POST['newpPassword'];
          $newintnum = $_POST['newintnum'];
          $newdegree = $_POST['newdegree'];
          $newgradyear = $_POST['newgradyear'];


       $sql = "UPDATE ACCOUNT SET CITY ='$newcity', INTNUM = '$newintnum', USERNAME ='$newusername', COVERSUM ='$newdescript' , STATE = '$newstate', PASSWORD = '$password' WHERE ACCOUNTNUM = '$accountnum'";

      

      if (mysql_query($sql, $connection)) {


        $sql2 = "UPDATE DEGREE SET DEGREE = '$newdegree', GRADDATE = '$newgradyear' WHERE DEGNUM = '$accdeg'";      

         if (mysql_query($sql2, $connection)) {
              die("<script>location.href = 'http://alumnet.xyz/profile.php'</script>");    
           } 
         else {
           echo "";
          } 

      } 
      else {
        echo "";
      } 

     

    }

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
<div class="col-md-10 col-lg-10 " align="center"><img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> <h6>Upload a different photo...</h6></div>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">

        <h3>Personal info</h3>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-horizontal" enctype="multipart/form-data">


          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" name="newusername" type="text" value = "<?  echo $username ?>">
            </div>
          </div>

                    <div class="form-group">
            <label class="col-lg-3 control-label">Degree:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="newdegree" class="form-control">
                  <option value="1" <?php if ($degree == 1 ) echo "selected" ; ?> >English</option>
                  <option value="2" <?php if ($degree == 2 ) echo "selected" ; ?> >Photography</option>
                  <option value="3" <?php if ($degree == 3 ) echo "selected" ; ?> >Finance</option>
                  <option value="4" <?php if ($degree == 4 ) echo "selected" ; ?> >Biology</option>
                  <option value="5" <?php if ($degree == 5 ) echo "selected" ; ?> >Enviromental Science</option>
                  <option value="6" <?php if ($degree == 6 ) echo "selected" ; ?> >Math</option>
                  <option value="7" <?php if ($degree == 7 ) echo "selected" ; ?> >Social Work</option>
                  <option value="8" <?php if ($degree == 8 ) echo "selected" ; ?> >Spanish</option>
                  <option value="9" <?php if ($degree == 9 ) echo "selected" ; ?> >Management</option>
                  <option value="10"<?php if ($degree == 10 ) echo "selected" ; ?> >Business</option>
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Graduation Year:</label>
            <div class="col-lg-8">
              <input class="form-control" maxlength="4" name="newgradyear" type="text" value = "<? echo $gradyear ?>">
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
              <input class="form-control" maxlength="2" name="newstate" type="text" value= "<? echo $state ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Description:</label>
            <div class="col-lg-8">
              <textarea cols="40" rows="5" class="form-control" name="newdescript" type="text" ><? echo $description ?></textarea>
            </div>
          </div>


          <div class="form-group">
            <label class="col-lg-3 control-label">Reason:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="newintnum" class="form-control">
                  <option value="0" <?php if ($intnum == 0 ) echo "selected" ; ?> >Looking</option>
                  <option value="1" <?php if ($intnum == 1 ) echo "selected" ; ?> >Hiring</option>
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

              <input type="submit" value="Update" name="update" ">
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
