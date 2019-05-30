<?php

include "config.php";

//print_r($_GET);
$rejectvalue=0;



$res=mysqli_query($db,"UPDATE `requesting_record` SET `a_r`='$rejectvalue'  WHERE requesting_id='".$_GET['id']."'");

if($res===TRUE)
echo "Y";
else
echo "N";


?>