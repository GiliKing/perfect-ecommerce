
// add the logic for clicking a button
document.getElementById('button').addEventListener('click', function() {

    let email = document.getElementById('email').value;

    document.getElementById("load").style.display = "block";

    let error = [];

    if(email.length == 0) {

        document.querySelector('.err2').innerHTML = "email is empty";

        error.push("err2")

        document.getElementById("load").style.display = "none";

    }


    // send the info to the backend
    if(error.length == 0) {
        $.ajax({
            url: 'process/form.php',
            method: 'POST',
            data: {
                'email_reset': email,
            },
            success: function(data) {

                good = data.trim()[data.trim().length-1];
                
                if(good.trim() == "%") {

                    document.getElementById("load").style.display = "none";

                    document.querySelector('#email').value = "";
                    

                    window.location.href = "resetpasswordtemplate.php";
                    
                }
            }
        });
    }

})

