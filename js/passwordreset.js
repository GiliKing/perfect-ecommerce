
// add the logic for clicking a button
document.getElementById('button').addEventListener('click', function() {

    let password_one = document.getElementsByClassName('password')[0].value;

    let password_two = document.getElementById('password').value;

    let old_token = document.getElementById("old_token").value;


    document.getElementById("load").style.display = "block";

    let error = [];

    if(password_one.length == 0) {

        document.querySelector('.err2').innerHTML = "password is empty";

        error.push("err2")

        document.getElementById("load").style.display = "none";

    }  else {

        document.querySelector('.err2').innerHTML = "";

    }

    if(password_two.length == 0) {

        document.querySelector('.err3').innerHTML = "password again is empty";

        error.push("err3")

        document.getElementById("load").style.display = "none";

    }  else {

        document.querySelector('.err3').innerHTML = "";

    }

    if(password_one.length != 0 &&  password_two.length == 0) {

        document.querySelector('.err3').innerHTML = "password again is empty";

        document.querySelector('.err2').innerHTML = "";

        error.push("err3")

        document.getElementById("load").style.display = "none";

    }

    if(password_one.length == 0 &&  password_two.length != 0) {

        document.querySelector('.err2').innerHTML = "password is empty";

        error.push("err2")

        document.getElementById("load").style.display = "none";

    }


    if(password_one.length !== password_two.length && password_one !== $password_two) {

        document.querySelector('.err4').innerHTML = "password do not match";

        error.push("err4")

        document.getElementById("load").style.display = "none";
    } 


    // send the info to the backend
    if(error.length == 0) {
        $.ajax({
            url: 'process/form.php',
            method: 'POST',
            data: {
                'password_one' : password_one.trim(),
                'old_token' : old_token,
            },
            success: function(data) {

                if(data.trim() == "changed") {

                    document.getElementById("load").innerHTML = "Password Changed Successfully.. Please Login";

                    document.getElementById('password').value = "";

                    document.getElementsByClassName('password')[0].value = "";

                    document.getElementsByTagName('form')[0].style.display = "none";


                }

  
            
            }
        });
    }

})

