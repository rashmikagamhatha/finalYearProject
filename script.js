function changeView() {
    var s_in = document.getElementById("s_in");
    var s_up = document.getElementById("s_up");

    s_in.classList.toggle("d-none");
    s_up.classList.toggle("d-none");
}

function empSignup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var selectPosition =document.getElementById("selectPosition");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // alert(password.value);

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("sp", selectPosition.value);
    f.append("mb", mobile.value);
    f.append("un", username.value);
    f.append("pw", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                selectPosition.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";

            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }

        }
    }

    request.open("POST", "signupProcess.php", true);
    request.send(f);

}

function empSignin() {
    var username = document.getElementById("un");
    var password = document.getElementById("pw");
    var rememberme = document.getElementById("rm");

    var f = new FormData();
    f.append("un", username.value);
    f.append("pw", password.value);
    f.append("rm", rememberme.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }

        }
    }
    
    request.open("POST", "signInProcess.php", true);
    request.send(f);

}