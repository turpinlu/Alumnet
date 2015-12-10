<?php

session_start();
echo 'Logged out.';
session_destroy();

  die("<script>location.href = 'http://alumnet.xyz/register.php'</script>");


 ?>
