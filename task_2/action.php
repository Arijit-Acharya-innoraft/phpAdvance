<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status page</title>
  <!-- Linking the css file. -->
  <link rel="stylesheet" href="form.css">
</head>

<body>
  <?php

  /**
   * Calling and using the phpmailer composer.
   */
  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  if (isset($_POST["submit"])) {

    /**
     *  This line is used to call the phpmailer and use it.
     *  @param TRUE is used for throwing exceptions on errors.
     */
    $mail = new PHPMailer(TRUE);

    /**
     * The function "isSMTP()" is been used when you want to tell PHPMailer class to use, the custom SMTP configuration defined instead of the local mail server.
     * The Simple Mail Transfer Protocol (SMTP) is an application used by mail servers to send, receive, and relay outgoing email between senders and receivers.
     */
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";

    /**
     * It is an extension of the Simple Mail Transfer Protocol (SMTP) whereby a client may log in using any authentication mechanism supported by the server. 
     * It is mainly used by submission servers, where authentication is mandatory.
     */
    $mail->SMTPAuth = true;

    /**
     * It is the user name of the sender.
     */
    $mail->Username = "evalid41@gmail.com";

    /**
     * Passward generated from gmail by the sender.
     */
    $mail->Password = "iyljhnsjinsvyvjo";

    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    /**
     * Setting the sender's email address.
     */
    $mail->setFrom("evalid41@gmail.com");

    /**
     * Setting the receiver's email address.
     */
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);

    /**
     * To add the subject and the body of the mail.
     */
    $mail->Subject = "Auto Generated Mail.";
    $mail->Body = "Thank you for your submission.";
    
    /**
     * For sending the mail.
     */
    $mail->send();
  ?>
  
  <h1> <?php echo "Successfully submitted"; ?> </h1>
  <?php
  }
  ?>
</body>

<!-- Using Js to give a alert msg that the email is send. -->
<script>
  alert("Email Send");
  documeent.location.href = "index.php";
</script>

</html>
