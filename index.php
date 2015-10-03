<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="logo.ico">
<?php

    //address error handling
    ini_set('display_errors',1); //1 turns it on
    error_reporting(E_ALL & ~E_NOTICE); //errors_all, except notices (warnings)
    //Attempt to Connect
    if ($connection = @mysql_connect ('localhost', 'alumnetx', 'Vu47Z7vis3')){
    }
    else {
        die('<p>Could not connect to MySQL because: <b>'.mysql_error().'</b></p>');
    }
    if (@mysql_select_db("alumnetx_ALUMNET", $connection)){
    }
    else {
        die('<p>Could not select the ALUMNET database because:
            <b>' .mysql_error().'</b></p>');
    }
?>


<head>
<title>Alumnet - Networking Made Easy</title>
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
            <a href="index.html">
            <img src="logo2.png" style="max-height:50px;max-width:200px;padding-left:10px;">
            </a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>
            <form role="search" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                </div>
            </form>
        </div>
    </nav>
</div>
<div class="row">
    <div class="container">
        <div class="col-md-6">
            <div class="jumbotron">
                <h1>Networking Made Simple</h1>
                <p>FOR those who leave Salisbury, but for whom Salisbury never leaves, this is where you belong: Salisbury University's Alumni Network (Alumnet, for short). Strengthen your Salisbury connection and help support activities of other alumni by becoming a member.</p>
                <p><a href="http://alumnet.xyz" target="_blank" class="btn btn-primary btn-lg">Get started today</a></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron">
                <h1>Trust Us, It's Really Easy</h1>
                <p>Within minutes, you can be connecting with other alumni. Remember that girl from your Econ class Sophomore year? She's already landed a job in Newark because she contacted another graduate. It's time to get the ball rolling. Sign up with Alumnet today! It's easy!</p>
                <p><a href="http://alumnet.xyz" target="_blank" class="btn btn-primary btn-lg">Please sign up</a></p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form">
            <h2>Please Sign Up <small>It's free and always will be.</small></h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <span class="button-checkbox">
                        <button type="button" class="btn" data-color="info" tabindex="7"> I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                    </span>
                </div>
                <div class="col-xs-8 col-sm-9 col-md-9">
                     By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                </div>
            </div>
            
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>
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
