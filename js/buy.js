
document.querySelector(".span3").addEventListener("click", function() {


    document.getElementById("span12").style.transition = "font-size 0.5s ease-in";

    document.getElementById("span11").style.transition = "display 0.1s ease-in";
   
    document.getElementById("span13").style.transition = "font-size 0.6s ease-in";
   
    document.getElementById("span14").style.transition = "font-size 0.7s ease-in";


    document.getElementById("span12").style.fontSize = "30px";

    document.getElementById("span13").style.fontSize = "30px";
   
    document.getElementById("span14").style.fontSize = "30px";

    document.getElementById("span12").style.paddingTop = "10px";

    document.getElementById("span13").style.paddingTop = "10px";
   
    document.getElementById("span14").style.paddingTop = "10px";


    document.getElementById("span11").style.display = "inline";



    document.querySelector(".span3").setAttribute("onclick", "run()");


})


function run() {

    document.getElementById("span12").style.transition = "font-size 0.7s ease-in";

    document.getElementById("span11").style.transition = "display 0.1s ease-in";
   
    document.getElementById("span13").style.transition = "font-size 0.6s ease-in";
   
    document.getElementById("span14").style.transition = "font-size 0.5s ease-in";


    document.getElementById("span12").style.fontSize = "0px";

    document.getElementById("span13").style.fontSize = "0px";
   
    document.getElementById("span14").style.fontSize = "0px";

    document.getElementById("span12").style.paddingTop = "0px";

    document.getElementById("span13").style.paddingTop = "0px";
   
    document.getElementById("span14").style.paddingTop = "0px";


    document.getElementById("span11").style.display = "none";

    document.querySelector(".span3").removeAttribute("onclick", "run()");

}

let add_list = []

window.addEventListener("load", function() {

    call_again();
})


function call_again() {

    let getItem = localStorage.getItem("store");

    if(getItem == null){
        window.location.href = "index.php";
    } else {
        getItem = JSON.parse(getItem);

        for(let i = 0; i < getItem.length; i++) {

            let card = document.createElement("div");

            let card_body = document.createElement("div");

            let img = document.createElement("img")

            img.classList.add("img_ok");

            let h2 = document.createElement("h3");

            let h4 = document.createElement("h4")

            let button_del = document.createElement("button");

            let hidden_input = document.createElement("input");

            hidden_input.type = "hidden"


            button_del.classList.add(`btn_ok`);

            hidden_input.classList.add("hide_id");
            
            h2.classList.add("h2_ok");

            h4.classList.add("h4_ok");


            button_del.innerText = "Remove";

            hidden_input.value = i;

            h2.innerText = getItem[i].name_item;

            h4.innerText = getItem[i].price_item;

            img.src = getItem[i].image_item;

            let add_price = getItem[i].price_item.substring(getItem[i].price_item.indexOf("N") + 1);

            add_list.push(add_price);

            card.classList.add("card");

            card_body.classList.add("card_body");

            card.appendChild(card_body)

            card_body.appendChild(img)
            card_body.appendChild(h2)
            card_body.appendChild(h4)
            card_body.appendChild(button_del);
            card_body.appendChild(hidden_input);

            document.getElementsByClassName("card")[0].appendChild(card_body);

        }
    }
}


setTimeout(ok_run, 200);

function ok_run() {

    let btn_ok = document.getElementsByClassName("btn_ok").length;

    let add = 0;

    let list_product = [];



    for(let i = 0; i < btn_ok; i++) {

        document.getElementsByClassName("btn_ok")[i].style.float = "right";

        add += Number(add_list[i]);

        document.getElementsByClassName("btn_ok")[i].addEventListener("click", function() {

        let dad  = document.getElementsByClassName("btn_ok")[i].parentElement;

        let hide_id = dad.childNodes[4].value;

        console.log(hide_id);

        let check = localStorage.getItem("store");

        check = JSON.parse(check);

        check.splice(hide_id, 1);

        localStorage.removeItem("store");

        if(check != null) {

            for(let i = 0; i < check.length; i++) {

                if(check[i] != null) {
     
                     list_product.push (check[i]);
     
                     localStorage.setItem("store", JSON.stringify(list_product));
     
                     window.location.href = "buy.php";
     
                }
             }
        
        } else {

            window.location.href = "index.php";

        }

        if(check.length == 0) {

            window.location.href = "index.php";
        }

      

            
        }) 
    }

    document.getElementsByClassName("check_out")[0].style.display = "block";

    document.getElementById("dis_fig").innerText = add;
}