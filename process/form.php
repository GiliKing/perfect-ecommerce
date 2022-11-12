

<?php



// for registration

if(isset($_POST["username"])) {
    
    $name = htmlspecialchars(trim($_POST['username']), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);
    $token = bin2hex(random_bytes(50));

    require  '../function/control.php';

    $feedback = register($name, $email, $password, $token);

    echo $feedback;

}


if(isset($_POST["email_login"])) {
    
    $email = htmlspecialchars(trim($_POST['email_login']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password_login']), ENT_QUOTES);

    
    require  '../function/control.php';

    $feedback = login($email, $password);

    echo $feedback;

}



// when the page loads
if(isset($_POST["name_cust"])) {

    $name_cust = trim($_POST['name_cust']);
    $name_item = trim($_POST['name_item']);
    $price_item = trim($_POST['price_item']);
    $image_item = trim($_POST['image_item']);


    require  '../function/control.php';

    $feedback = localStore($name_cust, $name_item, $price_item, $image_item);

    echo $feedback;

}

// when the page loads again
if(isset($_POST["name_customer"])) {

    $name_customer = trim($_POST['name_customer']);

    require  '../function/control.php';

    $feedback = localStoreAgain($name_customer);

    echo $feedback;

}


// when the add button is click

if(isset($_POST["name_customer_base"])) {

    $name_customer_add = trim($_POST['name_customer_base']);
    $name_item_add = trim($_POST['name_item_base']);
    $price_item_add = trim($_POST['price_item_base']);
    $image_item_add = trim($_POST['image_item_base']);


    require  '../function/control.php';

    $feedback = normalStore($name_customer_add, $name_item_add, $price_item_add, $image_item_add);

    echo $feedback;

}

// comming from buyitem 

if(isset($_POST["name_customer_only"])) {

    $name_customer_ok = trim($_POST['name_customer_only']);

    require  '../function/control.php';

    $feedback = buyStore($name_customer_ok);

    echo $feedback;


}


// delete an item

if(isset($_POST["del_id"])) {

    $del_id = trim($_POST['del_id']);

    require  '../function/control.php';

    $feedback = delStore($del_id);

    echo $feedback;


}


// for emailing reseting of passwords
if(isset($_POST['email_reset'])) {

    $email = htmlspecialchars($_POST["email_reset"]);

    require  '../function/control.php';

    $feedback = passwordreset($email);

    echo $feedback;


}


// for emailing reseting of passwords
if(isset($_POST['password_one'])) {

    $password_one = htmlspecialchars($_POST["password_one"]);

    $old_token = htmlspecialchars($_POST["old_token"]);

    $new_token = bin2hex(random_bytes(50));


    require  '../function/control.php';

    $feedback = changepassword($password_one, $old_token, $new_token);

    echo $feedback;



}






// if(isset($_POST["id"])) {

//     $name = htmlspecialchars($_POST["name_item"]);
//     $price = htmlspecialchars($_POST["price_item"]);
//     $image = htmlspecialchars($_POST["image_item"]);
//     $ip_address = htmlspecialchars($_POST["ip_address"]);


    

    
// }




?>