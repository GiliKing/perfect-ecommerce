<?php

    session_start();

    if(!isset($_SESSION['users']['email1'])) {   

        header("location: index.php");

    } else {

        $email_entry = $_SESSION['users']['email1'];

        require 'database/connect.php';

        $ok_check = "SELECT `verified` AS `very` FROM `users` WHERE `email` ='$email_entry' LIMIT 1";

        $ok_result = mysqli_query($conn, $ok_check);

        if($ok_result) {

            $row = mysqli_fetch_assoc($ok_result);

            $verified = $row['very'];


            if($verified == 1) {

                // header("location: user.php");

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
    <title></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/buyitem.css">

    <script src="https://kit.fontawesome.com/3aad532998.js" crossorigin="anonymous"></script>

</head>
<body>

    <input id="name_cust" type="hidden" value="<?php echo $_SESSION['users']['email1']; ?>">

    <div class="wrapper_only">
         <!-- for large screen -->
        <nav id="nav1">
            <span id="span1">Cleancreations</span>
            <span id="span2"><img src="asset/client_logo.png"  width="60px" height="50px"></span>
            <span id="span3"><span id="add_span"></span><img src="asset/shopping.png" id="span4" width="30px"></span>
            <span id="span5">Home</span>
            <span id="span6">logout</span>
        </nav>
        <!-- End Of Large Screen -->


         <!-- for small screen -->
         <nav id="nav2">
            <span id="span1">Cleancreations</span>
            <span id="span2"><img src="asset/client_logo.png"  width="60px" height="50px"></span>
            <span><img src="asset/dropdown.png" id="span3" class="span3" width="60px"></span>
        </nav>

        <div class="direct_ion">
            <div id="span12">
                <span id="span10"><span id="add_span">0</span><img src="asset/shopping.png" id="span11" width="30px"></span>
            </div>

            <div id="span13">
                <span id="signup">Home</span>
            </div>

            <div id="span14">
                <span id="login">logout</span>
            </div>
        </div>
        <!-- End Of small Screen -->



        <!-- start of container -->

        <div class="container mt-5 mb-5">
            <div class="error_back"></div>
            <div class="first_section">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="check_out">
                <form action="http://perfect-restaurant.great-site.net/function/initialize.php" method="POST">
                    <input type="hidden" name="name_pay" value="<?php echo $_SESSION['users']['email1'] ?>">
                    <input type="hidden" name="amount_pay" id="amount_pay">
                    <button type="submit">Check Out: N<span id="dis_fig"></span></button>
                </form>
            </div>
        </div>


        <div class="footer_ok">
            <div class="container">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
    
                                    <h1>Clean Creations</h1>
    
                                    <span style="display: block;">Replica</span>
                                    <span style="display: block;">replica@create.com</span>


                                    <span style="display: block; background-color: white; color: black; margin-top: 20px;
                                    border-radius: 5px; padding: 10px">
                                        Sign Up for our Newsletter
                                    </span>
                                    <span style="display: block; background-color: white; color: black; margin-top: 30px;
                                    border-radius: 5px; padding: 10px">
                                        invite a friend
                                    </span>

                                    <div style="margin-top: 30px;">
                                        <span style="margin-right: 20px; font-size: 30px;">
                                            <i class="fa-brands fa-twitter"></i>
                                        </span>
    
                                        <span style="margin-right: 20px; font-size: 30px;">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </span>
    
                                        <span style="margin-right: 20px; font-size: 30px;">
                                            <i class="fa-brands fa-instagram"></i>
                                        </span>
                                    </div>


                                    <div>
                                        <small><i class="fa-solid fa-copyright"></i> 2022 Replica. All Rights Reserved</small>
                                    </div>


    
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Clean Creations</h3>
                                    <p>Current Menu</p>
                                    <p>Contact Us</p>
                                    <p>Privacy Policy</p>
                                    <p>F.A.Q.</p>
                                    <p>Pickup Locations</p>
                                    <p>Grab & Go</p>
                                    <p>Blog</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Meal Ordering</h3>
                                    <p>Subscription Meal Selection</p>
                                    <p>À la Carte</p>
                                    <p>Proteins by the Pound</p>
                                    <p>Custom Meal Builder</p>
                                    <p>Extras</p>
                                    <p>Gift Card</p>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>




    <script src="js/jquery.js"></script>
    <script src="js/buyitem.js"></script>
</body>
</html>