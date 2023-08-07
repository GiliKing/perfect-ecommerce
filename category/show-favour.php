<?php
ini_set('display_errors', 'On');

// search for product
function search_prod() {

    require "./database/connect.php";

    // Number of records to display per page
    $recordsPerPage = 5;

    // Get the current page number from the URL
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $currentPage = intval($_GET['page']);
    } else {
        $currentPage = 1;
    }

    // Calculate the starting row for the current page
    $startFrom = ($currentPage - 1) * $recordsPerPage;

    $check = "SELECT * FROM `product` WHERE `category` = 'Favours Favourite' LIMIT $startFrom, $recordsPerPage";

    $check_result = mysqli_query($conn, $check);

    if($check_result) {


        while($row = mysqli_fetch_array($check_result, MYSQLI_ASSOC)) {

            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";

            echo "
            <div class='col-sm-4' id='change_display'>
                <div class='card' id='ok_ok'>
                    <table>
                        <tr>
                            <td>
                                <img src='./admin/" . $row['prod_image']. "' id='image_section' alt='' width='150px' height='150px' id='image_style'>
                            </td>
                            <td>
                                <p id='text_section'>
                                ".$row['prod_name']."
                                <small id='small_section'>.N".$row['prod_amount']."</small>
                                </p>

                                <small style='display: block; text-align: center;'>
                                    <span id='add_to_cart'>Add To Cart</span>
                                </small>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            ";

        };


        // Pagination links
        $sql = "SELECT COUNT(*) AS total FROM `product` WHERE `category` = 'Favours Favourite'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $totalRecords = $row['total'];
        $totalPages = ceil($totalRecords / $recordsPerPage);

        echo "<div class='br_down'>Previous ";
        for ($i = 1; $i <= $totalPages; $i++) {
            if($i == 1) {
                echo "<a class='paginate_good' href='?page=" . $i . "'>" . '&lt;' . "</a> ";
                echo intval($_GET['page']);
            } else {
                echo "<a class='paginate_good' href='?page=" . $i . "'>" . '&gt;' . "</a> ";
            }
        }
        echo " Next</div>";

    } else {

        echo mysqli_error($conn);
        
    }
}

search_prod();



?>