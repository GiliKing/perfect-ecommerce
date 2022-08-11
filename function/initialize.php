<?php

session_start();

if(isset($_POST['name_pay']) && isset($_SESSION['users']['email1'])) {

  $name_pay = htmlspecialchars(trim($_POST['name_pay']));
  $amount_pay = htmlspecialchars(trim($_POST['amount_pay']));

  
  $curl = curl_init();

  $email = $name_pay;
  $amount = $amount_pay * 100;  //the amount in kobo. This value is actually NGN 300

  // url to go to after payment
  $callback_url = 'https://perfect-restaurant.herokuapp.com/function/callback.php';  

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
      'amount'=>$amount,
      'email'=>$email,
      'callback_url' => $callback_url
    ]),
    CURLOPT_HTTPHEADER => [
      "authorization: Bearer sk_test_430cce90c0e5ed8c3f9536af91226451192fd080", //replace this with your own test key
      "content-type: application/json",
      "cache-control: no-cache"
    ],
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  if($err){
    // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
  }

  $tranx = json_decode($response, true);

  if(!$tranx['status']){
    // there was an error from the API
    print_r('API returned error: ' . $tranx['message']);
  }

  // comment out this line if you want to redirect the user to the payment page
  print_r($tranx);
  // redirect to page so User can pay
  // uncomment this line to allow the user redirect to the payment page
  header('Location: ' . $tranx['data']['authorization_url']);

} else {

  header("location: https://perfect-restaurant.herokuapp.com/index.php");

}

?>