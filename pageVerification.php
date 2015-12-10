
<?php
 // MySQL Database Connect
//include 'dataLogin.php';
//include 'myDataLogin.php';
//include 'secure.php';
session_start();
if (!$_SESSION['email']) {
	die("<script>location.href = 'http://alumnet.xyz/register.php'</script>");
}
	
?>


