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
    var email = document.getElementById("email")
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // alert(password.value);

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("sp", selectPosition.value);
    f.append("mb", mobile.value);
    f.append("em", email.value);
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
                email.value = "";
                username.value = "";
                password.value = "";
                window.location = "login.php";

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
                window.location = "dashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }

        }
    }
    
    request.open("POST", "signInProcess.php", true);
    request.send(f);

}

function forgetPassword() {
    var email = document.getElementById("e")

    if (email.value != "") {
        
        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState==4 & request.status==200) {
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    document.getElementById("msgr").innerHTML = "Email Sent! Check Mail Inbox";
                    document.getElementById("msgr").className = "alert alert-success";
                    document.getElementById("msgDivr").className = "d-block";

                } else {
                    document.getElementById("msgr").innerHTML = response;
                    document.getElementById("msgr").className = "alert alert-success";
                    document.getElementById("msgDivr").className = "d-block";

                }
            }
        }


        request.open("POST", "forgetPasswordprocess.php", true);
        request.send(f);

    }else{
        alert("Please enter your email");
    }
}

function resetPassword() {
    // alert("OK");

    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "login.php";
            } else {
                document.getElementById("msgr").innerHTML = response;
                document.getElementById("msgr").className = "alert alert-success";
                document.getElementById("msgDivr").className = "d-block";
            }
        }
    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
}

function admSignin() {
    // alert("ok");

    var username = document.getElementById("adun");
    var password = document.getElementById("adpw");

    var f = new FormData();
    f.append("un", username.value);
    f.append("pw", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "dashboard.php";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    }

    request.open("POST", "adminSigninProcess.php", true);
    request.send(f);
}

function loadUser() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function updateUserStatus() {

    var userid = document.getElementById("uid");
    // alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Deactive") {
                document.getElementById("m").innerHTML = "User Deactivate Successfully";
                document.getElementById("m").className = "alert alert-success";
                document.getElementById("md").className = "d-block";
                userid.value = "";
                loadUser();
            } else if (response == "Active") {
                document.getElementById("m").innerHTML = "User Activate Successfully";
                document.getElementById("m").className = "alert alert-success";
                document.getElementById("md").className = "d-block";
                userid.value = "";
                loadUser();
            } else {
                document.getElementById("m").innerHTML = response;
                document.getElementById("md").className = "d-block";
            }
        }
    };

    request.open("POST", "statusProcess.php", true);
    request.send(f);

}

function deleteUser() {
    var userid = document.getElementById("uid");
    // alert(userid.value);
    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("m").innerHTML = "User Removed Successfully";
                document.getElementById("m").className = "alert alert-success";
                document.getElementById("md").className = "d-block";
                userid.value = "";
                loadUser();
            } else {
                document.getElementById("m").innerHTML = response;
                document.getElementById("md").className = "d-block";
            }
        }
    };

    request.open("POST", "deleteUserProcess.php", true);
    request.send(f);
}

function signOut() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            window.location = "login.php";
            reload();

        }
    };

    request.open("POST", "signOutProcess.php", true);
    request.send();
}


function printDiv() {
    var originalContent = document.body.innerHTML;
    var printArea = document.getElementById("printAr").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = originalContent;
}

function loadAnimal1() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb1").innerHTML = response;
        }
    };

    request.open("POST", "loadAnimalsProcess.php", true);
    request.send();
}

function loadAnimal2() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb2").innerHTML = response;
        }
    };

    request.open("POST", "loadAnimalsProcess2.php", true);
    request.send();
}

function loadAnimal3() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb3").innerHTML = response;
        }
    };

    request.open("POST", "loadAnimalsProcess3.php", true);
    request.send();
}

function loadAnimal() {
    loadAnimal1();
    loadAnimal2();
    loadAnimal3();
}

function printDiv2() {
    var originalContent = document.body.innerHTML;
    var printArea = document.getElementById("printAr2").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = originalContent;
}

function printDiv3() {
    var originalContent = document.body.innerHTML;
    var printArea = document.getElementById("printAr3").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = originalContent;
}