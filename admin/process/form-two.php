<?php

// validate the information coming from the enter product form
if(isset($_POST['update'])){

    $name = htmlspecialchars(trim($_POST['name_update']), ENT_QUOTES);
    $amount = htmlspecialchars(trim($_POST['amount_update']), ENT_QUOTES);
    $description = htmlspecialchars(trim($_POST['desc_update']), ENT_QUOTES);
    $task = htmlspecialchars(trim($_POST['category_update']), ENT_QUOTES);
    $id_prod = htmlspecialchars(trim($_POST['id_prod']), ENT_QUOTES);
    
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



    if(in_array($image_file_type, $allowed_types)){

        if(!is_dir("{$id}")){
            mkdir("{$id}");
        }

        $photo_path = "{$id}/{$image_file_name}";

        move_uploaded_file($image_file_tmp, $photo_path);

        // add this to the database..
        require "./function/control.php";

        $feedback = updateProduct($id_prod, $name, $task_entry, $amount, $photo_path, $description);

        echo $feedback;


    } else {

       echo "
            <div class='alert alert-warning'>Please enter the allowed image type</div>
            <input type='hidden' value='error_image_type' class='what_data'>
       ";
       
    }

}



?>