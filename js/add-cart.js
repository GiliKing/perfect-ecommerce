window.addEventListener("load", function() {
    let getItem = localStorage.getItem("store");

    if(getItem != null) {

        getItem = JSON.parse(getItem);


        for(let i = 0; i < getItem.length; i++) {

            store.push(getItem[i]);
        }


        document.getElementById("add_span").style.display = "inline";

        document.getElementById("add_span1").style.display = "block";
        document.getElementById("add_span1").style.textAlign = "center";
        document.getElementById("add_span1").style.fontSize = "25px";

        document.getElementById("add_span").innerHTML = getItem.length;

        document.getElementById("add_span1").innerHTML = getItem.length;

        document.getElementsByClassName("cart_display_cont")[0].style.display = "inline";

    }
})



let btn = document.querySelectorAll("#add_to_cart").length;

let store = [];

for(let i = 0; i < btn; i++) {
    document.querySelectorAll("#add_to_cart")[i].addEventListener("click", function() {

        let count = document.getElementById("add_span").innerHTML;

        let abc = 0;

        if(count == "0") {
            document.getElementById("add_span").style.display = "inline";
            document.getElementById("add_span").innerHTML = Number(count) + 1; 
            document.getElementById("add_span1").style.display = "block";
            document.getElementById("add_span1").style.textAlign = "center";
            document.getElementById("add_span1").style.fontSize = "25px";
            document.getElementById("add_span1").innerHTML = Number(count) + 1;
            document.getElementsByClassName("cart_display_cont")[0].style.display = "inline";

        }

        if(count > "0") {
            document.getElementById("add_span").innerHTML = Number(count) + 1; 
            document.getElementById("add_span").style.display = "inline";
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


        let store_list = {
            name_item: bb,
            price_item: c,
            image_item: a,
            id: d
        }

        console.log(b)


        store.push(store_list);


        localStorage.setItem("store",JSON.stringify(store));

    })
}

document.getElementById("buy_now").addEventListener("click", function() {

    window.location.href = "buy.html"
})

document.getElementById("add_span").addEventListener("click", function() {

    window.location.href = "buy.html"
})