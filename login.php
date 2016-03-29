<?php
include 'dataLogin.php';
include 'secure.php';



$email = cleanStringInput($_POST['user-email']);
$password = $_POST['user-password'];

//$query = "SELECT * FROM ACCOUNT WHERE EMAIL='$email'";
          

$result = mysql_query("SELECT * FROM ACCOUNT WHERE EMAIL='$email'");

if (!$result){
  die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
}

$numrows = mysql_num_rows($result);
if ($numrows!=0){



	while($row=mysql_fetch_array($result)){
		$mail = $row['EMAIL'];
		$pass = $row['PASSWORD'];
	}
}


  //check to see if they match

		if ($email==$mail && password_verify($password, $pass)){
        //login
       
        session_destroy();
        session_start();
			  $_SESSION['email'] = $email;
        $_SESSION['page'] = "{$_SERVER['PHP_SELF']}";             //should keep security log-will need this information
				$time =new DateTime();
				$_SESSION['start_time']=$time->format('Y-m-d H:i:s');

       

        die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");

		}
      else{
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        die("<script>location.href = 'http://alumnet.xyz/register.php'</script>");
      }
//}

?>
<html lang="en">
<body>
  
</body>
</html>
