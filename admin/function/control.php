<?php

// for login
function login($email, $password) {

    require '../database/connect.php';


    $email_entry = mysqli_real_escape_string($conn, $email);
    $password_entry = mysqli_real_escape_string($conn, $password);

    $check = "SELECT `password` AS `pass` FROM `admin` WHERE `email` = '$email_entry'LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {

        if (mysqli_num_rows($result) == 1) { 

            $row = mysqli_fetch_assoc($result);

            $hash = $row['pass'];

            $pass = password_verify($password_entry, $hash);

            if($pass) {

                $check1 = "SELECT * FROM `admin` WHERE `email` = '$email_entry' LIMIT 1";

                $result1 = mysqli_query($conn, $check1);


                if($result1) {

                    if(mysqli_num_rows($result1) == 1) {


                        session_start();

                        $_SESSION['admin'] = mysqli_fetch_array($result1, MYSQLI_ASSOC);

                        $_SESSION['admin']['name1'] = $_SESSION['admin']['name'];
        
                        $_SESSION['admin']['email1'] = $_SESSION['admin']['email'];
                    
                        $verified = $_SESSION['admin']['verified'];

                        if($verified == 0) {

                            $_SESSION['admin']['verify1'] = $_SESSION['admin']['verified'];

                            $_SESSION['admin']['token_tok'] = $_SESSION['admin']['token'];

                            echo "verify";

                        } else {

                            $_SESSION['admin']['email1'] = $_SESSION['admin']['email'];

                            $_SESSION['admin']['verify1'] = $_SESSION['admin']['verified'];

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

// for product registration
function registerProduct($name, $task_entry, $amount, $photo_path, $description) {

    require "./database/connect.php";

    $name_data = mysqli_real_escape_string($conn, $name);

    $task_data = mysqli_real_escape_string($conn, $task_entry);

    $amount_data = mysqli_real_escape_string($conn, $amount);

    $photo_data = mysqli_real_escape_string($conn, $photo_path);

    $desc_data = mysqli_real_escape_string($conn, $description);

    $event_count = 1;

    $event_register = "INSERT INTO `product` (`category`, `prod_name`, `prod_amount`, `prod_image`, `prod_desc`) VALUES('$task_data', '$name_data', '$amount_data', '$photo_data', '$desc_data')";

    $event_result_register = mysqli_query($conn, $event_register);

    if($event_result_register) {

        echo "<div class='alert alert-success'>Product Added Successfully</div>";
    } else  {
        
        echo mysqli_error($conn);
    }


}


// search for product
function seach_prod($category, $prod_id) {

    require "../database/connect.php";

    $category_data = mysqli_real_escape_string($conn, $category);

    $prod_id_data = mysqli_real_escape_string($conn, $prod_id);

    $check = "SELECT * FROM `product` WHERE `category` = '$category_data' AND `id` = '$prod_id_data' LIMIT 1";

    $check_result = mysqli_query($conn, $check);

    if($check_result) {

        if(mysqli_num_rows($check_result) == 1) {

            $list_item = [];

            $row = mysqli_fetch_array($check_result, MYSQLI_ASSOC);

            $category_list = $row["category"];
            $name_list = $row["prod_name"];
            $amount_list = $row["prod_amount"];
            $image_list = $row["prod_image"];
            $desc_list = $row["prod_desc"];
            $id_list = $row["id"];

            array_push($list_item, $category_list);
            array_push($list_item, $name_list);
            array_push($list_item, $amount_list);
            array_push($list_item, $image_list);
            array_push($list_item, $desc_list);
            array_push($list_item, $id_list);
            

            echo json_encode($list_item);

        } else {

            echo "Could not Find Product";
        
        }

    } else {

        echo "Product does not exit";
        
    }
}


// update product
function updateProduct($id_prod, $name, $task_entry, $amount, $photo_path, $description) {

    require "./database/connect.php";

    $name_data = mysqli_real_escape_string($conn, $name);

    $task_data = mysqli_real_escape_string($conn, $task_entry);

    $amount_data = mysqli_real_escape_string($conn, $amount);

    $photo_data = mysqli_real_escape_string($conn, $photo_path);

    $desc_data = mysqli_real_escape_string($conn, $description);

    $check_again = "DELETE FROM `product` WHERE `id` = '$id_prod'";

    $check_again_result = mysqli_query($conn, $check_again);

    if($check_again_result) {

        $event_register = "INSERT INTO `product` (`id`, `category`, `prod_name`, `prod_amount`, `prod_image`, `prod_desc`) VALUES('$id_prod','$task_data', '$name_data', '$amount_data', '$photo_data', '$desc_data')";

        $event_result_register = mysqli_query($conn, $event_register);

        if($event_result_register) {

            echo "
                <div class='alert alert-success'>Product Updated Successfully</div>
                <input type='hidden' value='success' class='what_data'>
            ";
        } else  {
            
            echo mysqli_error($conn);

        }

    }

}


// search for product
function seach_prod_delete($category, $prod_id) {

    require "../database/connect.php";

    $category_data = mysqli_real_escape_string($conn, $category);

    $prod_id_data = mysqli_real_escape_string($conn, $prod_id);

    $check = "SELECT * FROM `product` WHERE `category` = '$category_data' AND `id` = '$prod_id_data' LIMIT 1";

    $check_result = mysqli_query($conn, $check);

    if($check_result) {

        if(mysqli_num_rows($check_result) == 1) {

            $list_item = [];

            $row = mysqli_fetch_array($check_result, MYSQLI_ASSOC);

            $category_list = $row["category"];
            $name_list = $row["prod_name"];
            $amount_list = $row["prod_amount"];
            $image_list = $row["prod_image"];
            $desc_list = $row["prod_desc"];
            $id_list = $row["id"];

            array_push($list_item, $category_list);
            array_push($list_item, $name_list);
            array_push($list_item, $amount_list);
            array_push($list_item, $image_list);
            array_push($list_item, $desc_list);
            array_push($list_item, $id_list);
            

            echo json_encode($list_item);

        } else {

            echo "Could not Find Product";
        
        }

    } else {

        echo "Product does not exit";
        
    }
}

// update product
function deleteProduct($id_prod) {

    require "./database/connect.php";

    $check_again = "DELETE FROM `product` WHERE `id` = '$id_prod'";

    $check_again_result = mysqli_query($conn, $check_again);

    if($check_again_result) {

        echo "
            <div class='alert alert-success'>Product Deleted Successfully</div>
            <input type='hidden' value='success' class='what_data_delete'>
        ";

    } else {

        echo mysqli_error($conn);
        
    }

}


// delete settled order
function order_delete($order_delete) {

    require "../database/connect.php";

    $clearData = "DELETE FROM `order` WHERE `token` = '$order_delete'";

    $result = mysqli_query($conn, $clearData);


    if($result) {

        echo "deleted";
        
    } else {

        echo mysqli_error($conn);
    }
}

?>