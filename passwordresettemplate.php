
<?php

session_start();

if(!isset($_SESSION['users']['token_reset'])) {   

    header("location: index.php");

} else {

    $token_entry = $_SESSION['users']['token_reset'];

    require 'database/connect.php';

    $ok_check = "SELECT * FROM `users` WHERE `token` ='$token_entry' LIMIT 1";

    $ok_result = mysqli_query($conn, $ok_check);

    if($ok_result) {

        // do nothing
        
    } else {

        header("location: index.php");


    }


}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

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
                <h3>Clean Creation</h3>

                <p>Reset Your Password</p>


                <p id="load" style="display : none;">Loading....</p>

                <div class="form">
                    <p class="err4" style="text-align: center;"></p>
                    <div class="cover">
                        <label>Enter Password</label>
                        <input type="password" id="email" class="password">
                        <span class="err2"></span>
                    </div>

                    <div class="line"></div>

                    <div class="cover">
                        <label>Enter Password Again</label>
                        <input type="password" id="password">
                        <span class="err3"></span>
                    </div>

                </div>

                <button type="button" id="button">Submit</button>
            </form>
        </div>

        <input type="hidden" value="<?php echo $_SESSION['users']['token_reset'] ?>" id="old_token">

    </div>
    

    <script src="js/jquery.js"></script>
    <script src="js/passwordreset.js"></script>
</body>
</html>