<?php

include 'datalogin.php';
//include 'myDataLogin.php'
include 'secure.php';
session_start();



$email = cleanStringInput($_POST['user-email']);
$password = $_POST['user-password'];

//$query = "SELECT * FROM ACCOUNT WHERE EMAIL='$email'";
          
echo $email;
echo " ";
echo $password;

if (!mysql_query("SELECT * FROM ACCOUNT WHERE EMAIL='$email'")){
  echo 'Wrong email or password';
  echo "WRONG !";
  //die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
}
$numrows = mysql_num_rows($result);
echo $numrows;
if ($numrows!=0){
	while($row=mysql_fetch_array($result)){
		$mail = $row['EMAIL'];
		$pass = $row['PASSWORD'];
	}



  //check to see if they match
		if ($email==$mail && password_verify($password, $pass)){
        //login
        echo 'logged in!';
			  $_SESSION['email'] = $email;

        $_SESSION['page'] = "{$_SERVER['PHP_SELF']}";             //should keep security log-will need this information
				$time =new DateTime();
				$_SESSION['start_time']=$time->format('Y-m-d H:i:s');
        echo 'success';
        die("<script>location.href = 'http://alumnet.xyz/profile.php'</script>");

		}
      else{
        echo 'Wrong email or password';
        die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
      }
}
//}

?>
