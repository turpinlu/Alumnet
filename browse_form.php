<?php

	//strings for query function
	
	if(!empty($_POST['fname'])){
		$fname=$_POST['fname'];
		$fn="AND FNAME='$fname'";
	}else{
		$fn="";
	}

	if(!empty($_POST['lname'])){
		$lname=$_POST['lname'];
		$ln="AND LNAME='$lname'";
	}else{
		$ln="";
	}

	if(!empty($_POST['degree'])){
		$degree=$_POST['degree'];
		$dg="AND DEGNAME.DEGNAME='$degree'";
	}
	else{
		$dg="";
	}

	if(!empty($_POST['grad'])){
		$grad=$_POST['grad'];
		$gd="AND GRADDATE='$grad'";
	}
	else{
		$gd="";
	}

	if(!empty($_POST['city'])){
		$city=$_POST['city'];
		$ct="AND CITY='$city'";
	}
	else{
		$ct="";
	}

	if(!empty($_POST['state'])){
		$state=$_POST['state'];
		$gd="AND STATE='$state'";
	}
	else{
		$st="";
	}



	$query= "SELECT * FROM ACCOUNT, DEGREE, DEGNAME, ACCDEG WHERE ACCDEG.ACCOUNTNUM=ACCOUNT.ACCOUNTNUM AND ACCDEG.DEGNUM=DEGREE.DEGNUM AND DEGREE.DEGREE=DEGNAME.DEGREE $fn $ln $dg $gd $ct $st";
	
	if($r1 = mysql_query($query)){
		echo '<table class="table table-striped table-hover ">';
        echo '<thead>';
        echo '<tr class="info">';
       // echo '<tr>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>Degree</th>';
        echo '<th>Graduation</th>';
        echo '<th>City</th>';
        echo '<th>State</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
       
		while($row=mysql_fetch_array($r1)){
			$fname2 = $row['FNAME'];
			$lname2 = $row['LNAME'];
			$degree2 = $row['DEGNAME'];
			$grad2 = $row['GRADDATE'];
			$city2 = $row['CITY'];
			$state2 = $row['STATE'];         
			echo '<td><input type="radio" name="radio" id="radio" class="radio" checked/></td>';         
            echo '<td>'.$fname2.'</td>';
            echo '<td>'.$lname2.'</td>';
            echo '<td>'.$degree2.'</td>';
            echo '<td>'.$grad2.'</td>';
            echo '<td>'.$city2.'</td>';
            echo '<td>'.$state2.'</td>';
            echo '</tr>';
                                

		}
		echo '</tbody>';
      	echo '</table>';
	}
	
?>