<?php

include "config.php";

//print_r($_GET);
$ignorevalue=4;



$res=mysqli_query($db,"UPDATE `booking_record` SET `booking_status`='$ignorevalue'  WHERE id='".$_GET['id']."'");

if($res===TRUE)
echo "Y";
else
echo "N";


?>