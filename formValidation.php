<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
console_log("form validation.");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require '/home/user/vendor/autoload.php';
console_log("before include vendor/autoloader.");
include './vendor/autoload.php';
console_log("after include vendor/autoloader.");


//---------------------
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$errors = [];
$lastName = "";
$firstName ="";
$gender = "";
$email = "";

if(isset($_POST)){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // 1. Sanitisation
    echo "<br>email before Sanitisation : $email";
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    echo "<br>email after Sanitisation : $email";

    // 2. Validation
    if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = "This address $email is invalid.";
    } else {
        echo "<br>email $email is valid.";
    }
 
    // 3. execution 
    if (count($errors)> 0){// if no error then
        echo "<br>There are mistakes!";
        echo "<br>";
        print_r($errors);
        //exit;  stop the execution of the web page
    } else {

        echo "<br>There are NO mistakes!";
        echo "<br>Mail shall be sent to the email $email";
        echo "<br><br>";
        switch($subject){
            case "command" : $msg = "We have well received your command : <br><br>\"$message\"<br><br><br>You must be delivered within the following days.
            <br>A new mail of confirmation of the delivery of your command will be sent at least 24h before the delivery.<br><br>Hakers Poulette team.";
                            break;
            case "claim"   : $msg = "We have well received your claim : <br><br>\"$message\"<br><br>We will treat it as soon as possible.<br><br>Hakers Poulette team.";
                            break;
            default : $msg = "We have well received your message : <br><br>\"$message\"<br><br><br>Hakers Poulette team.";
        }
		echo '<br>retrieving environment data:';
		$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
		echo '<br>load environment data:';
		$dotenv->load();
		echo '<br>set mail parameters :';  
		$SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$Server = $_ENV['SMTP_SERVER'];
      $port = $_ENV['PORT'];
      $userName = $_ENV['NAME'];
      $password = $_ENV['PASSWORD'];
		echo '<br>used SMPT Server:'.($Server);

        try {
			   echo '<br>trying to send email:<br>' ;
				// Instantiation and passing `true` enables exceptions
				echo '<br>creating mail object.<br>' ;
            $mail = new PHPMailer(true);
            //$mail->SMTPDebug = 2;
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Disable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = $Server;                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $userName;                     // SMTP username
            $mail->Password   = $password;                               // SMTP password
            $mail->SMTPSecure = $SMTPSecure;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = $port;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($userName, 'Mailer');
            $mail->addAddress($email , ($firstName.$lastName));     // Add a recipient
            //$mail->addAddress('ellen@example.com');                       // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/home/user/Learning-Environment/404_not_found/ressources/404NotFound.jpeg');         // Add attachments
            $mail->addAttachment('./img/hackers-poulette-logo.png', 'logo.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $msg;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				echo '<br>sending the mail.<br>' ;
            $mail->send();
            echo '<br>Message has been sent';
            console_log("Message has been sent.");

        } catch (Exception $e) {
            echo "<br>Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            console_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
 //come back to the form, passing with method=POST ,the useful data to fill back the form
echo '<br><br><form method="POST" action="./index.php">
        <input type="text" name="lastName" value="'.$lastName.'" hidden>
        <input type="text" name="firstName" value="'.$firstName.'" hidden>
        <input type="email" name="email" value="'.$email.'" hidden> >
        <input type="radio" name="gender" value="'.$gender.'" checked hidden>
        <input type="text" name="country" value="'.$country.'" hidden>
        <input type="text" name="subject" value="'.$subject.'" hidden>
        <input type="text" name="message" value="'.$message.'" hidden>
        <input type="submit" name="submit" value="Return to form"></form>';

?>
