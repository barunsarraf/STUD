<?php

include "config.php";
session_start();
$uid=$_SESSION["user_id"];
$requested=2;

//print_r($_GET);

$res=mysqli_query($db,"INSERT INTO `requesting_record`(`user_id`, `booking_id`, `a_r`) 
	VALUES ('$uid','".$_GET['id']."','$requested')");

if($res===TRUE)
echo "Y";
else
echo "N";


?>