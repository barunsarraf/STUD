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
        <a class="nav-link" href="profile.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="book.php">Become Stud</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="viewbookings.php">Bookings</a>
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
    <button class="dropdown-item" type="button" onclick="window.location.href='user_profile.php'">Your profile</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='setting.php'">Settings</button>
    <hr>
    <button class="dropdown-item" type="button">Help</button>
    <button class="dropdown-item" type="button" onclick="window.location.href='track.php'">Track</button>

    <hr>
    <button class="dropdown-item" type="button" onclick="window.location.href='signout.php'">Sign Out</button>
  </div>
</div>
      <?php 
  $uid=$_SESSION["user_id"];
  $userquery="SELECT * FROM users where user_id='$uid';";
  $userrt=mysqli_query($db,$userquery);
  $userrow=mysqli_fetch_array($userrt,MYSQLI_ASSOC);

?>

  </div>
</nav>
<div style="padding: 40px;background-color: #FAFAFA" align="left">
    <div style="display: block;"></div><span> <!--HIDDEN TEXT-->

  <div style="padding: 20px,border-radius: 5px;float: left;display: inline-block;">
  <div style="max-width: 25rem;" align="left">
    <div style="width: 16rem;"">
        <div class="container">
  <img src="settingimage.svg"  class="rounded float-left card-img-top"  alt="image">
</div>

</div>
<div align="left">
<class="card-text btn btn-default " style="color: #A9A9A9;font-size: 12px;margin-left: 14px" align="left" ><i class="fas fa-envelope"></i> 
<?php
$em=$userrow['email_id'];
if(is_null($em))
  {echo "update email id";}
else
{
  echo $em;
}
?></class="card-text"><br>
<br>
    
</div>
   
   
</div>
   
  </h3></b><span></span> <!--HIDDEN TEXT-->

  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">General Settings</h5>
      <hr>


      <form action="" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="uname" aria-describedby="emailHelp" placeholder="Enter Your Name for Update" recquired>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="upass" id="exampleInputPassword1" placeholder="•••••••••••••••" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="uemailid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=<?php echo $userrow['email_id']; ?> required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email when you request for appointments..</small>
  </div>
  <hr>
  <h5 class="card-title">Topic Selection</h5>
  <hr>
  <div class="form-group" style="display: inline-block;">
  <label for="add" style=""><b>Add Topics</b></label>
  <select id="add" name="catadd" size="3"  tabindex="1" required>

    <?php
      $query2="SELECT DISTINCT * FROM topics WHERE name NOT IN (SELECT name FROM topics LEFT JOIN stud_interest_topics ON topics.id = stud_interest_topics.topic_id WHERE stud_interest_topics.stud_id='$uid')";

      $result2=mysqli_query($db,$query2);
      while ($rw=mysqli_fetch_array($result2,MYSQLI_ASSOC))
      {?>
        <option value=<?php echo $rw['id']; ?>><?php echo $rw["name"]; ?></option>

      <?php
      }
?>
</select>
<label for="deletetopic"><b>Remove Topics</b></label>
  <select id="deletetopic" name="catdelete" size="3" tabindex="1" required>
     <?php
      $query2="SELECT DISTINCT * FROM topics LEFT JOIN stud_interest_topics ON topics.id = stud_interest_topics.topic_id WHERE stud_interest_topics.stud_id='$uid'";

      $result2=mysqli_query($db,$query2);
      while ($rw=mysqli_fetch_array($result2,MYSQLI_ASSOC))
      {?>
        <option value=<?php echo $rw['id']; ?>><?php echo $rw["name"]; ?></option>
      <?php
      }
?>
</select>
</div><br>
<small class="form-text text-muted">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</small>
<br>
  <input name="update" type="submit" class="btn btn-primary mylabel" value="Update">
</form>



    </div>
  </div>
  <small align="right" class="form-text text-muted">Last Updated: <?php echo $userrow['last_updated']; ?></small>
</div>

</div>
<?php
  
  

  if(isset($_POST['update']))
  {

    $usname=$_POST['uname'];
    $uspass=$_POST['upass'];
    $usem=$_POST['uemailid'];
    $usaddtopic=$_POST['catadd'];
    $usdeltopic=$_POST['catdelete'];


    $password = password_hash($uspass, PASSWORD_DEFAULT);
    $hash =  md5( rand(0,1000) );


         $query1="UPDATE users set pass='$password' , hash= '$hash',name='$usname',email_id='$usem' WHERE user_id= '$uid' ";
        $result1=mysqli_query($db,$query1);

    $query2= "INSERT INTO `stud_interest_topics`(`stud_id`, `topic_id`) VALUES ('$uid','$usaddtopic')";
    $result2=mysqli_query($db,$query2);
    
    $query3= "DELETE FROM stud_interest_topics WHERE stud_id=1 AND topic_id='$usdeltopic'";
    $result3=mysqli_query($db,$query3);
      
     

  
      }


  ?>



</body>
</html>
