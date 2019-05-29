<?php
include "config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="book.php">Become Stud</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewbookings.php">Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="request.php">Requests</a>
      </li>
    </ul>
    <a style="color: #fff">Welcome <b>
      <?php
      $uid=$_SESSION["user_id"];
      $query="SELECT name from users where user_id='$uid'";
      $result=mysqli_query($db,$query);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      echo $row["name"];
      ?>
        
      </b></a>&nbsp &nbsp
    <div class="btn-group">
  <button type="button" class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="submit">
    settings
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="window.location.href='user_profile.php'" >profile</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='setting.php'" >Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>

  </div>
</nav>
<div style="padding: 10px;background-color: #FAFAFA">

	<div style="display: block;"></div><span> <!--HIDDEN TEXT-->

	<div style="padding: 20px,border-radius: 8px;float: right;display: inline-block;">

		<p align="center" style="color: #263238"><b>Current Bookings</b></p>
	<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">


  <div class="card-header">
    <?php 
  $uid=$_SESSION["user_id"];
  $query="SELECT * FROM booking_record where user_id='$uid' AND dob >= CURDATE() ORDER BY dob DESC LIMIT 1;";
  $rt=mysqli_query($db,$query);
  $row=mysqli_fetch_array($rt,MYSQLI_ASSOC);
   $date_now = date("Y-m-d");
  $date=$row['dob'];
if ($rt->num_rows <= 0)
  {
    echo "";
  }
else{
    if ($date_now == $row["dob"]) {
        echo 'Today';
    }else{
        echo $row["dob"];
    }
  }

   ?></div>
  <div class="card-body">
    <h5 class="card-title">
        <?php 
        if ($rt->num_rows <= 0)
  {
    echo "No Bookings yet!";
  }else{
        $tid=$row['topic_id'];
          $q="SELECT topic_name from topics where topic_id='$tid';";
          $result=mysqli_query($db,$q);
          $r=mysqli_fetch_array($result,MYSQLI_ASSOC);
          echo $r["topic_name"];
        }
        ?></h5>
    <p class="card-text"><?php 
    if ($rt->num_rows <= 0)
  {
    echo "";
  }else{
      echo date("g:i a", strtotime($row["from_time"]));?> -<?php echo date("g:i a", strtotime($row["to_time"]));
    }?></p>
    <button type="button" class="btn btn-outline-light" onclick="location.href = <?php if ($rt->num_rows <= 0)
  {
    echo "'book.php'";
  } else
  {
    echo "'viewbookings.php'";
  }

   ?>;"><?php if ($rt->num_rows <= 0)
  {
    echo "Book Here!";
  }else{
    echo "View All";
  }
   ?> <span class="badge badge-light">
      <?php
        if ($rt->num_rows <= 0)
  {
    echo "";
  }else{
      $count_query= "SELECT COUNT(booking_id) as total FROM booking_record where user_id='$uid';";
       $result=mysqli_query($db,$count_query);
          $count_result=mysqli_fetch_array($result,MYSQLI_ASSOC);
          echo $count_result["total"];
        }
      ?>

    </span></button>
  </div>
    </div>
    <!-- -->
    <p align="center" style="color: #263238"><b>Pending Requests</b></p>
    <div class="card border-dark mb-3" style="max-width: 250px;max-height: auto">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="image.png" class="card-img" alt="image_alt" style="margin-top: 2px;margin-left: 1px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Barun Sarraf</h5>
        <p class="card-text">Marvel Series</p>
		<button type="button" class="btn btn-outline-dark">View All <span class="badge badge-success">4</span></button>
      </div>
    </div>
  </div>
</div>
    <!-- -->

    </div>
</span>

<div style="margin-top: 150px">
  <h1 class="display-4">Become a <b>STUD</b></h1>
  <p class="lead" style="margin-left: 4px">Book an appoitment and share your thoughts on a topic you are interested in. We give you a better<br>platform where you have power to talk with the user you are interested on the basis of rattings or your choice.</p>
  <hr align="left" width="50%" style="background-color: #000;margin-left: 4px">
  <p style="margin-left: 4px">We can help you to explore your thoughts.</p>
	<button type="button" class="btn btn-dark btn-sm" style="margin-left:  4px"onclick="window.location.href='book.php'">Book your Appointment</button>
  <button type="button" class="btn btn-dark btn-sm" style="margin-left:  4px" onclick="window.location.href='requestforappo.php'">Attend Appointment</button>
	<br>
</div>






	


</div>

</div>

</body>
</html>
	