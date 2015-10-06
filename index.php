<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico">

<?php
 // MySQL Database Connect
 include 'datalogin.php';
 include 'secure.php';

//cleanStringInput is broken - currently it strips all characters and returns nothing
 $first_name = cleanStringInput($_POST['first_name']);
 $last_name = cleanStringInput($_POST['last_name']);
 $display_name = cleanStringInput($_POST['display_name']);
 $email = cleanStringInput($_POST['email']);
 $password = $_POST['password'];
 $password_confirmation = $_POST['password_confirmation'];
 $pwmatch = strcmp($password_confirmation, $password);
 $password = hashPassword($password);
 $password_confirmation = hashPassword($password_confirmation);
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
        <img src="logo2.png" style="max-height:50px;max-width:200px;padding-left:10px;">
    </a>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown" style="padding-right:15px;">Sign in <b class="caret" style="padding-right:15px;"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary btn-block">Sign in</button>
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
        <div class="col-md-7">
            <div class="jumbotron">

<div class="row">
    <div class="col-md-12 col-sm-offset-0 col-md-offset-0">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2>Please Sign Up <small>It's free and always will be.</small></h2>

            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" value = "<?echo $first_name ?>" required tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" value = "<?echo $last_name ?>" required tabindex="2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" value = "<?echo $display_name ?>" required tabindex="3">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value = "<?echo $email ?>" required tabindex="4">
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
                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
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

<div class="col-md-5 col-sm-offset-0">
    <div class="jumbotron">
        <h1>Wow! A profile page!</h1>
        <p>For those who leave Salisbury, but for whom Salisbury never leaves, this is where you belong: Salisbury University's Alumni Network (Alumnet, for short). Strengthen your Salisbury connection and help support activities of other alumni by becoming a member.</p>
        <p><a href="http://alumnet.xyz" target="_blank" class="btn btn-primary btn-lg">Get started today</a></p>
    </div>
</div>
</div>
</div>
</body>
</html>
