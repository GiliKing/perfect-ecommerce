<?php

session_start();

if(!isset($_SESSION['users']['email_reset'])) {   

    header("location: index.php");

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Sent</title>

    <link rel="stylesheet" href="css/verify.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="first">

    </div>

    <div class="second">

        <div class="light_border">
            <h1>Password Reset Link has being sent to your email</h1>
            <p>Login to your email and click on the Reset link<p>

            <p>Thanks</p>
        </div>
    </div>
</div>


</body>
</html>