<?php

    session_start();

    if(!isset($_SESSION['users']['email1'])) {   

        header("location: login.php");

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
    <title>cleancreations</title>

    <script src="https://kit.fontawesome.com/3aad532998.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cat-one.css">

</head>
<body>

    <input id="name_cust" type="hidden" value="<?php echo $_SESSION['users']['email1']; ?>">

    <div class="all">
    </div>
    <div class="wrap_nav">
        <!-- styling of the nav -->
        <!-- for large screen -->
        <nav id="nav1">
            <span id="span1">Current Menu</span>
            <span id="span2">Grab & Go</span>
            <img src="asset/client_logo.png" id="span3" width="60px" height="50px">
            <span id="span4">shop<img src="asset/arrowdrop.png"></span>
            <span id="span5">Blog</span>
            <span id="add_span">0</span><img src="asset/shopping.png" id="span6" width="30px">
            <span id="span8">Logout</span>
        </nav>
        <!-- End Of Large Screen -->

        <!-- for small screen -->
        <nav id="nav2">
            <img src="asset/client_logo.png" id="span3" width="60px" height="50px">
            <span id="add_span_ok">0</span><img src="asset/shopping.png" id="span6" width="30px">
            <span id="span8"><span id="only_only">logout</span></span>
            <img src="asset/dropdown.png" id="span9" width="60px">

            <div class="current_m">
                Current Menu
            </div>

            <div class="shop_only">
                Shop
            </div>

            <div class="grab_only">
                Grab & Go
            </div>

            <div class="blog_only">
                Sign Out
            </div>
        </nav>
    </div>
    <!-- end of small screen -->

    <!-- drop down for shop -->
    <div class="shopdrop">
        <p>Subscription Meal Selection</p>
        <p>A la Carte</p>
        <p>Protien By Pound</p>
        <p>Customer Builder</p>
        <p>Extras</p>
        <p>Gift Card</p>
    </div>
    <!-- end of dropdown for shop -->


    <!-- end of the nav -->

    <!-- img stay -->



    <!-- wrapping of required sections -->

    <div class="wrapping_only">
        <div class="img">
            <div class="text-img">
                <h1>Get started</h1>
                <h1>with African Kitchen</h1>

                <p>We make eating healthy convenient and delicious so you can 
                    have more time to do the things you love.</p>
                
                <button>Get Started</button>
            </div>
        </div>


        <!-- second section -->
        <div class="attach_image_first">
            <div class="container">
                <div class="attach_text_first">
                
                    <h1>African Kitchen</h1>

                    <p>Not interested in a plan? Shop our online menu and pick as many or few meals as you need.</p>
                    
                    <div class="col-sm-12">
                        <div class="row">
                    <?php
                        require "./category/show-african.php";
                    ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end of second section -->

        <!-- start of third section -->
        <div class="third_section">
            <div class="container">
                <h1 style="text-align: center; margin-top: 100px;">Plans For Everyone</h1>
                <p style="text-align: center; margin-bottom: 50px;">Consistency in your diet starts with a plan. Choose from 2,3, or 4 meals per day for 5,6, or 7 days.
                    Plans are subscription based but can be changed at any time to meet your needs.
                </p>


                <div class="col-sm-12" style="padding-bottom: 80px;">
                    <div class="my_row">
                        <div class="my_card1">
                            <h5>The Life Style Plan</h5>
                            <p style="text-align: center;">as low as</p>
                            <p style="text-align: center;">N9.76 per meal</p>

                            <div class="choose_link">
                                <a href="#">CHOOSE</a>
                            </div>
                        </div>

                        <div class="my_card2">
                            <h5>The Low Carb Plan</h5>
                            <p style="text-align: center;">as low as</p>
                            <p style="text-align: center;">N9.76 per meal</p>

                            <div class="choose_link">
                                <a href="#">CHOOSE</a>
                            </div>
                        </div>

                        <div class="my_card3">
                            <h5>The Low Carb Plan</h5>
                            <p style="text-align: center;">as low as</p>
                            <p style="text-align: center;">N9.76 per meal</p>

                            <div class="choose_link">
                                <a href="#">CHOOSE</a>
                            </div>
                        </div>

                        <div class="my_card4">
                            <h5>The Vegan Plan</h5>
                            <p style="text-align: center;">as low as</p>
                            <p style="text-align: center;">N9.76 per meal</p>

                            <div class="choose_link">
                                <a href="#">CHOOSE</a>
                            </div>
                        </div>

                        <div class="my_card5">
                            <h5>The Vegetarian Plan</h5>
                            <p style="text-align: center;">as low as</p>
                            <p style="text-align: center;">N9.76 per meal</p>

                            <div class="choose_link">
                                <a href="#">CHOOSE</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end of third section -->

        <!-- start of fourth  section -->
        <div class="fourth_section">
            <div class="container">
                <div class="test_mony">
                    <h1 style="text-align: center;">What People Are Saying</h1>

                    <div class="my_col">
                        <div class="arr_1" onclick="speed1()" style="cursor: pointer;">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>

                        <div class="text_l" id="text_change_click1">
                            <p style="text-align: center;">
                                Food is prepared perfectly. Makes meal prepping more convenient and saves time. Taste great. Highly recommend.
                            </p>

                            <h3 style="text-align: center;">
                                ~Monique Encalade
                            </h3>
                        </div>

                        <div class="text_l" id="text_change_click2" style="font-size: 0px">
                            <p style="text-align: center;">
                                Love this place! They do a terrific job putting together creative and healthy menus. I’ve tried several meal delivery services, but this is my favorite by far. Super convenient too- highly recommend.
                            </p>

                            <h3 style="text-align: center; font-size: 0px;">
                                ~Rhett Majoria
                            </h3>
                        </div>

                        <div class="text_l" id="text_change_click3" style="font-size: 0px">
                            <p style="text-align: center;">
                                Healthy, clean, yummy, and in my case VEGAN meals (they offer meat ones too). It can be really hard to eat a meat-free diet down South and this has helped me immensely! The portion sizes are perfect. Fave dishes include coconut rice, masala, and artichoke caper pasta.
                            </p>

                            <h3 style="text-align: center; font-size: 0px;">
                                ~Alexis Sherman
                            </h3>
                        </div>

                        <div class="text_l" id="text_change_click4" style="font-size: 0px;">
                            <p style="text-align: center;">
                                I have always been so impressed with everything we've ever had from here. Both quality and taste!!!
                            </p>

                            <h3 style="text-align: center; font-size: 0px;">
                                ~Emily Hoskins
                            </h3>
                        </div>

                        <div class="arr_2" onclick="run1()" style="cursor: pointer;"> 
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- end of fourth section -->

        <!-- start of fifth section -->
        <div class="fifth_section">
            <div class="container">
                    <div class="fifth_1">
                        <img src="asset/fifth1.png" alt="" width="100%">

                        <div class="fifth_text_1">
                            <h1>
                                Our mission is to make clean eating delicious and convenient for everyone.
                            </h1>

                            <p>
                                Our mission is to make clean eating simple and convenient. You should never have to sacrifice quality,
                                 flavor or nutrition when it comes to your, which is why we offer the highest quality ingredients in our meals. Every meal we prepare is created with passion and care by our
                                 incredible chef and culinary team. We are more passionate than ever that we can truly change peoples lives with clean eating!
                            </p>

                            <div class="fifth_link">
                                <a href="#">LEARN MORE</a>
                            </div>
                        </div>
                    </div>




                    <div class="fifth_1_ok">
                        <img src="asset/fifth2.jpg" alt="" width="100%">

                        <div class="fifth_text_1_ok">
                            <h1>
                                Get Started With a Healthier You
                            </h1>

                            <p>
                                The convenience of a well prepared, healthy, flavorful meal with no shopping, 
                                preparing, or clean up is a total game changer for your lifestyle!
                            </p>

                            <div class="fifth_link_ok">
                                <a href="#">SING UP NOW!</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end of fifth section -->


        <!-- start of last section -->
        <div class="last_section">
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

            <div style="text-align: center; color: white; padding-bottom: 20px;">
                <small id="giliking" style="cursor: pointer">Design by giliking</small>
            </div>
        </div>
        <!-- end of last section -->

        <div class="cart_display_cont">
            <span id="add_span1">0</span>
            <button id="buy_now">Buy Now</button>
        </div>


    </div>
    <!-- end of wrapping -->
    
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/jquery.js"></script>
    <script src="js/add-cart-db.js"></script>
    <script src="js/user.js.js"></script>
</body>
</html>