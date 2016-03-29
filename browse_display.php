
<div id="popup1" class="overlay3">
	<?php
	    $var = $_GET['var'];
		session_start();
		include "dataLogin.php";

		$i = $_SESSION['email'];

		    $query = "SELECT * FROM ACCOUNT WHERE ACCOUNTNUM = '$var'";
		    $r = mysql_query($query);
		    $row = mysql_fetch_array($r);
		    $username =$row['USERNAME'];
		    $city = $row['CITY'];
		    $accountnum = $row['ACCOUNTNUM'];
		    $state = $row['STATE'];
		    $zip = $row['ZIP'];
		    $email = $row['EMAIL'];
		    $fname = $row['FNAME']; 
		    $lname = $row['LNAME'];
		    $intnum = $row['INTNUM'];
		    $description = $row['COVERSUM'];   

		    $query2 = "SELECT * FROM INTEREST WHERE INTNUM = '$intnum'";
		    $s = mysql_query($query2);
		    $row2 = mysql_fetch_array($s);

		    $interest = $row2['INTVALUE']; 

		    $query3 = "SELECT * FROM ACCDEG WHERE ACCOUNTNUM = '$accountnum'";
		    $a = mysql_query($query3);
		    $row3 = mysql_fetch_array($a);

		    $accdeg = $row3['DEGNUM']; 

		    $query4 = "SELECT * FROM DEGREE WHERE DEGNUM = '$accdeg'";
		    $a = mysql_query($query4);
		    $row4 = mysql_fetch_array($a);

		    $degree = $row4['DEGREE']; 
		    $gradyear = $row4['GRADDATE'];

		    $query5 = "SELECT * FROM DEGNAME WHERE DEGREE = '$degree'";
		    $b = mysql_query($query5);
		    $row5 = mysql_fetch_array($b);

		    $degreename = $row5['DEGNAME']; 



	?>
	<div class="popup">
	  <h2><?php echo $fname.' '.$lname?></h2>
	  <a class="close" href="#">&#10006;</a>
	  <div class="content">
	    <div class="panel-body">
	      <div class="row">
	        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> 
	        	<div class="box">
					<form action="#popup2" method="get">
					<td> <button class="button3" name="mess" type="submit">Message</button></td>
				</div>
	        </div>
	        <div class=" col-md-9 col-lg-9 ">
	          <table class="table table-user-information">
	            <tbody>
	             <tr>
	                <td>Username:</td>
	                <td> <?php echo $username?> </td>
	              </tr>
	            <tr>
	              <tr>
	                <td>Degree:</td>
	                <td> <?php echo $degreename ?> </td>
	              </tr>
	            <tr>
	                <td>Grad Year:</td>
	                <td><?php echo $gradyear ?></td>
	              </tr>
	               <tr>
	                <td>City:</td>
	                <td><?php echo $city ?></td>
	              </tr>
	              <tr>
	                <td>State:</td>
	                <td><?php echo $state ?></td>
	              </tr>
	              <tr>
	                <td>Interest:</td>
	                <td><?php echo $interest ?></td>
	              </tr>
	               <tr>
	                <td>Description:</td>
	                <td><?php echo $description ?></td>
	              </tr>
	              <tr>
	                <td>Email:</td>
	                <td><?php  echo $email ?></td>
	              </tr>

	            </tbody>
	          </table>
	        </div>
	       		<textarea rows="4" cols="50">
				At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
				</textarea>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<div id="popup2" class="overlay3">
	<?php echo "Hello"; ?>
</div>	


