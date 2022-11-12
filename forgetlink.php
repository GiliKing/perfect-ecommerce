    
<?php



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);




session_start();

if(!isset($_SESSION['users']['email_reset'])) {   

    header("location: error.php");

} else {

    $name_entry = $_SESSION['users']['name_reset'];
    $email_entry = $_SESSION['users']['email_reset'];
    $token_entry = $_SESSION['users']['token_reset'];

    // echo "No verifcation";

    try {
            //Server settings
        $myemail = "christianogili@zohomail.com";
        $mypassword = "Hoh9090#"; 

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   =   $myemail;                   //SMTP username
        $mail->Password   =   $mypassword;                          //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
        $mail->setFrom('christianogili@zohomail.com', 'Ogili Christian');
        $mail->addAddress("$email_entry", "$name_entry");     //Add a recipient
        // $mail->addReplyTo('chrisogili12@gmail.com', 'Ogili Christian');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verify Your Email';
        $mail->Body    = '
        <html>
            <head>
                <title>'.$name_entry.' Verify Your Email</title>
            </head>
            <body style="border: 2px solid grey; border-radius: 10px; text-align: center;">
                <p>
                    Clean Creation
                </p>

                <h1>Thanks for signing up</h1>

                <p>Click the link below to reset you password</p>

                <!-- <a href="https://perfect-restaurant.herokuapp.com/resetpasswordlink.php?id='.$token_entry.'">Verify</a> -->
                <a style="text-decoration: none; padding-top: 10px; padding-bottom: 10px; padding-right: 10px; padding-left: 10px; background-color: green; border-radius: 20px; color: white;" href="http://localhost/php-project1/ecom/resetpasswordlink.php?id='.$token_entry.'">Password Reset</a>
                <p>Regards</p>
                <p>Christian</p>
            </body>
        </html>
        ';

        $success = $mail->send();

        if($success) {

            echo "sent%";

        }


    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    

}

 
?>
