

<?php




$id = htmlspecialchars(trim($_GET['id']));


if($id) {


    require "database/connect.php";

    $id_entry = mysqli_real_escape_string($conn, $id);


    $check = "SELECT * FROM `users` WHERE `token` = '$id_entry' LIMIT 1";

    $result = mysqli_query($conn, $check);


    if($result) {
        
        if(mysqli_num_rows($result) == 1) {

            session_start();

            $_SESSION['users'] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
            $_SESSION['users']['token_reset'] = $_SESSION['users']['token'];

            header("location: passwordresettemplate.php");

        } else {
        
            header("location: error.php");
        }


    } else {

        header("location: error.php");
    }

} else {

    header("location: error.php");
}







?>