<?php

include "config.php";

//print_r($_GET);
$value=3;

$re=mysqli_query($db,"UPDATE `requesting_record` SET `a_r`='$value' WHERE booking_id='".$_GET['id']."'");
$res=mysqli_query($db,"DELETE FROM booking_record WHERE booking_id='".$_GET['id']."'");
if($res===TRUE && $re===TRUE)
echo "Y";
else
echo "N";


?>