
<?php
 // MySQL Database Connect
//include 'dataLogin.php';
//include 'myDataLogin.php';
//include 'secure.php';
session_start();
if (!$_SESSION['email']) {
	echo " REDIRECTING TO INDEX, NO EMAIL";
	echo $_SESSION['email'];
	//die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
}

?>


