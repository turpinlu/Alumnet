
<?php
	session_start();
	include "dataLogin.php";
    function GetImageExtension($imagetype)
    {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
    if (!empty($_FILES["uploadedimage"]["name"])) {
    	$theDate=date("Y-m-d");
    	$file_name=$_FILES["uploadedimage"]["name"];
    	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
    	$imgtype=$_FILES["uploadedimage"]["type"];
    	$ext= GetImageExtension($imgtype);
    	$imagename=date("d-m-Y")."-".time().$ext;
    	//$target_path = getcwd()."/".$imagename;
      $target_path = $imagename;
		if(move_uploaded_file("$temp_name", "$target_path")) {

    		//$query_upload="INSERT INTO `images_tbl` ( 'images_path', 'submission_date') VALUES ('$target_path', '".date("Y-m-d")."')";

    		$query_upload="INSERT into `images_tbl` (ACCOUNTNUM, images_path, submission_date) VALUES ('$accountnum','$target_path','$theDate')";

    		mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error()); 

        die("<script>location.href = 'http://alumnet.xyz/edit.php'</script>");
     	}else{

 			exit("Error While uploading image on the server");
		}
	}
?>




<form action="images.php" enctype="multipart/form-data" method="post">

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td><input name="uploadedimage" type="file"></td>
</tr>
<tr>
<td><input name="Upload Now" type="submit" value="Upload Image"></td>
</tr>
</tbody></table>
</form>

<?php
/*
//session_start();
//include("dataLogin.php");
$select_query = "SELECT images_path FROM  images_tbl WHERE ACCOUNTNUM='$accountnum'";
$sql = mysql_query($select_query) or die(mysql_error());   
while($row = mysql_fetch_array($sql)){
  $image=$row['images_path'];
  //echo "$image";
  echo "<img src= '$image' height='420' width='420' >";
  
} */
?>



