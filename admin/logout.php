

<?php


session_start();

$_SESSION['admin']['name1'] = '';
$_SESSION['admin']['email1'] = '';

session_unset();


header("location: index.php")

?>