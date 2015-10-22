<?php

$user = 'alumnetx';
$password = 'Vu47Z7vis3';
$db = 'alumnetx_ALUMNET';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();

$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db
);
echo $success;
?>
