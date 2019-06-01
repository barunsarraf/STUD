<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Track</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head> 
<body style="background-color: #fafafa">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">STUD</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="book.php">Become Stud</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="#">Bookings</a>
      </li>
    
    </ul>
    <a style="color: #fff">Logged In: <b>  <?php
      $uid=$_SESSION["user_id"];
      $query="SELECT name from users where user_id='$uid'";
      $result=mysqli_query($db,$query);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      echo $row["name"];
      ?></b></a>&nbsp &nbsp
    <div class="btn-group">
  <button type="button" class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="submit">
    settings
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="window.location.href='user_profile.php'">Your profile</button>
    <button class="dropdown-item" type="button">Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='track.php'>Track</button>
    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>

  </div>
</nav>

      
  <?php 
  $uid=$_SESSION["user_id"];

  //FOR ACCEPTANCE OF BOOKINGS
  $query="SELECT * from booking_record where bud_id='$uid' ORDER BY dob ASC  ";
  $rt=mysqli_query($db,$query);
  while ($row=mysqli_fetch_array($rt,MYSQLI_ASSOC))
{   ?> <div style="padding-left: 15px;padding-right: 15px;padding-top: 10px; align-self: center;display: inline-block;" align="center">
  <?php

  $val= $row['booking_status'];
  $studbhai=$row['stud_id'];
  $tid=$row['topic_id'];
  $q="SELECT name from topics where id='$tid';";
  $result=mysqli_query($db,$q);
  $r=mysqli_fetch_array($result,MYSQLI_ASSOC);

   if($val==1)
         {?>
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;background-color: #fff;max-width: 18rem;width:16rem;box-shadow: 0 10px 8px -5px #BDBDBD;display: inline-block;">
  <div class="card-header"><?php echo $r['name']; ?><br>
    <class="card-text"><?php echo $row['dob']; ?></class="card-text">
    <p class="card-text"><?php echo date("g:i a", strtotime($row["from_time"]));?>-<?php echo date("g:i a", strtotime($row["to_time"])); ?></p>
  </div>
  <div class="card-body" style="background-color: #23933c">
    <h5 class="card-title">Booking id: <b>#SB<?php echo $row['id']; ?></b></h5>
    
    <?php
    $sid=$row['stud_id'];
    $quser="SELECT * from users where user_id='$sid';";
  $resultuser=mysqli_query($db,$quser);
  $ruser=mysqli_fetch_array($resultuser,MYSQLI_ASSOC);
  ?>
    <class="card-text"><?php echo $ruser['name'];?></b></class="card-text"><br>
    <class="card-text" style="font-size: small;"><b>#SID<?php echo $row['bud_id'];?></b></class="card-text"><br>
    <class="card-text">Stud Rating: <?php echo $ruser['stud_rating'];?></b></class="card-text"><hr>
    <span class="badge badge-pill badge-warning">Request Accepted!</span>
  </div>
</div>
<?php }
elseif($val==0)
         {?>
          <div class="card text-white bg-danger mb-3" style="max-width: 18rem;background-color: #fff;max-width: 18rem;width:16rem;box-shadow: 0 10px 8px -5px #BDBDBD;display: inline-block;">
  <div class="card-header"><?php echo $r['name']; ?><br>
    <class="card-text"><?php echo $row['dob']; ?></class="card-text">
    <p class="card-text"><?php echo date("g:i a", strtotime($row["from_time"]));?>-<?php echo date("g:i a", strtotime($row["to_time"])); ?></p>
  </div>
  <div class="card-body" style="background-color: #cc3040">
    <h5 class="card-title">Booking id: <b>#SB<?php echo $row['id']; ?></b></h5>
    
    <?php
    $sid=$row['stud_id'];
    $quser="SELECT * from users where user_id='$sid';";
  $resultuser=mysqli_query($db,$quser);
  $ruser=mysqli_fetch_array($resultuser,MYSQLI_ASSOC);
  ?>
    <class="card-text"><?php echo $ruser['name'];?></b></class="card-text"><br>
    <class="card-text" style="font-size: small;"><b>#SID<?php echo $row['bud_id'];?></b></class="card-text"><br>
    <class="card-text">Stud Rating: <?php echo $ruser['stud_rating'];?></b></class="card-text"><hr>
    <span class="badge badge-pill badge-warning">Request Rejected!</span>
  </div>
</div>
<?php }
elseif($val==3 )
         {$sid=$row['stud_id'];
    $quser="SELECT name from users where user_id='$sid';";
  $resultuser=mysqli_query($db,$quser);
  $ruser=mysqli_fetch_array($resultuser,MYSQLI_ASSOC);?>
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;background-color: #fff;max-width: 18rem;width:16rem;box-shadow: 0 8px 6px -5px #BDBDBD;display: inline-block;">
  <div class="card-header">Booking Deleted #SB<?php echo $row['id']?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><b><?php echo $r['name'];?></b></h5>
    <class="card-text"><?php echo date("g:i a", strtotime($row["from_time"]));?>-<?php echo date("g:i a", strtotime($row["to_time"])); ?></class="card-text"><br>
    <class="card-text" style="font-size: small;"><?php echo $row['dob']; ?></class="card-text"><hr>
    <class="card-text">You have cancelled your booking with <?php echo $ruser['name']; ?>.</class="card-text">
    <button name="ignbtn" class="btn btn-outline-warning ignbtn" style="margin-top: 10px"id="<?php echo $row["id"];?>" value="Requesthandle">Ignore</button>
  </div>
</div>

<?php }


}?>

<script type="text/javascript">
  
$(document).ready(function(){

  $('.ignbtn').click(function(){
      
      var id=$(this).attr("id");

     
      console.log(id);

      $.ajax({

       url:"ignore.php",
       dataType:"text",
       method:"GET",
       data:{
        id:id
       },success:function(data){
             
             var result=$.trim(data);
              
              console.log(result);

             if(result=='Y')
             {
                
              alert("Removed");
              header('Location: http://localhost/stud/track.php');
             }
             else
             {
              alert('Error');
             }
       }
      });
  });

});

</script>



  


</body>
</html>
  