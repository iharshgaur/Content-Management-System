<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\PHPMailer\src\Exception.php';
require 'PHPMailer\PHPMailer\src\PHPMailer.php';
require 'PHPMailer\PHPMailer\src\SMTP.php';

$msg = '';
if (array_key_exists('userfile', $_FILES)) {
    // First handle the upload
    // Don't trust provided filename - same goes for MIME types
    // See http://php.net/manual/en/features.file-upload.php#114004 for more thorough upload validation
    $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['userfile']['name']));
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        // Upload handled successfully
        // Now create a message
        $mail = new PHPMailer ();

        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
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
    
        $mail->Subject = 'PHPMailer file sender';
        $mail->Body = 'My message body';
        // Attach the uploaded file
        $mail->addAttachment($uploadfile);
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent!";
        }
    } else {
        $msg .= 'Failed to move file to ' . $uploadfile;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHPMailer Upload</title>
</head>
<body>
<?php if (empty($msg)) { ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000"> Send this file: <input name="userfile" type="file">
        <input type="submit" value="Send File">
    </form>
<?php } else {
    echo $msg;
} ?>
</body>
</html>