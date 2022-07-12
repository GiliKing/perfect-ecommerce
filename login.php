
<?php

session_start();

if(!isset($_SESSION['users']['email1'])) {   

    // header("location: login.php");

} else {

    $email_entry = $_SESSION['users']['email1'];

    require 'database/connect.php';

    $ok_check = "SELECT `verified` AS `very` FROM `users` WHERE `email` ='$email_entry' LIMIT 1";

    $ok_result = mysqli_query($conn, $ok_check);

    if($ok_result) {

        $row = mysqli_fetch_assoc($ok_result);

        $verified = $row['very'];


        if($verified == 1) {

            header("location: user.php");

        } else { 
            
            header("location: error.php");
        }
    }


}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/login.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>

    <!-- creatint the container the for the login -->
    <div class="container">

        <div class="first">

        </div>

        <div class="second">
            <form>
                <h3>Login to Clean Creations</h3>

                <p>To access your account please login with your email address and password.</p>

                <p class="exist"></p>
                <div class="form">
                    <div class="cover">
                        <label>Your email</label>
                        <input type="email" id="email">
                        <span class="err2"></span>
                    </div>

                    <div class="line"></div>

                    <div class="cover">
                        <label>Your password</label>
                        <input type="password" id="password">
                        <span class="err3"></span>
                    </div>

                </div>

                <div class="sign">
                    <span id="sign_ok">Dont have and account?</span>

                    <span id="ok_sign">forget password?</span>
                </div>

                <button type="button">Login</button>

            </form>
        </div>

    </div>
    

    <script src="js/jquery.js"></script>
    <script src="js/login.js"></script>
</body>
</html>