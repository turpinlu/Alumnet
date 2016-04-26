<!DOCTYPE html>
<html lang="en">

<link rel="shortcut icon" href="favicon.ico">

<?php
 // MySQL Database Connect
 // MySQL Database Connect
 include 'dataLogin.php';
 include 'secure.php';
 $username = $_GET['username'];
 $confirm_code=$_GET['code'];
     $reset=$_POST['res'];
  if ($reset){

    $query= "SELECT * FROM ACCOUNT WHERE EMAIL = '$username'";
    $r = mysql_query($query);
    $row = mysql_fetch_array($r);
    $confirm_code=$row['CONFIRM'];
    if ($confirm_code==$code){
      $password=$_POST['password'];
      $confirm_password=$_POST['password_confirmation'];
      $pwmatch = strcmp($confirm_password, $password);
      //Validate Password
      //$error=validatePassword($password);     //checks for password length. Must include capital, lowercase, number, and special character
      //$error = NULL;

      //hash password
      $password = hashPassword($password);    //hashes password for storage into database
      if(!$pwmatch){
        if(mysql_query("LOCK TABLES account WRITE")){
          $query="UPDATE ACCOUNT SET PASSWORD='$password'";
          echo '  query is   ';
          echo $query;
          if (mysql_query($query)){
            echo"query complete";
            session_destroy();
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['page'] = "{$_SERVER['PHP_SELF']}";     //should keep security log-will need this information
            $time =new DateTime();
            $_SESSION['start_time']=$time->format('Y-m-d H:i:s');
            die("<script>location.href = 'http://alumnet.xyz/profile.php'</script>");
          }
        }
      }
}

}

?>
<html>
<head>
<title>Alumnet&#153 - Networking Made Easy</title>
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.button-checkbox').each(function () {

            // Settings
            var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

            // Event Handlers
            $button.on('click', function () {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function () {
                updateDisplay();
            });

            // Actions
            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');

                // Set the button's state
                $button.data('state', (isChecked) ? "on" : "off");

                // Set the button's icon
                $button.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$button.data('state')].icon);

                // Update the button's color
                if (isChecked) {
                    $button
                        .removeClass('btn-default')
                        .addClass('btn-' + color + ' active');
                }
                else {
                    $button
                        .removeClass('btn-' + color + ' active')
                        .addClass('btn-default');
                }
            }

            // Initialization
            function init() {

                updateDisplay();

                // Inject the icon if applicable
                if ($button.find('.state-icon').length == 0) {
                    $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
                }
            }
            init();
        });
    });

$(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});
</script>
<style type="text/css">
    .navbar{
        margin-top: 0px;
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
        <img src="logo2.png" style="max-height:50px;max-width:200px;padding-left:20px;">
    </a>
  </div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-height">
            <div class="col-md-7">
                <div class="jumbotron">

<div class="row">
    <div class="col-md-12 col-xl-height col-sm-offset-0 col-md-offset-0">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2>Enter your new password</h2>

            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required tabindex="5">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" required tabindex="6">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Reset" name="res" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
            </div>
            </form>
            <?php
                if ($pwmatch){
            ?>
                <div class="row">
                    <div class="col-xs-8 col-sm-9 col-md-9">
                        <p> *** The passwords must match</p>
                    </div>
                </div>
            <?php
                }
            ?>

</html>
