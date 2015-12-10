
<div id="popup1" class="overlay3">
	<?php
	    $var = $_GET['var'];
	    echo $var;
	?>
	<div class="popup">
	  <h2>Here i am</h2>
	  <a class="close" href="#">&#10006;</a>
	  <div class="content">
	    <div class="panel-body">
	      <div class="row">
	        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://pbs.twimg.com/profile_images/3470882798/b30f3b4f149669a38b52fe513ed1e3e5.jpeg" class="img-circle img-responsive"> </div>
	        <div class=" col-md-9 col-lg-9 ">
	          <table class="table table-user-information">
	            <tbody>
	             <tr>
	                <td>Username:</td>
	                <td> <?php echo $var ?> </td>
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
	      </div>
	    </div>
	  </div>
	</div>
</div>


