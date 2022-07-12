
<?php


function register($name, $email, $password, $token) {


    $responce_list = check($email);

    if($responce_list == true ) {

        echo "exist";

    } else {
        
    require '../database/connect.php';


        $username_entry = mysqli_real_escape_string($conn, $name);
    
        $email_entry = mysqli_real_escape_string($conn, $email);
    
        $password_entry = mysqli_real_escape_string($conn, $password);
    
        $token_entry = mysqli_real_escape_string($conn, $token);    
    
        $verify = 0;
    
        $hash = password_hash($password_entry, PASSWORD_DEFAULT);
    
        $hash_entry = mysqli_real_escape_string($conn, $hash);  
    
    
        $check = "INSERT INTO `users` (`name`, `email`, `password`, `verified`, `token`) VALUES ('$username_entry', '$email_entry', '$hash_entry', '$verify', '$token_entry')";
    
    
        $result = mysqli_query($conn, $check);
    
    
        if($result) {

            $check_again = "SELECT * FROM `users` WHERE `email` = '$email_entry' LIMIT 1";

            $check_result = mysqli_query($conn, $check_again);

            if($check_result) {


                if(mysqli_num_rows($check_result) == 1) {

                    session_start();

                    $_SESSION['users'] = mysqli_fetch_array($check_result, MYSQLI_ASSOC);

                    $_SESSION['users']['name1'] = $_SESSION['users']['name'];
                
                    $_SESSION['users']['email1'] = $_SESSION['users']['email'];
                            
                    $verified = $_SESSION['users']['verified'];

                    if($verified == 0) {

                        $_SESSION['users']['verify1'] = $_SESSION['users']['verified'];

                        $_SESSION['users']['token_tok'] = $_SESSION['users']['token'];

                        echo "verify";

                    } else {

                        $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];

                        echo "yes";

                    }

                } else {

                    mysqli_error($conn);
                }

            } else {

                mysqli_error($conn);
                
            }
    
        } else {
    
           mysqli_error($conn);
        }

    }

}


function check($email) {

    require '../database/connect.php';

    $email_entry = mysqli_real_escape_string($conn, $email);

    $user_query = "SELECT * FROM `users` WHERE `email` = '$email_entry' LIMIT 1";

    $users_result = mysqli_query($conn, $user_query);

    if($users_result) {

        if (mysqli_num_rows($users_result) == 1) {
        
            return true;

        } else {

            return false;
            
        }

    }else {

        echo mysqli_error($conn);

    }


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



// storing of localStore

function localStore($name_cust, $name_item, $price_item, $image_item) {

    require "../database/connect.php";

    $name_entry = mysqli_real_escape_string($conn, $name_cust);
    $item_entry = mysqli_real_escape_string($conn, $name_item);
    $price_entry = mysqli_real_escape_string($conn, $price_item);
    $image_entry = mysqli_real_escape_string($conn, $image_item);


    $check = "INSERT INTO `user-item` (`name`, `item`, `price`, `image`) value('$name_entry', '$item_entry', '$price_entry',  '$image_entry')";

    $result = mysqli_query($conn, $check);


    if($result) {
        
        $check_again = "SELECT * FROM `user-item` WHERE `name` = '$name_entry'";

        $result_again = mysqli_query($conn, $check_again);

        if($result_again) {

            // $row = mysqli_fetch_array($result_again, MYSQLI_NUM);

            // print_r($row);

            $list_item = [];

            while ($row = mysqli_fetch_array($result_again, MYSQLI_ASSOC)) {

             $name_list = $row["name"];
             $name_name = $row["item"];
             $name_price = $row["price"];
             $name_image = $row["image"];

             $total = new stdClass();

             $total->name = $name_list;
             $total->item = $name_name;
             $total->price = $name_price;
             $total->image = $name_image;


             Array_push($list_item, $total);

            };

            echo json_encode($list_item);

        }

    } else {

        echo mysqli_error($conn);


    }


}


function localStoreAgain($name_customer) {

    require "../database/connect.php";

    $name_entry = mysqli_real_escape_string($conn, $name_customer);
   
    $check_again = "SELECT * FROM `user-item` WHERE `name` = '$name_entry'";

    $result_again = mysqli_query($conn, $check_again);

    if($result_again) {

        $list_item = [];

        while ($row = mysqli_fetch_array($result_again, MYSQLI_ASSOC)) {

            $name_list = $row["name"];
            $name_name = $row["item"];
            $name_price = $row["price"];
            $name_image = $row["image"];

            $total = new stdClass();

            $total->name = $name_list;
            $total->item = $name_name;
            $total->price = $name_price;
            $total->image = $name_image;


            Array_push($list_item, $total);

        };

        echo json_encode($list_item);

    } else {
        
        echo mysqli_error($conn);
    }


}



// button click to store

function normalStore($name_customer_add, $name_item_add, $price_item_add, $image_item_add) {

    require "../database/connect.php";

    $name_entry = mysqli_real_escape_string($conn, $name_customer_add);
    $item_entry = mysqli_real_escape_string($conn, $name_item_add);
    $price_entry = mysqli_real_escape_string($conn, $price_item_add);
    $image_entry = mysqli_real_escape_string($conn, $image_item_add);


    $check = "INSERT INTO `user-item` (`name`, `item`, `price`, `image`) value('$name_entry', '$item_entry', '$price_entry',  '$image_entry')";

    $result = mysqli_query($conn, $check);


    if($result) {
        
        $check_again = "SELECT * FROM `user-item` WHERE `name` = '$name_entry'";

        $result_again = mysqli_query($conn, $check_again);

        if($result_again) {


            $list_item = [];

            while ($row = mysqli_fetch_array($result_again, MYSQLI_ASSOC)) {

             $name_list = $row["name"];
             $name_name = $row["item"];
             $name_price = $row["price"];
             $name_image = $row["image"];

             $total = new stdClass();

             $total->name = $name_list;
             $total->item = $name_name;
             $total->price = $name_price;
             $total->image = $name_image;


             Array_push($list_item, $total);

            };

            echo json_encode($list_item);

        }

    } else {

        echo mysqli_error($conn);


    }


}


// selecting all the related item to display

function buyStore($name_customer_ok) {

    require "../database/connect.php";

    $name_entry = mysqli_real_escape_string($conn, $name_customer_ok);
   
    $check_again = "SELECT * FROM `user-item` WHERE `name` = '$name_entry'";

    $result_again = mysqli_query($conn, $check_again);

    if($result_again) {

        $list_item = [];

        while ($row = mysqli_fetch_array($result_again, MYSQLI_ASSOC)) {

            $name_list = $row["name"];
            $name_name = $row["item"];
            $name_price = $row["price"];
            $name_image = $row["image"];
            $name_id = $row["id"];

            $total = new stdClass();

            $total->name = $name_list;
            $total->item = $name_name;
            $total->price = $name_price;
            $total->image = $name_image;
            $total->id = $name_id;


            Array_push($list_item, $total);

        };

        echo json_encode($list_item);

    } else {
        
        echo mysqli_error($conn);
    }


}


function delStore($del_id) {

    require "../database/connect.php";
   
    $check_again = "DELETE FROM `user-item` WHERE `id` = '$del_id'";

    $result_again = mysqli_query($conn, $check_again);

    if($result_again) {

        echo '<div class="alert alert-success">Removed Successfully
        <button class="close" data-dismiss="alert">&times;</button>
        </div>';

    } else {
        
        echo mysqli_error($conn);
    }


}




?>