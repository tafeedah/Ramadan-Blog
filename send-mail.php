<?php
  use PHPMailerPHPMailerPHPMailer;
  use PHPMailerPHPMailerException;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
	$subject = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
	  $mail->Host = 'aspmx.l.google.com';
      //$mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'khaliljamil95@gmail.com';
      // Gmail Password
      $mail->Password = 'minalibraheem';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      //$mail->Port = 465;
	  $mail->Port = 25;

      // Email ID from which you want to send the email
      $mail->setFrom('khaliljamil95@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('ahmadkhaliljamil@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us, We&#39;ll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>