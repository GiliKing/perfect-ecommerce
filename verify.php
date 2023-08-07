    
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

if(!isset($_SESSION['users']['email1'])) {   

    // header("location: error.php");
    echo "yes verigy has issues";

} else {

    $name_entry = $_SESSION['users']['name1'];
    $email_entry = $_SESSION['users']['email1'];
    $token_entry = $_SESSION['users']['token_tok'];

    require 'database/connect.php';

    $ok_check = "SELECT `verified` AS `very` FROM `users` WHERE `email` ='$email_entry' LIMIT 1";

    $ok_result = mysqli_query($conn, $ok_check);

    if($ok_result) {

        $row = mysqli_fetch_assoc($ok_result);

        $verified = $row['very'];

        if($verified == 1) {

            header("location: user.php");

        } else {

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
                $mail->addReplyTo('christianogili@zohomail.com', 'Ogili Christian');
        
        
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Verify Your Email';
                $mail->Body    = '
                <html>
                    <head>
                        <title>'.$name_entry.' Verify Your Email</title>
                    </head>
                    <body style="text-align: center">
                        <div style="font-size: 20px;">
                            Clean Creation
                        </div>

                        <h1>Thanks for signing up</h1>

                        <p>Verify Your Email By Clicking the button below</p>

                        <a style="text-decoration: none; border: 1px solid yellowgreen; padding: 10px 10px 10px 10px;" href="http://perfect-restaurant.great-site.net/verifyemail.php?id='.$token_entry.'">Verify</a>
                        </body>


                        <p>Regards</p>
                        <p>Clean Creation</p>
                    </body>
                </html>
                ';
        
                $success = $mail->send();
        
                if($success) {

                    echo '
                    <script>
                        window.location.href = "http://perfect-restaurant.great-site.net/verify-template.php";
                    </script>
                    ';

                    // header("locatrion: https://perfect-restaurant.herokuapp.com/verify-template.php");
                    
                    // echo 'Message has been sent';

                    

                }
    

            } catch (Exception $e) {
        
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

    }

    

}

 
?>
