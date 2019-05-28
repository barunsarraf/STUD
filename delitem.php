<?php

include "config.php";

//print_r($_GET);
$res=mysqli_query($db,"DELETE FROM booking_record WHERE booking_id='".$_GET['id']."'");

if($res===TRUE)
echo "Y";
else
echo "N";


?>