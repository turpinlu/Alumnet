<?php
include 'dataLogin.php';
//include 'myDataLogin.php'
include 'secure.php';
session_start();



$email = cleanStringInput($_POST['user-email']);
$password = $_POST['user-password'];

//$query = "SELECT * FROM ACCOUNT WHERE EMAIL='$email'";
          
echo $email;
echo "<br>";
echo $password;
echo "<br>";

$result = mysql_query("SELECT * FROM ACCOUNT WHERE EMAIL='$email'");
echo "<br>";
echo $result;
echo "<br>";

if (!$result){
  echo 'Wrong email or password';
  echo "WRONG !";
  die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
}
echo "<br>";
echo "Setting Values from $result";
echo "<br>";
$numrows = mysql_num_rows($result);
if ($numrows!=0){



	while($row=mysql_fetch_array($result)){
		$mail = $row['EMAIL'];
		$pass = $row['PASSWORD'];
	}
}


  //check to see if they match
echo $email;
echo "<br>";
echo $mail;
echo "<br>";
echo $pass;
echo "<br>";
		if ($email==$mail && password_verify($password, $pass)){
        //login
        echo "<br>";  
        echo 'logged in!';
			  $_SESSION['email'] = $email;

        $_SESSION['userID'] = "{$row[0]}"; //For edit and profile page

        $_SESSION['page'] = "{$_SERVER['PHP_SELF']}";             //should keep security log-will need this information
				$time =new DateTime();
				$_SESSION['start_time']=$time->format('Y-m-d H:i:s');
        echo "<br>";
        echo 'success';
        die("<script>location.href = 'http://alumnet.xyz/profile.php'</script>");

		}
      else{
        echo 'Wrong email or password';
        die("<script>location.href = 'http://alumnet.xyz/index.php'</script>");
      }
      echo $_SESSION['email'];
//}

?>
