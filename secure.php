<?php

/*Password Hashing*/
function hashPassword($str){
  //The higher the securityLevel the more secure but the more processing power it consumes
  $securityLevel = 10;

  // Generating a random salt
  $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

  // Adding additional informaiton about hash used. Helps verify later.
  // "$2a$" indicates using Blowfish algorithm; then following digits for securityLevel The following two digits are the cost parameter.
  $salt = sprintf("$2a$%02d$", $securityLevel) . $salt;

  // Use salt to hash the string
  $hash = crypt($str, $salt);
  return $hash;
}

/*General Security Functions*/
function cleanNumericInput ($input){
  //Prevent SQL injection in any numeric (Non-String) fields by simply typecasting
  return (float) $input;
}

function cleanStringInput ($input)
{
  //Prevent SQL injection by stripping any user generated strings of SQL-recognized characters
	if (get_magic_quotes_gpc()){
		//$input = stripslashes ($input);
    //echo $input;
    //echo "(stripslashes)    ";
	}
	$input = mysql_real_escape_string($input);
  echo $input;
  echo "(real_escape)    ";

  //Prevent Cross Site Scripting by converting any JavaScript symbols into their html entities
  $input = htmlentities($input);
  echo $input;
  echo "(html)    ";
  return $input;
}

?>
