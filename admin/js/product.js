window.addEventListener('load', () => {

    let good = localStorage.getItem("store");

    let good_delete = localStorage.getItem("store_delete");


    if(good != null) {

        document.getElementsByClassName("enter_prod")[1].style.display = "none";

        document.getElementsByClassName("update_prod")[1].style.display = "block";

        document.getElementsByClassName("update_one")[0].style.display = "none";

        document.getElementsByClassName("update_two")[0].style.display = "block";

        document.getElementsByClassName("delete_prod")[1].style.display = "none";

        let goods = localStorage.getItem("goods")

        goods = JSON.parse(goods);

        document.getElementsByClassName("name_select")[0].innerHTML = goods[0];

        document.getElementsByClassName("update_name")[0].innerHTML = goods[1];

        document.getElementsByClassName("update_amount")[0].innerHTML = goods[2];

        document.getElementsByClassName("update_desc")[0].innerHTML = goods[4];

        document.getElementsByClassName("update_image")[1].src = goods[3];

        document.getElementsByClassName("id_prod")[0].value = goods[5];

        localStorage.removeItem("store");


        let data = document.getElementsByClassName("what_data")[0].value;

        if(data == "error_image_type")  {

            localStorage.setItem("store", 'update');

            let goods = localStorage.getItem("goods")

            goods = JSON.parse(goods);

            document.getElementsByClassName("name_select")[0].innerHTML = goods[0];

            document.getElementsByClassName("update_name")[0].innerHTML = goods[1];

            document.getElementsByClassName("update_amount")[0].innerHTML = goods[2];

            document.getElementsByClassName("update_desc")[0].innerHTML = goods[4];

            document.getElementsByClassName("update_image")[1].src = goods[3];

            document.getElementsByClassName("id_prod")[0].value = goods[5];


        }

        if(data == "success")  {

            localStorage.removeItem("store");

            localStorage.removeItem("goods");

            document.getElementsByClassName("update_one")[0].style.display = "block";

            document.getElementsByClassName("update_two")[0].style.display = "none";

        }

    }

    if(good_delete != null) {

        document.getElementsByClassName("enter_prod")[1].style.display = "none";

        document.getElementsByClassName("delete_prod")[1].style.display = "block";

        document.getElementsByClassName("delete_one")[0].style.display = "none";

        document.getElementsByClassName("delete_two")[0].style.display = "block";

        document.getElementsByClassName("update_prod")[1].style.display = "none";

        localStorage.removeItem("store_delete");

        
        let goods = localStorage.getItem("goods_delete")

        goods = JSON.parse(goods);

        document.getElementsByClassName("name_select_delete")[0].innerHTML = goods[0];

        document.getElementsByClassName("delete_name")[0].value = goods[1];

        document.getElementsByClassName("delete_amount")[0].value = goods[2];

        document.getElementsByClassName("delete_desc")[0].value = goods[4];

        document.getElementsByClassName("delete_image")[1].src = goods[3];

        document.getElementsByClassName("id_prod")[0].value = goods[5];


        let data_delete = document.getElementsByClassName("what_data_delete")[0].value;

        if(data_delete == "success")  {

            localStorage.removeItem("store_delete");

            localStorage.removeItem("goods_delete");

            document.getElementsByClassName("delete_one")[0].style.display = "block";

            document.getElementsByClassName("delete_two")[0].style.display = "none";

            document.getElementsByClassName("update_prod")[1].style.display = "none";

            document.getElementsByClassName("enter_prod")[1].style.display = "none";
        }

    }



})

function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
}
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

// switch between button
document.getElementsByClassName("update_prod")[0].addEventListener("click", () => {
    
    document.getElementsByClassName("enter_prod")[1].style.display = "none";

    document.getElementsByClassName("update_prod")[1].style.display = "block";

    document.getElementsByClassName("delete_prod")[1].style.display = "none";
})

// switch between button
document.getElementsByClassName("enter_prod")[0].addEventListener("click", () => {
    
    document.getElementsByClassName("enter_prod")[1].style.display = "block";

    document.getElementsByClassName("update_prod")[1].style.display = "none";

    document.getElementsByClassName("delete_prod")[1].style.display = "none";

})

// switch between button
document.getElementsByClassName("delete_prod")[0].addEventListener("click", () => {
    
    document.getElementsByClassName("enter_prod")[1].style.display = "none";

    document.getElementsByClassName("delete_prod")[1].style.display = "block";

    document.getElementsByClassName("update_prod")[1].style.display = "none";
})


//let process update form
document.getElementById("find_prod").addEventListener("click", function() {
    
    let category = document.getElementById("category").value.trim();

    let prod_id = document.getElementsByClassName("prod_id")[0].value.trim();

    let error = [];

    if(category == "Choose..." && prod_id.length == 0) {

        alert("Category and Product ID is empty")

        error.push("err1")

    }

    if(category == "Choose..." && prod_id.length != 0) {

        alert("Category is empty")

        error.push("err1")

    }

    if(category != "Choose..." && prod_id.length == 0) {

        alert("Product ID is empty")

        error.push("err1")

    }


    if(error.length == 1 || error.length == 2 || error.length == 3) {

        //  just checking

    } else {

        let cat_gory = "";

        if(category == 1) {

            cat_gory = "African Kitchen";

        }
        
        if(category == 2) {

            cat_gory = "Famot Cake and Delight";

        }
        
        if(category == 3) {

            cat_gory = "Favours Favourite";

        }

        $.ajax({
            url: './process/form.php',
            method: 'POST',
            data: {
                'category': cat_gory,
                'prod_id': prod_id,
            },
            success: function(data) {

                let error = data.trim();

                if(data.trim() == "Could not Find Product") {
                    alert("Could not Find Product")
                } else if (data.trim() == "Product does not exit") {
                    alert("Could not Find Product")
                } else {

                    let item = JSON.parse(data.trim());

                    console.log(item[1]);

                    document.getElementsByClassName("update_one")[0].style.display = "none";

                    document.getElementsByClassName("update_two")[0].style.display = "block";

                    document.getElementsByClassName("name_select")[0].innerHTML = item[0];

                    document.getElementsByClassName("update_name")[0].innerHTML = item[1];

                    document.getElementsByClassName("update_amount")[0].innerHTML = item[2];

                    document.getElementsByClassName("update_desc")[0].innerHTML = item[4];

                    document.getElementsByClassName("update_image")[1].src = item[3];

                    document.getElementsByClassName("id_prod")[0].value = item[5];


                    localStorage.setItem("store", 'update');

                    localStorage.setItem('goods', JSON.stringify(item));

                }

            }

        })


    }

})


//let process delete form
document.getElementById("delete_prod").addEventListener("click", function() {
    
    let category = document.getElementById("category_delete").value.trim();

    let prod_id = document.getElementsByClassName("prod_id_delete")[0].value.trim();

    let error = [];

    if(category == "Choose..." && prod_id.length == 0) {

        alert("Category and Product ID is empty")

        error.push("err1")

    }

    if(category == "Choose..." && prod_id.length != 0) {

        alert("Category is empty")

        error.push("err1")

    }

    if(category != "Choose..." && prod_id.length == 0) {

        alert("Product ID is empty")

        error.push("err1")

    }


    if(error.length == 1 || error.length == 2 || error.length == 3) {

        //  just checking

    } else {

        let cat_gory = "";

        if(category == 1) {

            cat_gory = "Africa Kitchen";

        }
        
        if(category == 2) {

            cat_gory = "Famot Cake and Delight";

        }
        
        if(category == 3) {

            cat_gory = "Favours Favourite";

        }

        $.ajax({
            url: './process/form.php',
            method: 'POST',
            data: {
                'category_delete': cat_gory,
                'prod_id_delete': prod_id,
            },
            success: function(data) {

                let error = data.trim();

                if(data.trim() == "Could not Find Product") {
                    alert("Could not Find Product")
                } else if (data.trim() == "Product does not exit") {
                    alert("Could not Find Product")
                } else {

                    let item_delete = JSON.parse(data.trim());

                    document.getElementsByClassName("delete_one")[0].style.display = "none";

                    document.getElementsByClassName("delete_two")[0].style.display = "block";

                    document.getElementsByClassName("name_select_delete")[0].innerHTML = item_delete[0];

                    document.getElementsByClassName("delete_name")[0].value = item_delete[1];

                    document.getElementsByClassName("delete_amount")[0].value = item_delete[2];

                    document.getElementsByClassName("delete_desc")[0].value = item_delete[4];

                    document.getElementsByClassName("delete_image")[1].src = item_delete[3];

                    document.getElementsByClassName("id_prod_delete")[0].value = item_delete[5];


                    localStorage.setItem("store_delete", 'update');

                    localStorage.setItem('goods_delete', JSON.stringify(item_delete));

                }

            }

        })


    }

})