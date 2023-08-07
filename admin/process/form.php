
<?php

ini_set('display_errors', 'On');

// login in the admin
if(isset($_POST["email_login"])) {
    
    $email = htmlspecialchars(trim($_POST['email_login']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password_login']), ENT_QUOTES);

    
    require  '../function/control.php';

    $feedback = login($email, $password);

    echo $feedback;

}


// validate the information coming from the enter product form
if(isset($_POST['enter'])){

    $name = htmlspecialchars(trim($_POST['name_prod']), ENT_QUOTES);
    $amount = htmlspecialchars(trim($_POST['amount_prod']), ENT_QUOTES);
    $description = htmlspecialchars(trim($_POST['desc_prod']), ENT_QUOTES);
    $task = htmlspecialchars(trim($_POST['tasks']), ENT_QUOTES);

    $task_entry = "";

    if($task == 1) {
        $task_entry = "Africa Kitchen";
    }

    if($task == 2) {
        $task_entry = "Famot Cake and Delight";
    }

    if($task == 3) {
        $task_entry = "Favours Favourite";
    }

	$allowed_types = ['image/png', 'image/jpeg', 'image/PNG', 'image/JPG'];

	$image_file = $_FILES['prod_upload'];

	$image_file_name = $image_file['name'];
	$image_file_type = $image_file['type'];
	$image_file_tmp = $image_file['tmp_name'];
    $id = "goods";

	$errors = [];

    if(empty($task) || $task == "Choose..."){
		$errors[] = "<div class='alert alert-warning'>Please Select A Task</div>";
	}

    if(empty($name)){
		$errors[] = "<div class='alert alert-warning'>Please enter the product name</div>";
	}

    if(empty($amount)){
		$errors[] = "<div class='alert alert-warning'>Please enter the product amount</div>";
	}

    if(empty($image_file_name)){
		$errors[] = "<div class='alert alert-warning'>Please choose the product image file</div>";
	}

     if(empty($description)){
		$errors[] = "<div class='alert alert-warning'>Please enter the product description</div>";
	}

    if(empty($errors)){

        if(in_array($image_file_type, $allowed_types)){

            if(!is_dir("{$id}")){
                mkdir("{$id}");
            }

            $photo_path = "{$id}/{$image_file_name}";

            move_uploaded_file($image_file_tmp, $photo_path);

            // add this to the database..
            require "./function/control.php";

            $feedback = registerProduct($name, $task_entry, $amount, $photo_path, $description);

            echo $feedback;


        } else {
           echo "<div class='alert alert-warning'>Please enter the allowed image type</div>";
        }

    } else {
        forEach($errors as $error) {
            echo "{$error}<br>";
        }
    }
}

// search if a product exit
if(isset($_POST['category'])){

    $category = htmlspecialchars($_POST['category'], ENT_QUOTES);
    $prod_id = htmlspecialchars(trim($_POST['prod_id']), ENT_QUOTES);


    require '../function/control.php';

    $feedback = seach_prod($category, $prod_id);

    echo $feedback;

}

// search if a product exit
if(isset($_POST['category_delete'])){

    $category = htmlspecialchars($_POST['category_delete'], ENT_QUOTES);
    $prod_id = htmlspecialchars(trim($_POST['prod_id_delete']), ENT_QUOTES);


    require '../function/control.php';

    $feedback = seach_prod_delete($category, $prod_id);

    echo $feedback;

}


// delete a settled order
if(isset($_POST['orderlist'])) {

    $order_delete = htmlspecialchars($_POST['orderlist'], ENT_QUOTES);

    require '../function/control.php';

    $feedback = order_delete($order_delete);

    echo $feedback;


}




?>