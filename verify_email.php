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
  echo 'verified';
  $activate_query="UPDATE ACCOUNT SET ACTIVATED ='1'";
  $execute=mysql_query($activate_query);
  die("<script>location.href = 'http://alumnet.xyz/profile.php'</script>");
}
else{
  echo'incorrect code';
  die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
}

 ?>
