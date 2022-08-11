<?php

session_start();

if(isset($_SESSION['users']['email1'])) {

  include_once "../database/connect.php";

  $curl = curl_init();
  $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
  if(!$reference){
    die('No reference supplied');
  }

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
      "accept: application/json",
      "authorization: Bearer sk_test_430cce90c0e5ed8c3f9536af91226451192fd080",
      "cache-control: no-cache"
    ],
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  if($err){
      // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
  }

  $tranx = json_decode($response);

  if(!$tranx->status){
    // there was an error from the API
    die('API returned error: ' . $tranx->message);
  }

  if('success' == $tranx->data->status){
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    // Give value
   
    // echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";

    $name_pay = $_SESSION['users']['email1'];

    $clearData = "DELETE FROM `user-item` WHERE `name` = '$name_pay'";

    $result = mysqli_query($conn, $clearData);


    if($result) {

      
        echo"
      <script>
        window.location.href = 'https://perfect-restaurant.herokuapp.com/verified-payment.php'
      </script>
      ";

    } else {

        echo mysqli_error($conn);
    }


  }


} else {

    echo"
    <script>
      window.location.href = 'https://perfect-restaurant.herokuapp.com/index.php';
    </script>
    ";
}


?>