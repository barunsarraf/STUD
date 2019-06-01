<?php

include "config.php";
session_start();
$uid=$_SESSION["user_id"];
$pending=2;

//print_r($_GET);



$res=mysqli_query($db,"INSERT INTO `booking_record`(`bud_id`, `stud_id`, `topic_id`, `booking_status`, `dob`, `from_time`, `to_time`) VALUES ('$uid','".$_GET['ids']."','".$_GET['idtopic']."','$pending','".$_GET['idb']."','".$_GET['idf']."','".$_GET['idt']."')");


if($res===TRUE)
echo "Y";
else
echo "N";


?>