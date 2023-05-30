
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

// end of drop down;






let add_list = []

let add = 0;


window.addEventListener("load", function() {


    let username = document.querySelector("#name_cust").value;

    $.ajax({
        url: "process/form.php",
        method: "POST",
        data: {
            name_customer_only: username
        },
        success:function(data) {

            let backendList = JSON.parse(data.trim());


            if(backendList.length == 0) {
                window.location.href = "user.php";
            } else {
                runBack(backendList);
            }


        }
    })


    
    function runBack(ok_item) {

        for(let i = 0; i < ok_item.length; i++) {

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

            h2.classList.add("pl-3");
        
            h4.classList.add("h4_ok");
        
        
            button_del.innerText = "Remove";

        
            hidden_input.value = ok_item[i].id;

            h2.innerText = ok_item[i].item;

            h4.innerText = ok_item[i].price;

            img.src = ok_item[i].image;

            let add_price = ok_item[i].price.substring(ok_item[i].price.indexOf("N") + 1);

            add_list.push(add_price);

            card.classList.add("card");

            card_body.classList.add("card_body");

            card_body.classList.add("mt-5");

            card.appendChild(card_body)

            card_body.appendChild(img)
            card_body.appendChild(h2)
            card_body.appendChild(h4)
            card_body.appendChild(button_del);
            card_body.appendChild(hidden_input);

            document.getElementsByClassName("card")[0].appendChild(card_body);

            add += Number(add_list[i]);

            document.getElementById("dis_fig").innerText = add;

            document.getElementById("amount_pay").value = add;
        }

        setTimeout(ok_run, 1000)


    }


        
})






function ok_run() {

    let btn_ok = document.getElementsByClassName("btn_ok").length;

    for(let i = 0; i < btn_ok; i++) {

        document.getElementsByClassName("btn_ok")[i].style.float = "right";

        add += Number(add_list[i]);

        document.getElementsByClassName("btn_ok")[i].addEventListener("click", function() {

            let dad  = document.getElementsByClassName("btn_ok")[i].parentElement;

            let hide_id = dad.childNodes[4].value;

            console.log(hide_id)


            // send the id to delete

            $.ajax({
                url: "process/form.php",
                method: "POST",
                data: {
                    del_id: hide_id
                },
                success:function(data) {

                    dad.style.display = "none";

                    $(".error_back").html(data.trim())

                    window.location.href = "buyitem.php"
                    
                }
            })

      

            
        }) 
    }


}



document.getElementById("span1").addEventListener("click", function() {

    window.location.href = "user.php";

})


document.getElementById("span5").addEventListener("click", function() {

    window.location.href = "user.php";
    
})


document.getElementById("span6").addEventListener("click", function() {

    window.location.href = "logout.php";
    
})


document.getElementById("login").addEventListener("click", function() {

    window.location.href = "logout.php";
    
})


document.getElementById("signup").addEventListener("click", function() {

    window.location.href = "user.php";
    
})