<?php  
ini_set('display_errors', 'On');
?>

<?php

    session_start();

    if(!isset($_SESSION['admin']['email1'])) {   

        header("location: products.php");

    } else {

        $email_entry = $_SESSION['admin']['email1'];

        require 'database/connect.php';

        $ok_check = "SELECT `verified` AS `very` FROM `admin` WHERE `email` ='$email_entry' LIMIT 1";

        $ok_result = mysqli_query($conn, $ok_check);

        if($ok_result) {

            $row = mysqli_fetch_assoc($ok_result);

            $verified = $row['very'];


            if($verified == 1) {

                // header("location: user.php");

            } else { 
                
                header("location: error.php");
            }
        }


    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Clean Creation</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>

<!-- side bar first -->
<div class="wrapper">
      <div class="side_bar_content">
        <div class="container-fluid">
          <div class="col-sm-12">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa-solid fa-bars"></i> <b>open</b></span>

            <!-- side bar element -->
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: #FF4800;">&times;</a>
              <div class="logo_img">
                <img src="./asset/client_logo.png" alt="" width="50%">
              </div>
              <a href="index.php">Home</a>
              <a href="#">Products</a>
              <a href="orders.php?page=1">Orders</a>
              <a href="customers.php">Customers</a>
              <a href="logout.php">Logout</a>
            </div>
            <!-- end of sid ebar content -->
            
            <h2>Products</h2>
            <p>You can Enter, Update and Delete Products</p>

          </div>
        </div>
      </div>
</div>

<div class="first_section">
  <div class="container-fluid">
    <div class="col-sm-12">
      <div class="row">
          <div class="col-md-4">
              <span class="btn enter_prod">Enter A Product</span>
          </div>
          <div class="col-md-4">
              <span class="btn update_prod">Update A Product</span>
          </div>
          <div class="col-md-4">
              <span class="btn delete_prod">Delete A Product</span>
          </div>
      </div>


      <div class="enter_prod">
        <div class="mt-3 text-center ok">Enter A Product</div>
        <?php require "./process/form.php"; ?>
        <form action="" method='POST' enctype="multipart/form-data">
          <div class="input-group mb-3 mt-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Category</label>
            </div>
            <select class="custom-select" name="tasks" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="1">African Kitchen</option>
              <option value="2">Famot Cake and Delight</option>
              <option value="3">Favours Favourite</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name_prod" class="form-control" id="formGroupExampleInput" placeholder="Enter The Name Of the Product">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Amount</label>
            <input type="number" name="amount_prod" class="form-control" id="formGroupExampleInput2" placeholder="Enter The Amount">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput3">Image</label>
            <input type="file" name='prod_upload' id="formGroupExampleInput3">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput4">Description</label>
            <textarea class="form-control" name="desc_prod" id="formGroupExampleInput4" placeholder="Enter A Brief Description"></textarea>
          </div>
          <button type="submit" name="enter" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <div class="update_prod">
        <div class="mt-3 text-center ok">Update A Product</div>
        <?php require "./process/form-two.php"; ?>
        <form class="form-inline update_one">
          <div class="input-group mb-3 mt-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Category</label>
            </div>
            <select class="custom-select" id="category" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="1">African Kitchen</option>
              <option value="2">Famot Cake and Delight</option>
              <option value="3">Favours Favourite</option>
            </select>
          </div>
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Product ID</label>
            <input type="number" class="form-control prod_id" id="inputPassword2" placeholder="Enter The Product ID">
          </div>
          <button type="button" id="find_prod" class="btn btn-primary mb-2">Confirm identity</button>
        </form>
        <form action="" method='POST' enctype="multipart/form-data" class="update_two">
          <input type="hidden" name="id_prod" class="id_prod">
          <div class="form-group">
            <div class="name_select text-center text-warning"></div>
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Category</label>
              </div>
              <select class="custom-select" name="category_update" id="inputGroupSelect01" required>
                <option selected></option>
                <option value="1">African Kitchen</option>
                <option value="2">Famot Cake and Delight</option>
                <option value="3">Favours Favourite</option>
              </select>
            </div>
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name_update" class="form-control" id="formGroupExampleInput" placeholder="Enter The Name Of the Product" required>
            <div class="update_name text-center text-warning"></div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Amount</label>
            <input type="number" name="amount_update" class="form-control" id="formGroupExampleInput2" placeholder="Enter The Amount" required>
            <div class="update_amount text-warning text-center"></div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput3">Image</label>
            <input type="file" name="prod_upload" id="formGroupExampleInput3" required>
            <div class="update_image">
              <img class="update_image" src="" alt="" width="30%" height="100px">
            </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput4">Description</label>
            <textarea class="form-control" name="desc_update" id="formGroupExampleInput4" placeholder="Enter A Brief Description" required></textarea>
            <div class="update_desc text-warning text-center"></div>
          </div>
          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
      </div>

      <div class="delete_prod">
        <div class="mt-3 text-center ok">Delete A Product</div>
        <?php require "./process/form-three.php"; ?>
        <form class="form-inline delete_one">
          <div class="input-group mb-3 mt-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Category</label>
            </div>
            <select class="custom-select" id="category_delete" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="1">African Kitchen</option>
              <option value="2">Famot Cake and Delight</option>
              <option value="3">Favours Favourite</option>
            </select>
          </div>
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Product ID</label>
            <input type="number" class="form-control prod_id_delete" id="inputPassword2" placeholder="Enter The Product ID">
          </div>
          <button type="button" id="delete_prod" class="btn btn-primary mb-2">Confirm identity</button>
        </form>
        <form action="" method='POST' enctype="multipart/form-data" class="delete_two">
          <input type="hidden" name="id_prod_delete" class="id_prod_delete">
          <div class="form-group">
            <label for="formGroupExampleInput">Category</label>
            <div class="name_select_delete text-center text-warning"></div>
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name_delete" class="form-control delete_name" id="formGroupExampleInput" placeholder="Enter The Name Of the Product" readonly>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Amount</label>
            <input type="number" name="amount_delete" class="form-control delete_amount" id="formGroupExampleInput2" placeholder="Enter The Amount" readonly>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput3">Image</label>
            <div class="delete_image">
              <img class="delete_image" src="" alt="" width="30%" height="100px">
            </div>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput4">Description</label>
            <textarea class="form-control delete_desc" name="desc_delete" id="formGroupExampleInput4" placeholder="Enter A Brief Description" readonly></textarea>
          </div>
          <button type="submit" name="delete" class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
    <script src="./js/jquery.js"></script>
    <script src="./js/product.js"></script>
</body>
</html>