<?php
session_start();
include("config.php");

$usname=$_POST['uname'];
$uspass=$_POST['upass'];
$usem=$_POST['uemailid'];
$usaddtopic=$_POST['catadd'];
$usdeltopic=$_POST['catdelete'];

echo $usname;
echo $uspass;
echo $usem;
echo $usaddtopic;

$values = $_POST['catdelete'];


?>