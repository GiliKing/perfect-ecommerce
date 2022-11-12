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
                <h3>Password Reset</h3>

                <p>To reset your password please enter your email</p>

                <p id="load" style="display: none;">Loading....</p>
                <input type="email" id="email">
                <span class="err2"></span>

                <button type="button" id="button">Send</button>

            </form>
        </div>

    </div>
    

    <script src="js/jquery.js"></script>
    <script src="js/forget.js"></script>
</body>
</html>