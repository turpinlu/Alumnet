<!DOCTYPE html>
<html lang="en">

<link rel="shortcut icon" href="favicon.ico">

<?php
 // MySQL Database Connect
include 'dataLogin.php';
include 'secure.php';

$reset=$_POST['res'];

 if ($reset){
   echo"Reset";


     $email = cleanStringInput($_POST['email']);

      $email_check_query=mysql_query("SELECT EMAIL FROM ACCOUNT WHERE EMAIL='$email'");
      $count_email = mysql_num_rows($email_check_query);
      //Validate Password
      //$error=validatePassword($password);     //checks for password length.Must include capital, lowercase, number, and special character
      //$error = NULL;
      if ($count_email==1){
        $query = "SELECT CONFRIM FROM ACCOUNT WHERE EMAIL = '$email'";
        $r = mysql_query($query);
        $row = mysql_fetch_array($r);
        $confirm_code = $row['CONFIRM'];
        //send email
        $message=
        "
        Click the link below to reset your password
        http://www.alumnet.xyz/reset_password.php?username=$email&code=$confirm_code
        ";
        $subject="Alumnet Password Reset";
        $headers="From: DO_NOT_REPLY@alumnet.xyz";
        $mail=mail($email, $subject, $message, $headers);
        if ($mail){
          echo "Email Sent";
        }
        else{
          echo"Email failed to send";
        }
          die("<script>location.href = 'http://alumnet.xyz/register.php'</script>");

      }
      else{
        $message = "We have no registered users with that email address.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        die("<script>location.href = 'http://alumnet.xyz/register.php'</script>");
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
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>"method="post">
            <h2>So you've forgotton your password?</h2>

            <hr class="colorgraph">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value = "<?php echo $email ?>" required tabindex="1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6"><input type="submit" value="Reset" name="res" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
            </form>

</html>
