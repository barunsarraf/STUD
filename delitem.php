<?php

include "config.php";

//print_r($_GET);
$value=3;

$re=mysqli_query($db,"UPDATE `booking_record` SET `booking_status`='$value' WHERE id='".$_GET['id']."'");
if($re===TRUE)
echo "Y";
else
echo "N";


?>