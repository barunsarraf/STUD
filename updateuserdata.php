<?php
session_start();
include("config.php");

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
	 
$usname=$_POST['uname'];
$uspass=$_POST['upass'];
$usem=$_POST['uemailid'];
$usaddtopic=$_POST['add_topic'];
$usdeltopic=$_POST['delete_topic'];



if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
  
	$target_path = "images/".$imagename;


  $uid=$_SESSION["user_id"];
	

if(move_uploaded_file($temp_name, $target_path)) {



$res=mysqli_query($db,"UPDATE `users` SET `name`='$usname',`pass`='$uspass',`emailid`='$usem',`image_path`='".$target_path."',`lastupdated`='".date("Y-m-d")."' WHERE user_id='$uid'";

mysqli_query($db,$query_upload);

}
}
else{

   exit("Error While uploading image on the server");
} 

?>

