
<?php

$host_name = "us-cdbr-east-05.cleardb.net";
$user_name = "b69d0280343ae5";
$user_password = "f4bbaf33";
$user_db = "heroku_2227a9ef1d1a881";


// $host_name = "localhost";
// $user_name = "root";
// $user_password = "";
// $user_db = "restaurant";



$conn = mysqli_connect($host_name, $user_name, $user_password, $user_db) or die("could not connect to the database");



?>