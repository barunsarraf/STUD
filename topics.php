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
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="book.php">Become Stud</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Topics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewbookings.php">Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Requests</a>
      </li>
    </ul>
    <a style="color: #fff">Logged In: <b>
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
    <button class="dropdown-item" type="button">Your profile</button>
    <button class="dropdown-item" type="button">Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>

  </div>
</nav>
<div style="padding: 10px;background-color: #FAFAFA" align="center">
	<div style="display: block;"></div><b><h3 style="margin-top: 5px">Interested Topics</h3></b><span> <!--HIDDEN TEXT-->
	<div style="padding: 20px,border-radius: 8px;float:center ;display: inline-block;">

    <?php
      $uid=$_SESSION["user_id"];
        $query="SELECT DISTINCT topic_name FROM topics LEFT JOIN user_interest_topics ON topics.topic_id = user_interest_topics.topic_id WHERE user_interest_topics.user_id='$uid'";

      $result=mysqli_query($db,$query);


      while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {?>
        <span class="badge badge-warning"><?php echo $row["topic_name"]; ?></span>
        

      <?php
      } 
       
      $query2="SELECT DISTINCT topic_name FROM topics WHERE topic_name NOT IN (SELECT topic_name FROM topics LEFT JOIN user_interest_topics ON topics.topic_id = user_interest_topics.topic_id WHERE user_interest_topics.user_id='$uid')";

      $result2=mysqli_query($db,$query2);
      ?><hr>
      <b><h3 style="margin-top: 5px">New Topics</h3></b>
      <?Php
      while ($rw=mysqli_fetch_array($result2,MYSQLI_ASSOC))
      {?>
        <span class="badge badge-secondary"><?php echo $rw["topic_name"]; ?></span>

      <?php
      }
?>
  </div>
  
</div>

</body>
</html>
	