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
</script>
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
                
            </ul>
            <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
            </form>
        </div>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron">

<div class="row">
    <div class="col-sm-offset-2 col-md-offset-3">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2>Please Sign Up <small>It's free and always will be.</small></h2>

            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" value = "<?echo $first_name ?>" required tabindex="1">
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-6">
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
                <div class="col-xs-3 col-sm-3 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required tabindex="5">
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-6">
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
</div>
</div>
</body>
</html>
