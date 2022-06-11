

<?php



// for registration

if(isset($_POST["username"])) {
    
    $name = htmlspecialchars(trim($_POST['username']), ENT_QUOTES);
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);
    $token = bin2hex(random_bytes(50));

    require  '../function/control.php';

    $feedback = registerOnly();

    echo $feedback;

}


if(isset($_POST["email_login"])) {
    
    $email = htmlspecialchars(trim($_POST['email_login']), ENT_QUOTES);
    $password = htmlspecialchars(trim($_POST['password_login']), ENT_QUOTES);

    
    require  '../function/control.php';

    $feedback = login($email, $password);

    echo $feedback;

}












// if(isset($_POST["id"])) {

//     $name = htmlspecialchars($_POST["name_item"]);
//     $price = htmlspecialchars($_POST["price_item"]);
//     $image = htmlspecialchars($_POST["image_item"]);
//     $ip_address = htmlspecialchars($_POST["ip_address"]);


    

    
// }




?>