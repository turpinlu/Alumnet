<?php

session_start();
echo 'Logged out.';
session_destroy();

header("Refresh: 1; URL=http://alumnet.xyz/index.php");

 ?>
