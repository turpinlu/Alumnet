<?php
// MySQL Database Connect
include 'dataLogin.php';
include 'secure.php';
$username = $_GET['username'];
$code=$_GET['code'];

$query= "SELECT * FROM ACCOUNT WHERE EMAIL = '$username'";
$r = mysql_query($query);
$row = mysql_fetch_array($r);
$confirm_code=$row['CONFIRM'];
if ($confirm_code==$code){
  die("<script>location.href = 'http://alumnet.xyz/reset_password.php?username=$username'</script>");
}
else{
  $message = "Invalid confrimation code.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
}

 ?>
