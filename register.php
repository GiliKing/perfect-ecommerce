<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/register.css">

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
                        <label>Your username</label>
                        <input type="text" id="name" required>
                        <span class="err1"></span>
                    </div>

                    <div class="line"></div>

                    <div class="cover">
                        <label>Your email</label>
                        <input type="email" id="email" required>
                        <span class="err2"></span>
                    </div>


                    <div class="line"></div>

                    <div class="cover">
                        <label>Your password</label>
                        <input type="password" id="password" required>
                        <span class="err3"></span>
                    </div>

                </div>

                <div class="sign">
                    <span id="sign_ok">Already have and account?</span>
                </div>

                <button type="button">Sign Up</button>

            </form>
        </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/register.js"></script>
</body>
</html>