<?php
 include('server.php');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

include('sidebar.php');

?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home For Students</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="assets/css/main.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="assets/css/sidebar.css">

</head>
<body>
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col">
                  <a href="noticesT.php">
                  <div class="card border-0 box space shadow-card" style="height: 86px;">
                    <h4 class="card-title font" style="font-size: 1.6em; margin-top: 17px;">Notices</h4>
                  </div></a>
                </div>
                <div class="col">
                  <a href="grievanceT.php">
                  <div class="card border-0 box space shadow-card" style="height: 86px;">
                    <h4 class="card-title font" style="font-size: 1.6em; margin-top: 17px;">Grievances</h4>
                  </div></a>
                </div>
                <div class="col">   
                 <a href="notesT.php">
                  <div class="card border-0 box space shadow-card" style="height: 86px;">
                    <h4 class="card-title font" style="font-size: 1.6em; margin-top: 17px;">Notes</h4>
                  </div></a>
                </div>
                <div class="col">
                <a href="tutorialsT.php">
                  <div class="card border-0 box space shadow-card" style="height: 86px;">
                    <h4 class="card-title font" style="font-size: 1.6em; margin-top: 17px;">Tutorials</h4>
                  </div></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>