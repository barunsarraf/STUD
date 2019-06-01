<?php

include "config.php";

$acceptvalue=1;
$rejectvalue=0;
$bookingid= $_POST['id']; 
$bid= $_POST['bid']; 
$dob=$_POST['dobid'];
$fromid=$_POST['fromid'];
$toid=$_POST['toid'];

$res=mysqli_query($db,"UPDATE `booking_record` SET `booking_status`='$acceptvalue'  WHERE id ='$bookingid'");
$r=mysqli_query($db,"UPDATE `booking_record` SET `booking_status`='$rejectvalue'  WHERE bud_id='$bid' AND dob='$dob' AND from_time='$fromid' AND to_time='$toid' NOT AND id='$bookingid';");

if($res===TRUE && $r===TRUE)
echo "Y";
else
echo "N";


?>