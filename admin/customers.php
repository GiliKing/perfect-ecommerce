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
    <link rel="stylesheet" href="./css/index.css">
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
              <a href="home.php">Home</a>
              <a href="products.php">Products</a>
              <a href="orders.php?page=1">Orders</a>
              <a href="#">Customers</a>
              <a href="logout.php">Logout</a>
            </div>
            
            <h2>Welcome Admin</h2>
            <p>Not done with the customer page</p>
            <!-- end of sid ebar content -->
          </div>
        </div>
      </div>
</div>

    
    <script src="./js/jquery.js"></script>
    <script src="./js/admin.js"></script>
    
</body>
</html>