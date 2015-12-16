
<?php
 // MySQL Database Connect
//include 'dataLogin.php';
//include 'myDataLogin.php';
//include 'secure.php';
session_start();
if (!$_SESSION['email']) {
	echo "no sesh in email";
	die("<script>location.href = 'http://alumnet.xyz/register.php'</script>");
}
	
?>


