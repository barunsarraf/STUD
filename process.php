<?php
session_start();
include"config.php";

$uname=$_POST['u_name'];
$query = "SELECT * FROM users WHERE username = '$uname' ";
$result = mysqli_query($db , $query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$password=$_POST['password'];

if( password_verify($password, $row['pass']) )
{

$_SESSION["user_id"]=$row["user_id"];



	//echo "sucessfull".$username;
	$StringExplo=explode("/",$_SERVER['REQUEST_URI']);
	$HEADTO=$StringExplo[0]."profile.php";


	header("Location: ".$HEADTO);
} 
else
{
	$message = "Incorrect Details";
	echo "<script type='text/javascript'>alert('$message');</script>";
}




?>
