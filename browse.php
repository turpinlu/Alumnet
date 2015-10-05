<!DOCTYPE html>
<html lang="en">
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
                <h1>Hey, look! A page for browsing!</h1>
                <p>For those who leave Salisbury, but for whom Salisbury never leaves, this is where you belong: Salisbury University's Alumni Network (Alumnet, for short). Strengthen your Salisbury connection and help support activities of other alumni by becoming a member.</p>
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
</body>
</html>