<?php 
include('server.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body class="login_b">
  <div class="card sign-in shadow-lg p-3 mb-5 bg-white rounded border-0">
    <form method="post" action="login.php">
      <div class="form-group">
        <h3 style="color: #808080">Sign-in</h3>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
          <span><img src="assets/images/male1.jpg" style="margin-right: 10px; margin-top: 25px;"></span>
          </div>
        <input type="text" class="usn form-control" name="username" placeholder="Username" style="border-radius: 20px;">
        </div>    
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span><img src="assets/images/pass1.jpg" style="margin-right: 10px; margin-top: 25px;"></span>
        </div>
        <input type="password" class="password form-control" name="password" placeholder="Password" style="border-radius: 20px;">
        </div> 
         <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="pos" value="S" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline1">Students</label>
          </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline2" name="pos" value="T" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline2">Teachers</label>
          </div>
          <div>
        <button type="submit" class="login btn btn-outline-primary" name="login_user" style="border-radius: 20px;">Login</button>
        </div>
       
        <?php include('errors.php'); ?>
       </form>
          <p style="margin-top: 18px;">Not A Member? <a href="registration.php">Sign Up!</a></p>
</body>
</html>