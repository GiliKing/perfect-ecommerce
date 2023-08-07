<?php

    session_start();

    if(!isset($_SESSION['admin']['email1'])) {   

        header("location: login.php");

    } else {

        $email_entry = $_SESSION['admin']['email1'];

        require 'database/connect.php';

        $ok_check = "SELECT `verified` AS `very` FROM `admin` WHERE `email` ='$email_entry' LIMIT 1";

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
    <title>Admin - Clean Creation</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/orders.css">
</head>
<body>

<!-- side bar first -->
<div class="wrapper">
      <div class="side_bar_content">
        <div class="container-fluid">
          <div class="col-sm-12">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa-solid fa-bars"></i> <b>open</b></span>

            <!-- side bar element -->
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: #FF4800;">&times;</a>
              <div class="logo_img">
                <img src="./asset/client_logo.png" alt="" width="50%">
              </div>
              <a href="#">Home</a>
              <a href="products.php">Products</a>
              <a href="orders.php?page=1">Orders</a>
              <a href="customers.php">Customers</a>
              <a href="logout.php">Logout</a>
            </div>
            
            <h2>Welcome Admin</h2>
            <p>You can see Customer orders here</p>
            <!-- end of sid ebar content -->
          </div>
        </div>
      </div>

      <div class="first_section">
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="text_one">
                    Orders
                </div>
                <div class="row">

                <?php
                    ini_set('display_errors', 'On');

                    // search for product
                    function orders() {

                        require "./database/connect.php";

                        $get_sql = "SELECT `token`, COUNT(token) AS count FROM `orders` GROUP BY `token`";

                        $get_result = mysqli_query($conn, $get_sql);

                        if($get_result) {

                            $w = 0;

                            while($row = mysqli_fetch_array($get_result, MYSQLI_ASSOC)) {

                                // echo "<pre>";
                                // print_r($row);
                                // echo "</pre>";

                                $data_row = $row['token'];

                                $check_starts = "SELECT * FROM `orders` WHERE `token` = '$data_row' LIMIT 1";

                                $check_starts_results = mysqli_query($conn, $check_starts);

                                if($check_starts_results) {

                                    if(mysqli_num_rows($check_starts_results) == 1) {

                                        $data_better = mysqli_fetch_array($check_starts_results, MYSQLI_ASSOC);

                                        $data_email = $data_better['name'];

                                        $data_paid = $data_better['paid'];


                                        $check = "SELECT * FROM `orders` WHERE `token` = '$data_row'";

                                        $check_result = mysqli_query($conn, $check);

                                        if($check_result) {

                                            echo "
                                                <div style='text-align: center; font size: 20px; width: 80%; margin: 0px auto;'>Buyer: ".$data_email."</div>
                                                <table class= 'table'>
                                                    <thead>
                                                        <tr>
                                                            <th>S/N </th>
                                                            <th>Product Name</th>
                                                            <th>Product Amount</th>
                                                            <th>Date</th>
                                                        </tr>

                                                    </thead>
                                                </tbody>
                                            ";

                                            $total_price = [];

                                            $k = 0;

                                            while($row = mysqli_fetch_array($check_result, MYSQLI_ASSOC)) {

                                                // echo "<pre>";
                                                // print_r($row);
                                                // echo "</pre>";

                                                $id = $row['id'];
                                                $productName = $row['item'];
                                                $productAmount = $row['price'];
                                                $date_date = $row['date'];
                                        
                                                echo "
                                                    <tr>
                                                    <td>$k</td>
                                                    <td>$productName</td>
                                                    <td>$productAmount</td>
                                                    <td>$date_date</td>
                                                    </tr>
                                                ";

                                                array_push($total_price, $productAmount);

                                                $k++;
                                            };

                                            $data_sum = [];

                                            foreach ($total_price as $element) {
                                                $dataType = gettype($element);
                                                
                                                $modifiedString = substr($element, 2);

                                                array_push($data_sum, $modifiedString);
                                            }

                                            $sum = array_sum($data_sum);
                                            
                                            echo "
                                                </tbody>
                                                </table>
                                                <div style='text-align: center; font size: 20px; width: 80%; margin: 0px auto;'>Total: ".$sum."</div>
                                                <div style='text-align: center; font size: 20px; width: 80%; margin: 0px auto; padding-bottom: 5px;'>Status: ".$data_paid."</div>
                                                <div 
                                                    style='
                                                    text-align: center; 
                                                    font size: 20px; 
                                                    width: 40%; 
                                                    margin: 0px auto; 
                                                    margin-bottom: 20px;
                                                    background-color: rgb(255,72,0);
                                                    '
                                                    class='btn text-white'
                                                    id='settle_order".$w."'
                                                >Settle This Order
                                                </div>
                                                <input type='hidden' id='input_delete".$w."' value='".$data_row."'>
                                                <div class='good' style='text-align: center; font size: 20px; width: 80%; margin: 0px auto; margin-bottom: 20px; border-bottom: 2px solid black;' ></div>
                                                <script>
                                                   document.getElementById('settle_order".$w."').addEventListener('click', function () {

                                                        alert('still working on it');
                                                        // $.ajax({
                                                        //     url: './process/form.php',
                                                        //     method: 'POST',
                                                        //     data: {
                                                        //         'orderlist': $('#input_delete".$w."'), 
                                                        //     },
                                                        //     success: function(data) {
                                                                
                                                        //         // console.log(data.trim());
                                                                
                                                        //     }
                                                        // })

                                                    })
                                                </script>

                                            ";



                                           
                                            
                                        }else {

                                            echo mysqli_error($conn);
                                                
                                        }


                                    }
                                    


                                }

                                
                                $w++;
                                
                            };
                      
                        }

                       
                    }

                    orders();

                ?>
                </div>
            </div>
        </div>
      </div>
</div>

    
    <script src="./js/jquery.js"></script>
    <script src="./js/orders.js"></script>
    
</body>
</html>