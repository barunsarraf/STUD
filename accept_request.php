<?php

include "config.php";

//print_r($_GET);
$acceptvalue=1;


$res=mysqli_query($db,"UPDATE `requesting_record` SET `a_r`='$acceptvalue'  WHERE requesting_id='".$_GET['id']."'");


if($res===TRUE)
echo "Y";
else
echo "N";


?>