<?php

// validate the information coming from the enter product form
if(isset($_POST['delete'])){

    $id_prod = htmlspecialchars(trim($_POST['id_prod_delete']), ENT_QUOTES);

    // add this to the database..
    require "./function/control.php";

    $feedback = deleteProduct($id_prod);

    echo $feedback;


}



?>