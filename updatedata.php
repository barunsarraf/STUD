<?php
include "config.php";
session_start();
  
  

    $usname=$_POST['uname'];
    $uspass=$_POST['upass'];
    $usem=$_POST['uemailid'];
    $usaddtopic=$_POST['cat_add'];
    $usdeltopic=$_POST['catdelete'];


    $password = password_hash($uspass, PASSWORD_DEFAULT);
    $hash =  md5( rand(0,1000) );
    
    
    
    $query3= "DELETE FROM stud_interest_topics WHERE stud_id=1 AND topic_id='$usdeltopic'";
    $result3=mysqli_query($db,$query2);
 

  ?>

