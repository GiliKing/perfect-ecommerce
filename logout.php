

<?php


session_start();

$_SESSION['users']['name1'] = '';
$_SESSION['users']['email1'] = '';

session_unset();


header("location: index.php")

?>