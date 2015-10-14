<?php

//include 'datalogin.php';
include 'myDataLogin.php';
include 'secure.php';
session_start();



$email = cleanStringInput($_POST['user-email']);
$password = $_POST['user-password'];


$query = "SELECT * FROM account WHERE EMAIL='$email'";

$result = mysql_query($query);
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
        //header("Location: http://alumnet.xyz/profile.php");
        header("Location: http://localhost:8080/Alumnet/profile.php");

		}
      else{
        echo 'Wrong email or password';
        header("Location: http://alumnet.xyz/index.php");
      }
}
//}

?>
