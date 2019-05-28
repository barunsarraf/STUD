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
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
      <li class="nav-item">
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
    <button class="dropdown-item" type="button">profile</button>
    <button class="dropdown-item" type="button">Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>

  </div>
</nav>
<div style="padding: 40px;background-color: #FAFAFA" align="left">
    <div style="display: block;"></div><span> <!--HIDDEN TEXT-->

  <div style="padding: 20px,border-radius: 5px;float: left;display: inline-block;">
  <div style="max-width: 18rem;" align="left">
    <div class="card" style="width: 14rem;"">
      <img src="image2.jpg"  class="rounded float-left card-img-top" alt="image">
  <div class="card-body">
    <h5 class="card-title" style="margin-top: -15px">Barun Sarraf</h5>
    <h8 class="card-text" style="margin-top: -10px">barunsaraf1</h8>
  </div>
</div>
<div align="left">
<class="card-text" style="color: #A9A9A9;font-size: 12px" align="left" ><i class="fas fa-envelope"></i> barunsaraf1@gmail.com</class="card-text"><br>
<class="card-text" style="color: #000;font-size: 12px" align="left" ><i class="fas fa-star-half-alt"></i> Stud Rating:<b> 4.65</b><br>
<class="card-text" style="color: #000;font-size: 12px" align="left" ><i class="fas fa-star-half-alt"></i> Bud Rating:<b> 8.5</b></class="card-text">
<br>
<div style="max-width: 12rem;">
<?php
      $uid=$_SESSION["user_id"];
        $query="SELECT DISTINCT topic_name FROM topics LEFT JOIN user_interest_topics ON topics.topic_id = user_interest_topics.topic_id WHERE user_interest_topics.user_id='$uid'";

      $result=mysqli_query($db,$query);


      while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
      {?>
        <span class="badge badge-warning"><?php echo $row["topic_name"]; ?></span>
        <?php 
      }?>
    </div>
    
</div>
   
   
</div>
   
  </h3></b><span></span> <!--HIDDEN TEXT-->

  </div>
  <p><p>
  <b style="margin-left: 20px;">You have 21 Bookings and 18 handled requests so far.</b>
</div>

</body>
</html>
