<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bookings</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

   

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head> 
<body>
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
        <a class="nav-link" href="#">Topics</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Requests</a>
      </li>
    </ul>
    <a style="color: #fff">Logged In: <b>Barun Sarraf</b></a>&nbsp &nbsp
    <div class="btn-group">
  <button type="button" class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="submit">
    settings
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="window.location.href='user_profile.php'">Your profile</button>
    <button class="dropdown-item" type="button">Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>

  </div>
</nav>

      <div style="padding: 12px;background-color: #FAFAFA" align="justify">
        
          <?php 
  $uid=$_SESSION["user_id"];
  $query="SELECT * FROM booking_record where user_id='$uid' ORDER BY dob ASC;";
  $rt=mysqli_query($db,$query);
   if ($rt->num_rows <= 0)
  {
    ?><img align="center" style="width: 400px;display: block;
    margin-top: 50px;
  margin-left: auto;
  margin-right: auto;
  width: 35%;" src="nobooking.svg"><p align="center"><b>
    <?php
   echo "No Bookings";?></p></b>
   <div style="text-align: center;">
    <button type="button" class="btn btn-dark" style=" position: relative;align-self: center;" align="center" onclick="location.href ='book.php'">Book Now</button>
</div>
   
    <?php
 }
 else
 {
while ($row=mysqli_fetch_array($rt,MYSQLI_ASSOC))
{ 
  
  $tid=$row['topic_id'];
  $q="SELECT topic_name from topics where topic_id='$tid';";
  $result=mysqli_query($db,$q);
  $r=mysqli_fetch_array($result,MYSQLI_ASSOC);

          ?>
          <div class=<?php 
          $date_now = date("Y-m-d");
            if ($date_now > $row["dob"]) {
                echo '"card text-white bg-secondary mb-3"';
                }else{
                echo '"card text-white bg-dark mb-3"';
                      }?> style="max-width: 12rem;display:inline-block;">
            <div align="center" class="card-header"><b><?php
            $date_now = date("Y-m-d");
            if ($date_now == $row["dob"]) {
                echo 'Today';
                }else{
                echo $row["dob"];
                      }?>
            </b></div>
            <div align="center" class="card-body">
            <h5 class="card-title"><?php  echo $r["topic_name"]; ?></h5>
            <p align="center"  class="card-text"><?php echo date("g:i a", strtotime($row["from_time"]));?> - <?php echo date("g:i a", strtotime($row["to_time"]));
            ?></p>
              <?php 
          $date_now = date("Y-m-d");
            if ($date_now > $row["dob"])
              {?>
                
    <button type="button" class="btn btn-outline-light delbtn" name="delbtn" id="<?php echo $row["booking_id"];?>">Delete</button><?php
                }
                else
                {?>
                <button name="delbtn" class="btn btn-outline-light" id="<?php echo $row["booking_id"];?>" value="Delete">Edit</button>
                  <button name="delbtn" class="btn btn-outline-light delbtn" id="<?php echo $row["booking_id"];?>" value="Delete">Delete</button>
                <?php
              }?>
          
    
  </div>

</div>
<?php
}}
?>

<script type="text/javascript">
  
$(document).ready(function(){

  $('.delbtn').click(function(){
      
      var id=$(this).attr("id");

     
      console.log(id);

      $.ajax({

       url:"delitem.php",
       dataType:"text",
       method:"GET",
       data:{
        id:id
       },success:function(data){
             
             var result=$.trim(data);
              
              console.log(result);

             if(result=='Y')
             {
                
              alert("Item Deleted");
              header('Location: http://localhost/stud/viewbookings.php');
             }
             else
             {
              alert('Not deleted');
             }
       }
      });
  });

});

</script>



      </div>


</body>
</html>
  