window.addEventListener("load", function() {
    let getItem = localStorage.getItem("store");

    function runBack(ok) {

        // console.log(ok.length)

        document.getElementById("add_span").style.display = "inline";

        document.getElementById("add_span_ok").style.display = "inline";

        document.getElementById("add_span1").style.display = "block";
        document.getElementById("add_span1").style.textAlign = "center";
        document.getElementById("add_span1").style.fontSize = "25px";

        document.getElementById("add_span").innerHTML = ok.length;

        document.getElementById("add_span1").innerHTML = ok.length;

        document.getElementById("add_span_ok").innerHTML = ok.length;

        

        document.getElementsByClassName("cart_display_cont")[0].style.display = "inline";

        localStorage.removeItem("store");

    }


    if(getItem != null) {

        getItem = JSON.parse(getItem);

        for(let i = 0; i < getItem.length; i++) {

            // use ajax to set all the local storage item in db

            $.ajax({
                url: "process/form.php",
                method: "POST",
                data: {
                    name_cust: document.querySelector("#name_cust").value,
                    name_item: getItem[i].name_item,
                    price_item:  getItem[i].price_item,
                    image_item: getItem[i].image_item
                },
                success:function(data) {

                    let backendList = JSON.parse(data.trim());

                    runBack(backendList);

                }
            })    


        }


    }

    if(getItem == null) {

        // use ajax to set all the local storage item in db

        $.ajax({
            url: "process/form.php",
            method: "POST",
            data: {
                name_customer: document.querySelector("#name_cust").value,
            },
            success:function(data) {

                let backendList = JSON.parse(data.trim());


                if(backendList.length == 0) {
                    // do nothing
                } else {

                    runBack(backendList);

                }
            }
            
        })  

    }

  






})





let btn = document.querySelectorAll("#add_to_cart").length;


for(let i = 0; i < btn; i++) {
    document.querySelectorAll("#add_to_cart")[i].addEventListener("click", function() {

        let count = document.getElementById("add_span").innerHTML;

        let abc = 0;

        if(count == "0") {
            document.getElementById("add_span").style.display = "inline";
            document.getElementById("add_span").innerHTML = Number(count) + 1;
            document.getElementById("add_span_ok").innerHTML = Number(count) + 1;
            document.getElementById("add_span1").style.display = "block";
            document.getElementById("add_span1").style.textAlign = "center";
            document.getElementById("add_span1").style.fontSize = "25px";
            document.getElementById("add_span1").innerHTML = Number(count) + 1;
            document.getElementsByClassName("cart_display_cont")[0].style.display = "inline";

        }

        if(count > "0") {
            document.getElementById("add_span").innerHTML = Number(count) + 1; 
            document.getElementById("add_span").style.display = "inline";
            document.getElementById("add_span_ok").innerHTML = Number(count) + 1;
            document.getElementById("add_span1").style.display = "block";
            document.getElementById("add_span1").style.textAlign = "center";
            document.getElementById("add_span1").style.fontSize = "25px";
            document.getElementById("add_span1").innerHTML = Number(count) + 1;
            document.getElementsByClassName("cart_display_cont")[0].style.display = "inline";

        }

        let a = document.querySelectorAll("#image_section")[i].src;

        let b = document.querySelectorAll("#text_section")[i].innerText;

        let c = document.querySelectorAll("#small_section")[i].innerText;

        let d = document.getElementById("add_span").innerHTML;

        let bb = b.substring(0, b.indexOf(".N"));

        // console.log(abc)


        // add ajax to 

        $.ajax({
            url: "process/form.php",
            method: "POST",
            data : {
                name_customer_base: document.querySelector("#name_cust").value, 
                name_item_base: bb,
                price_item_base: c,
                image_item_base: a,
            },
            success: function(data) {
                
                // let backendList = JSON.parse(data.trim());

                // console.log(backendList);

                // do nothing for now
                
            }
        })


    })
}

document.getElementById("buy_now").addEventListener("click", function() {

    window.location.href = "buyitem.php"
})

document.getElementById("add_span").addEventListener("click", function() {

    window.location.href = "buyitem.php"
})