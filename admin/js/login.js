


document.getElementsByTagName("button")[0].addEventListener("click", function() {
    
    let email = document.getElementById("email").value.trim();

    let password = document.getElementById("password").value.trim();

    let error = [];

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

       
    }  else {

        document.querySelector('.err3').innerHTML = "";
        

    }


    if(error.length == 1 || error.length == 2) {

        //  just checking

    } else {

        $.ajax({
            url: './process/form.php',
            method: 'POST',
            data: {
                'email_login': email,
                'password_login': password,
            },
            success: function(data) {

                console.log(data)

                if(data.trim() == "not1") {

                    document.querySelector('.exist').style.display = 'block';

                    document.querySelector('.exist').innerHTML = "Your are not registerd. Sign Up";

                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";
                    
                }


                if(data.trim() == "not3") {

                    document.querySelector('.exist').style.display = 'block';

                    document.querySelector('.exist').innerHTML = "Your email is not registerd. Sign Up";

                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";
                    
                }


                if(data.trim() == "not2") {

                    document.querySelector('.exist').style.display = 'block';

                    document.querySelector('.exist').innerHTML = "Your password is incorrect";

                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";
                    
                }


                if(data.trim() == "yes") {

                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";

                    window.location.href = "index.php";
                    
                }


                if(data.trim() == "verify") {

                    document.querySelector('#email').value = "";
                    document.querySelector('#password').value = "";

                    // window.location.href = "verify.php";

                    alert("this admin is un verified")
                    
                }


            }
        })


    }

})


