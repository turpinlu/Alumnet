<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<?php
 // MySQL Database Connect
include 'dataLogin.php';
//include 'myDataLogin.php';
include 'secure.php';

$register=$_POST['reg'];

 if ($register){

     $first_name = cleanStringInput($_POST['first_name']);
     $last_name = cleanStringInput($_POST['last_name']);
     $display_name = cleanStringInput($_POST['display_name']);
     $email = cleanStringInput($_POST['email']);
     $password = $_POST['password'];
     $password_confirmation = $_POST['password_confirmation'];
     $pwmatch = strcmp($password_confirmation, $password);


      //check to see if alredy have account using that email
      $email_check_query=mysql_query("SELECT EMAIL FROM ACCOUNT WHERE EMAIL='$email'");
      $count_email = mysql_num_rows($email_check_query);    //if not 0. email already in use

      //Validate Password
      //$error=validatePassword($password);     //checks for password length.Must include capital, lowercase, number, and special character
      $error = NULL;

      //hash password
      $password = hashPassword($password);    //hashes password for storage into database

    if(!$error && !$pwmatch && $count_email==0){
      //insert into database--create account

        if(mysql_query("LOCK TABLES account WRITE")){
        }
     	  $query="INSERT INTO ACCOUNT (USERNAME, PASSWORD, FNAME, LNAME, EMAIL, CITY, STATE) VALUES ('$display_name', '$password', '$first_name', '$last_name','$email','NA','NA')";
        if (mysql_query($query)){
        //automatically login--create new session
                
          $query7 = "SELECT ACCOUNTNUM FROM ACCOUNT WHERE EMAIL = '$email'";
          $r7 = mysql_query($query7);
          $row7 = mysql_fetch_array($r7);
          $accountnum = $row7['ACCOUNTNUM'];

          $query8 = "INSERT INTO ACCDEG (ACCOUNTNUM) VALUES ('$accountnum')";
          $r8 = mysql_query($query8);

          $query9 = "SELECT DEGNUM FROM ACCDEG WHERE ACCOUNTNUM = '$accountnum'";
          $r9 = mysql_query($query9);
          $row9 = mysql_fetch_array($r9);
          $degnum = $row9['DEGNUM'];

          $query10 = "INSERT INTO DEGREE (DEGNUM, DEGREE, DEGLEVEL, GRADDATE) VALUES ('$degnum','0','0','0000')";
          $r10 = mysql_query($query10);

          session_destroy();
          session_start();
          $_SESSION['email'] = $email;
          $_SESSION['page'] = "{$_SERVER['PHP_SELF']}";     //should keep security log-will need this information
          $time =new DateTime();
          $_SESSION['start_time']=$time->format('Y-m-d H:i:s');
          die("<script>location.href = 'http://alumnet.xyz/profile.php'</script>");
        }
    	  mysql_query("UNLOCK TABLES");
    }
}


?>

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
  <div class="collapse navbar-collapse" style="padding-right:15px;">
    <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown" style="padding-right:15px;">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown" style="padding-right:15px;font-size:20px;">Sign in <b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" name="user-email" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" name= "user-password" placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary btn-block" name="sign_in">Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                     </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="row-height">
            <div class="col-md-7">
                <div class="jumbotron">

<div class="row">
    <div class="col-md-12 col-xl-height col-sm-offset-0 col-md-offset-0">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2>Please Sign Up <small>It's free and always will be.</small></h2>

            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" value = "<?php echo $first_name ?>" required tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" value = "<?php echo $last_name ?>" required tabindex="2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" value = "<?php echo $display_name ?>" required tabindex="3">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value = "<?php echo $email ?>" required tabindex="4">
            </div>
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
            <?php
                if ($count_email!=0){
            ?>
                <div class="row">
                    <div class="col-xs-8 col-sm-9 col-md-9">
                        <p> *** Email is already taken</p>
                    </div>
                </div>
            <?php
                }
            ?>
            <?php
                if ($error){
            ?>
                <div class="row">
                    <div class="col-xs-8 col-sm-9 col-md-9">
                        <p> *** <?php echo "Password Choice Weak: $error"?></p>
                    </div>
                </div>
            <?php
                }
            ?>


            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <span class="button-checkbox">
                        <button type="button" class="btn" data-color="info" tabindex="7"> I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" required value="1">
                    </span>
                </div>
                <div class="col-xs-8 col-sm-9 col-md-9">
                     By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                </div>
            </div>

            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" name="reg" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
            </div>
            <div class="modal-body">
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
                <p>These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. These are terms and conditions. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>
<div class="col-md-5 col-xl-height col-sm-offset-0"> 
    <div class="jumbotron">
        <h1>Networking Made Easy</h1>
        <p>For those who leave Salisbury, but for whom Salisbury never leaves, this is where you belong: Salisbury University's Alumni Network (Alumnet, for short). Strengthen your Salisbury connection and help support activities of other alumni by becoming a member.</p>
        <p><a  target="_blank" class="btn btn-primary btn-lg">Get started today</a></p>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
