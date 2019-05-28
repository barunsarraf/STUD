<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.css" />


        

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
      <li class="nav-item active">
        <a class="nav-link" href="#">Become Stud</a>
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
    <a style="color: #fff">Logged In: <b>Barun Sarraf</b></a>&nbsp &nbsp
    <div class="btn-group">
  <button type="button" class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="submit">
    settings
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="window.location.href='user_profile.php'">profile</button>
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

  <div style="display: block;"></div><span> <!--HIDDEN TEXT--></span>
<div style="margin-top: 100px;">
  <h1 class="display-4">Book <b>Appointment</b></h1>
  <hr align="center" width="50%" style="background-color: #A9A9A9;">
  <div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
  <div class="card-header">Select Date, Time and Topic of your interest.</div>
</div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <p id="basicExample">
                      <b>Date</b>
                    <input type="text" name="booking_date" style="
      height: 25px;
      width: 100px;
      margin-top:5px;
      border: none;
      border:solid 1px #A9A9A9;
      border-radius: 5px;" class="date start"/> <b>From</b>
                    <input type="text" name="from_time" style="
      height: 25px;
      width: 100px;
      margin-top:5px;
      border: none;
      border:solid 1px #A9A9A9;
      border-radius: 5px;"  class="time start" /> <b>to</b>
                    <input type="text" name="to_time" style="
      height: 25px;
      width: 100px;
      margin-top:5px;
      border: none;
      border:solid 1px #A9A9A9;
      border-radius: 5px;" class="time end" />
                     <div class="dropdown mr-1">
                      <select name="topic_category" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" id ="top" aria-haspopup="true" aria-expanded="false" data-offset="10,20" >
  <option value="1" selected="selected">Marvel Series</option>
  <option value="2">Cosmos</option>
  <option value="3">Politics</option>
  <option value="4">Health</option>
  <option value="5">Entertainment</option>
  <option value="6">Education</option>
  <option value="7">Business</option>
</select>
    <script type="text/javascript">
      
    </script>
    <button type="submit" name="submit" class="btn btn-outline-succes" >Book</button>
  </div>
                
                
              </form>
            </div>
<script>
                $('#basicExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                $('#basicExample .date').datepicker({
                    'format': 'yyyy/m/d',
                    'autoclose': true
                });

                var basicExampleEl = document.getElementById('basicExample');
                var datepair = new Datepair(basicExampleEl);
            </script>
</div>
<?php 
include "config.php";
    if(isset($_POST['submit'])){
        $b_date = $_POST['booking_date'];
        $ftime=$_POST['from_time'];
        $ttime=$_POST['to_time'];
        $userid=$_SESSION["user_id"];
        $topp=$_POST['topic_category'];

        $date = DateTime::createFromFormat( 'H:i A', $ftime);
        $formatted_ftime = $date->format( 'H:i:s');
        $date = DateTime::createFromFormat( 'H:i A', $ttime);
        $formatted_ttime = $date->format( 'H:i:s');

        $query="INSERT INTO `booking_record`(`user_id`, `topic_id`, `from_time`, `to_time`, `dob`) VALUES ('$userid','$topp','$formatted_ftime','$formatted_ttime','$b_date')";

        $result=mysqli_query($db,$query);
?>
     

<?php
        echo "Appointment Booked!!";
    }
?>






  


</div>

</div>
</body>
</html>
  