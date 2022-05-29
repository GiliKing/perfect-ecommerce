document.getElementById("span4").addEventListener("click", function() {

    let span = document.getElementsByClassName("shopdrop")[0];

    span.classList.remove("shopdrop");

    span.classList.add("shopup")

    this.setAttribute("onclick", "myClick()");

    let div = document.getElementsByClassName("all")[0];

    // div.style.fontSize = "initial";

    div.style.display = "block";

})

function myClick() {

    document.getElementById("span4").removeAttribute("onclick");

    let span = document.getElementsByClassName("shopup")[0];

    span.classList.remove("shopup");

    span.classList.add("shopdrop");

}

document.getElementsByClassName("all")[0].addEventListener("click", function() {

    document.getElementById("span4").removeAttribute("onclick");

    let span = document.getElementsByClassName("shopup")[0];

    span.classList.remove("shopup");

    span.classList.add("shopdrop");

    this.style.display = "none";
})


// dropdown menu logic

document.getElementById("span9").addEventListener("click", function() {
    let nav2 = document.getElementById("nav2");

    let wrapping_only = document.getElementsByClassName("wrapping_only")[0];

    let text_1 = document.getElementsByClassName("current_m")[0];

    let text_2 = document.getElementsByClassName("shop_only")[0];

    let text_3 = document.getElementsByClassName("grab_only")[0];

    let text_4 = document.getElementsByClassName("blog_only")[0];

    carry_run(text_1, text_2, text_3, text_4);

    wrapping_only.style.paddingTop = "350px";

    nav2.style.border = "0.1px solid white";

    nav2.style.transition = "border 0.6s ease-in"

    wrapping_only.style.transition = "padding-top 0.6s ease-in"

    this.setAttribute("onclick", "drop_up()");

})


function carry_run(text_1, text_2, text_3, text_4) {

    text_1.classList.remove("current_m");
    text_1.style.transition = "font-size 0.3s ease-in"
    text_1.classList.add("current_ok");


    text_2.classList.remove("shop_only");
    text_2.style.transition = "font-size 0.4s ease-in";
    text_2.classList.add("shop_ok");


    text_3.classList.remove("grab_only");
    text_3.style.transition = "font-size 0.5s ease-in";
    text_3.classList.add("grab_ok");


    text_4.classList.remove("blog_only");
    text_4.style.transition = "font-size 0.6s ease-in";
    text_4.classList.add("blog_ok");


}


function drop_up() {

    let nav2 = document.getElementById("nav2");

    let wrapping_only = document.getElementsByClassName("wrapping_only")[0];

    let text_1 = document.getElementsByClassName("current_ok")[0];

    let text_2 = document.getElementsByClassName("shop_ok")[0];

    let text_3 = document.getElementsByClassName("grab_ok")[0];

    let text_4 = document.getElementsByClassName("blog_ok")[0];

    carry_run1(text_1, text_2, text_3, text_4);

    wrapping_only.style.paddingTop = "0px";

    nav2.style.border = "0.1px solid white";

    nav2.style.transition = "border 0.6s ease-in";

    wrapping_only.style.transition = "padding-top 0.6s ease-in";


    document.getElementById("span9").removeAttribute("onclick");



}


function carry_run1(text_1, text_2, text_3, text_4) {

    text_1.classList.remove("current_ok");
    text_1.style.transition = "font-size 0.3s ease-in"
    text_1.classList.add("current_m");


    text_2.classList.remove("shop_ok");
    text_2.style.transition = "font-size 0.4s ease-in";
    text_2.classList.add("shop_only");


    text_3.classList.remove("grab_ok");
    text_3.style.transition = "font-size 0.5s ease-in";
    text_3.classList.add("grab_only");


    text_4.classList.remove("blog_ok");
    text_4.style.transition = "font-size 0.6s ease-in";
    text_4.classList.add("blog_only");


}


// change text display



window.addEventListener("load", function() {


    let w = window.innerWidth;


    if(w <= 989) {
        
        let text = document.querySelectorAll("#change_display").length;


        for(let i = 0; i < text; i++) {

            document.querySelectorAll("#change_display")[i].classList.remove("col-sm-4");

            document.querySelectorAll("#change_display")[i].classList.add("col-sm-6")
            
        }


    


    }

    if(w <= 768) {
        
        let text = document.querySelectorAll("#change_display").length;


        for(let i = 0; i < text; i++) {

            document.querySelectorAll("#change_display")[i].classList.remove("col-sm-6");

            document.querySelectorAll("#change_display")[i].classList.add("col-sm-12")
            
        }
    


    }





})

// setInterval(run, 6000);



let i = 1;


function run() {

    


}


function run1(){

    if(i == 1) {

        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        i = 2;
    }

    document.getElementsByClassName("arr_2")[0].setAttribute("onclick", "run2()")


}

function run2(){

    if(i == 2) {

        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        i = 3;
    }




    document.getElementsByClassName("arr_2")[0].setAttribute("onclick", "run3()")


    
}



function run3(){

    if(i == 3) {

        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";
        i = 4;
    }



    document.getElementsByClassName("arr_2")[0].setAttribute("onclick", "run4()")

}


function run4(){


    if(i == 4) {

        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        i = 1;
    }

     document.getElementsByClassName("arr_2")[0].setAttribute("onclick","run1()")
}


// second button


let a = 1

function speed1(){

    if(a == 1) {

        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        a = 4;
    }

    document.getElementsByClassName("arr_1")[0].setAttribute("onclick", "speed2()")


}

function speed2(){

    if(a == 4) {


        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        a = 3;
    }


    document.getElementsByClassName("arr_1")[0].setAttribute("onclick", "speed3()")


    
}



function speed3(){

    if(a == 3) {


        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";



        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        a = 2;
    }



    document.getElementsByClassName("arr_1")[0].setAttribute("onclick", "speed4()")

}


function speed4(){


    if(a == 2) {

        document.querySelectorAll(".text_l")[1].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[1].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[1].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[2].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[2].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.fontSize = "0px";

        document.querySelectorAll(".text_l")[3].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[3].childNodes[3].style.transition = "font-size 0.9s ease-in-out";


        document.querySelectorAll(".text_l")[0].childNodes[1].style.fontSize = "initial";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.fontSize = "30px";

        document.querySelectorAll(".text_l")[0].childNodes[1].style.transition = "font-size 0.9s ease-in-out";

        document.querySelectorAll(".text_l")[0].childNodes[3].style.transition = "font-size 0.9s ease-in-out";

        a = 1;
    }

     document.getElementsByClassName("arr_1")[0].setAttribute("onclick","speed1()")
}


// login button and register button


document.getElementById("span8").addEventListener("click", function() {

    window.location.href = "login.php";


})

document.getElementById("only_only").addEventListener("click", function() {

    window.location.href = "login.php";


})


document.getElementById("span7").addEventListener("click", function() {

    window.location.href = "register.php";


})

document.getElementsByClassName("blog_only")[0].addEventListener("click", function() {

    window.location.href = "register.php";
    
})

document.getElementsByClassName("blog_ok")[0].addEventListener("click", function() {

    window.location.href = "register.php";
    
})






