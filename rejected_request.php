<?php

include "config.php";

//print_r($_GET);
$rejectvalue=0;



$res=mysqli_query($db,"UPDATE `booking_record` SET `booking_status`='$rejectvalue'  WHERE id='".$_GET['id']."'");

if($res===TRUE)
echo "Y";
else
echo "N";


?>