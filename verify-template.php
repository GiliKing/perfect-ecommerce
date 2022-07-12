<?php

session_start();

if(!isset($_SESSION['users']['email1'])) {   

    header("location: error.php");

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
            // do nothing
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
    <title>Verify Your email</title>

    <link rel="stylesheet" href="css/verify.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="first">

    </div>

    <div class="second">

        <div class="light_border">
            <h1>A Verification Link has being sent to your email</h1>
            <p>Login to your email and click on the verify link<p>

            <p>Thanks for Registering</p>
        </div>
    </div>
</div>


</body>
</html>