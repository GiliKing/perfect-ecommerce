
<?php


function registerOnly() {

    $ok = require '../database/connect.php';

    if($ok) {
        echo "yes";
    } else {
        echo "no";
    }


    // $responce_list = check($email);

    // if($responce_list == true ) {

    //     echo "exist";

    // } else {
        
    // require '../database/connect.php';


        // $username_entry = mysqli_real_escape_string($conn, $name);
    
        // $email_entry = mysqli_real_escape_string($conn, $email);
    
        // $password_entry = mysqli_real_escape_string($conn, $password);
    
        // $token_entry = mysqli_real_escape_string($conn, $token);    
    
        // $verify = 0;
    
        // $hash = password_hash($password_entry, PASSWORD_DEFAULT);
    
        // $hash_entry = mysqli_real_escape_string($conn, $hash);  
    
    
        // $check = "INSERT INTO `users` (`name`, `email`, `password`, `verified`, `token`) VALUES ('$username_entry', '$email_entry', '$hash_entry', '$verify', '$token_entry')";
    
    
        // $result = mysqli_query($conn, $check);
    
    
        // if($result) {

        //     $check_again = "SELECT * FROM `users` WHERE `email` = '$email_entry' LIMIT 1";

        //     $check_result = mysqli_query($conn, $check_again);

        //     if($check_result) {


        //         if(mysqli_num_rows($check_result) == 1) {

        //             session_start();

        //             $_SESSION['users'] = mysqli_fetch_array($check_result, MYSQLI_ASSOC);

        //             $_SESSION['users']['name1'] = $_SESSION['users']['name'];
                
        //             $_SESSION['users']['email1'] = $_SESSION['users']['email'];
                            
        //             $verified = $_SESSION['users']['verified'];

        //             if($verified == 0) {

        //                 $_SESSION['users']['verify1'] = $_SESSION['users']['verified'];

        //                 $_SESSION['users']['token_tok'] = $_SESSION['users']['token'];

        //                 echo "verify";

        //             } else {

        //                 $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];

        //                 echo "yes";

        //             }

        //         } else {

        //             mysqli_error($conn);
        //         }

        //     } else {

        //         mysqli_error($conn);
                
        //     }
    
        // } else {
    
        //    mysqli_error($conn);
        // }

    // }

}


function check($email) {

    require '../database/connect.php';


    echo "yes check";


    // $email_entry = mysqli_real_escape_string($conn, $email);

    // $user_query = "SELECT * FROM `users` WHERE `email` = '$email_entry' LIMIT 1";

    // $users_result = mysqli_query($conn, $user_query);

    // if($users_result) {

    //     if (mysqli_num_rows($users_result) == 1) {
        
    //         return true;

    //     } else {

    //         return false;
            
    //     }

    // }else {

    //     echo mysqli_error($conn);

    // }


}


// for login

function login($email, $password) {

    require '../database/connect.php';


    $email_entry = mysqli_real_escape_string($conn, $email);
    $password_entry = mysqli_real_escape_string($conn, $password);

    $check = "SELECT `password` AS `pass` FROM `users` WHERE `email` = '$email_entry'LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {

        if (mysqli_num_rows($result) == 1) { 

            $row = mysqli_fetch_assoc($result);

            $hash = $row['pass'];

            $pass = password_verify($password_entry, $hash);

            if($pass) {

                $check1 = "SELECT * FROM `users` WHERE `email` = '$email_entry' LIMIT 1";

                $result1 = mysqli_query($conn, $check1);


                if($result1) {

                    if(mysqli_num_rows($result1) == 1) {


                        session_start();

                        $_SESSION['users'] = mysqli_fetch_array($result1, MYSQLI_ASSOC);

                        $_SESSION['users']['name1'] = $_SESSION['users']['name'];
        
                        $_SESSION['users']['email1'] = $_SESSION['users']['email'];
                    
                        $verified = $_SESSION['users']['verified'];

                        if($verified == 0) {

                            $_SESSION['users']['verify1'] = $_SESSION['users']['verified'];

                            $_SESSION['users']['token_tok'] = $_SESSION['users']['token'];

                            echo "verify";

                        } else {

                            $_SESSION['users']['email1'] = $_SESSION['users']['email'];

                            $_SESSION['users']['verify1'] = $_SESSION['users']['verified'];

                            echo "yes";

                        }
        
                    }

                } 

            } else {

                echo "not2";
            }



        } else {

            echo "not3";
        }        
 


    } else {

        echo "not1";

    }


}


?>