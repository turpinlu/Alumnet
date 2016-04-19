<div id="message">
	<?php
		session_start();
		//strings for query function
		$x=1;

		$toser = $_GET['var'];
		$foser = $_SESSION['email'];

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$x=0;
		}
		if(!empty($_POST['MESSE'])){
			$MESSE=$_POST['MESSE'];
			$ms="AND MESSAGE='$MESSE'";
			$x=0;
		}else{
			$MS="";
		}

		if(!empty($toser){
			$tu="AND TO_USER='$toser'";
			$x=0;
		}else{
			$tu="";
		}

		if(!empty($foser){
			$fu="AND FROM_USER='$foser'";
			$x=0;
		}else{
			$fu="";
		}

		//$query= "SELECT * FROM ACCOUNT, DEGREE, DEGNAME, ACCDEG WHERE ACCDEG.ACCOUNTNUM=ACCOUNT.ACCOUNTNUM AND ACCDEG.DEGNUM=DEGREE.DEGNUM AND DEGREE.DEGREE=DEGNAME.DEGREE $fn $ln $dg $gd $ct $st";

		if ($x==0){
			$query="INSERT INTO MESSAGES (TO_USER, FROM_USER, MESSAGE) VALUES ('$toser', '$foser', '$MESSE')";
	        
			if($r1 = mysql_query($query)){
		      	echo '<script language="javascript">';
		      	echo 'alert("Message Sent Successfully!")';
		      	echo '</script>';
			} else {
				echo "<p align='center'> Error sending Message </p>" . mysql_error($connection);
			}
		}
		
	?>
</div>