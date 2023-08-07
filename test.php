<?php

use Faker\Factory;

require_once 'vendor/autoload.php';

$faker = Factory::create();


for($i = 0; $i < 10; $i++) {

    $task_entry = "Favours Favourite";

    $name = $faker->lastName();

    $amount = $faker->randomFloat();

    $photo_path = "goods/food.jpeg";

    $sentence  = $faker->text(1000);

    $feedback = registerProduct($name, $task_entry, $amount, $photo_path, $sentence);

    echo  $feedback;

}


// for product registration
function registerProduct($name, $task_entry, $amount, $photo_path, $description) {

    require "database/connect.php";

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


?>