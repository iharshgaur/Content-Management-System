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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once 'PHPMailer\PHPMailer\src\Exception.php';
include_once 'PHPMailer\PHPMailer\src\PHPMailer.php';
include_once 'PHPMailer\PHPMailer\src\SMTP.php';

$msg = '';

    if (isset($_POST['submit'])) {

        $message = $_POST['message'];

        if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
            $file = "attachment/" . basename($_FILES['attachment']['name']);
            move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
        } else
            $file = "";

        $mail = new PHPMailer();

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'arnab15102012@gmail.com';                 // SMTP username
    $mail->Password = 'Inception1984';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
        //Recipients
    $mail->setFrom('arnab15102012@gmail.com', 'Arnab');
    $mail->addAddress('arnab15102012@gmail.com', 'AT');     // Add a recipient

        $mail->Subject = "New Grievance";
        $mail->isHTML(true);
        $mail->Body = $message;
        $mail->addAttachment($file);

        if ($mail->send())
            $msg = "Your email has been sent, thank you!";
        else
            $msg = "Please try again!";

        unlink($file);
    }
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
      <div style="text-align: center;">
      <form method="post" action="grievance.php" enctype="multipart/form-data">
          <p style="margin-top: 150px; font-size: 1em;">The Grievance System preserves your confidentiality and enables you to report issues to the top-level manageent anonymously.</p>
        <textarea class="form-control" name="message" placeholder="Enter your complaints here" rows="3" style="margin-top: 25px; width: 60%; border-radius: 20px; display: inline-block;"></textarea>
      </div>
      <input type="file" name="attachment" class="form-control-file" style="width: 250px; margin-top: 15px; margin-left: auto; margin-right: auto; display: block;">
        <button type="submit" class="login btn btn-outline-primary" name="submit" style="border-radius: 20px; width: 150px; margin-left: auto; margin-right: auto; display: block; margin-top: 20px;">Submit</button>
      </form>
      <?php echo $msg; ?>
    </div> 
    </div>
</body>
</html>