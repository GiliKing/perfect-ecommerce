


document.getElementsByTagName("button")[0].addEventListener("click", function() {
    
    let name = document.getElementById("name").value.trim();

    let email = document.getElementById("email").value.trim();

    let password = document.getElementById("password").value.trim();

    let error = [];

    if(name.length == 0) {

        document.querySelector('.err1').innerHTML = "username is empty";

        error.push("err1")

    } else {

        document.querySelector('.err1').innerHTML = "";

    }

    if(email.length == 0) {

        document.querySelector('.err2').innerHTML = "email is empty";

        error.push("err2")

       
    }else if(email.indexOf("@") == -1) {

        document.querySelector('.err2').innerHTML = "email must include @";

        error.push("err2")

    }else {

        document.querySelector('.err2').innerHTML = "";

    }

    if(password.length == 0) {

        document.querySelector('.err3').innerHTML = "password is empty";

        error.push("err3")

       
    } else if(password.length < 8) {

        document.querySelector('.err3').innerHTML = "password is not up to 8 characters";

        error.push("err3")

    } else {

        document.querySelector('.err3').innerHTML = "";
        

    }


    if(error.length == 1 || error.length == 2 || error.length == 3) {

        //  just checking

        document.querySelector('.exist').style.display = 'none';


    } else {

        $.ajax({
            url: 'process/form.php',
            method: 'POST',
            data: {
                'username': name,
                'email': email,
                'password': password,
            },
            success: function(data) {


                console.log(data.trim());

                if(data.trim() == "exist") {

                    document.querySelector('.exist').style.display = 'block';

                    document.querySelector('.exist').innerHTML = "User Already Exit";

                    document.querySelector('#name').value = "";
                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";
                    
                }


                if(data.trim() == "yes") {

                    document.querySelector('#name').value = "";
                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";

                    window.location.href = "user.php";
                    
                }

                if(data.trim() == "verify") {

                    document.querySelector('#name').value = "";
                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";

                    window.location.href = "verify.php";
                    
                }


            }

        })


    }

})



document.getElementById("sign_ok").addEventListener("click", function() {

    window.location.href = "login.php";
    
})