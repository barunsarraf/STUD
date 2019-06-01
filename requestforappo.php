<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Attend Appointment</title>
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
        <a class="nav-link" href="viewbookings.php">Bookings</a>
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
    <button class="dropdown-item" type="button" onclick="window.location.href='setting.php'">Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='track.php'">Track</button>
    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>

  </div>
</nav>

      
        
          <?php 
  $uid=$_SESSION["user_id"];
  $pending=2;
  $query="SELECT * from booking_record where stud_id='$uid' AND dob>= CURDATE() AND booking_status='$pending' ORDER BY dob ASC;";
  
  $rt=mysqli_query($db,$query);
   if ($rt->num_rows <= 0)
  {
    ?><img align="center" style="width: 400px;display: block;
    margin-top: 50px;
  margin-left: auto;
  margin-right: auto;
  width: 35%;" src="noappoit.svg"><p align="center" style="margin-top: 10px"><b>
    <?php
   echo "No Appointment's available";?></p></b>
    <?php
 }
 else
 {
while ($row=mysqli_fetch_array($rt,MYSQLI_ASSOC))
{ 
  ?><div style="padding-left: 15px;padding-right: 15px;padding-top: 10px; align-self: center;display: inline-block;" align="center"><?php

  $userwhobooked=$row['bud_id'];
  $userwhobookedquery="SELECT * from users where user_id='$userwhobooked';";
  $resultquery=mysqli_query($db,$userwhobookedquery);
  $resultuserbooked=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);

  $tid=$row['topic_id'];
  $q="SELECT name from topics where id='$tid';";
  $result=mysqli_query($db,$q);
  $r=mysqli_fetch_array($result,MYSQLI_ASSOC);

  ?>

  <div class="card" style="background-color: #fff;max-width: 18rem;width:16rem;box-shadow: 0px 8px 6px -3px #BDBDBD;">
    <div class="card-body" style="display: inline-block;">
      <h5 class="card-title" align="center"  ><?php  echo $r["name"]; ?></h5><hr>
      <p class="card-text" align="center" style="align-self:center;margin-top: -12px"><?php echo date("g:i a", strtotime($row["from_time"]));?> - <?php echo date("g:i a", strtotime($row["to_time"]));
            ?><br><small class="form-text text-muted">#SB<?php echo $row['id']; ?></small>
      <class="card-text"><small align="center" class="text-muted"> <?php
            $date_now = date("Y-m-d");
            if ($date_now == $row["dob"]) {
                ?><b><?php echo 'Today'; ?></b><?php
                }else{
                echo $row["dob"];
                      }?></small></class="card-text"><hr style="margin-top:-12px">
                      
    <class="card-text" align="center" style="margin-top: -12px;display: inline-block;"><b> <?php echo $resultuserbooked['name']; ?></class="card-text"></b><br>
    <class="card-text" align="center" style="margin-top: -12px"><i style="color:  #FCC305" class="fas fa-star-half-alt"></i> Bud Rating: <?php echo $resultuserbooked['bud_rating']; ?></class="card-text"><br>
    <class="card-text" align="center" style="margin-top: -12px">Username: <b><?php echo $resultuserbooked['username']; ?></class="card-text"></b>
  </div>
    <div style="padding: 10px;display: inline-block;" align="center" >



      <button style="margin-top: -12px;" name="acpbtn" class="btn btn-outline-success acpbtn" style="margin-top: -3rem" id="<?php echo $row["id"];?>" dobid="<?php echo $row["dob"];?>" fromid="<?php echo $row["from_time"];?>" toid="<?php echo $row["to_time"];?>" bid="<?php echo $row["bud_id"];?>" value="Accepthandle">Accept</button>



          <button style="margin-top: -12px;" name="rejbtn" class="btn btn-outline-danger rejbtn" style="margin-top: -3rem" id="<?php echo $row["id"];?>" value="Rejecthandle">Reject</button>

<?php
}?>




  </div>
</div>
    
  </div>

</div>
<?php
}
?>

<script type="text/javascript">
  
$(document).ready(function(){

  $('.rejbtn').click(function(){
      
      var id=$(this).attr("id");

     
      console.log(id);

      $.ajax({

       url:"rejected_request.php",
       dataType:"text",
       method:"GET",
       data:{
        id:id
       },success:function(data){
             
             var result=$.trim(data);
              
              console.log(id);

             if(result=='Y')
             {
              alert("Rejected");
              header('Location: http://localhost/stud/requestforappo.php');
             }
             else
             {
              alert('Not Rejected');
             }
       }
      });
  });

});

</script>

<script type="text/javascript">
  
$(document).ready(function(){

  $('.acpbtn').click(function(){
      
      var id=$(this).attr("id");
      var bid=$(this).attr("bid");
      var dobid=$(this).attr("dobid");
      var fromid=$(this).attr("fromid");
      var toid=$(this).attr("toid");

     
    

      $.ajax({

       url:"accept_request.php",
       dataType:'text',
       method:"POST",
       data:{
        id:id,
        bid:bid,
        dobid:dobid,
        fromid:fromid,
        toid:toid
       },success:function(response){
              var result=$.trim(data);
              
              console.log(result);

             if(result=='Y')
             {
                
              alert("Accepted");
              header('Location: http://localhost/stud/profile.php');
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



      </div>


</body>
</html>
  