


<?php

$id = htmlspecialchars(trim($_GET['id']));


if($id) {

    require "database/connect.php";

    $id_entry = mysqli_real_escape_string($conn, $id);


    $check = "SELECT `token` AS 'tok' FROM `users` WHERE `token` = '$id_entry' LIMIT 1";

    $result = mysqli_query($conn, $check);


    if($result) {

        $num = 1;

        $check_again = "UPDATE `users` SET `verified` = '$num' WHERE `token` = '$id_entry' LIMIT 1";

        $result_again = mysqli_query($conn, $check_again);

        if($result_again) {

            header('location: verified-template.php');

        }  else {

            header("location: error.php");
        }

    } else {

        header("location: error.php");
    }

} else {

    header("location: error.php");
}







?>