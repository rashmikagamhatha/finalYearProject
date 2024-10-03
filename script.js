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

function typeReg() {
    var antype = document.getElementById("antype");
    // alert(antype.value);

    var f = new FormData();
    f.append("t", antype.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
                document.getElementById.apply("msgDiv1").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    }

    request.open("POST", "typeRegProcess.php", true);
    request.send(f);
}

function colorReg() {
    var color = document.getElementById("color");
    // alert(color.value);

    var f = new FormData();
    f.append("c", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
                document.getElementById.apply("msgDiv2").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "colorRegProcess.php", true);
    request.send(f);
}

function breedReg() {
    var breed = document.getElementById("breed");
    // alert(breed.value);

    var f = new FormData();
    f.append("b", breed.value);

    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
                document.getElementById.apply("msgDiv3").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
            
        }
    }

    request.open("POST", "breedRegProcess.php", true);
    request.send(f);
}

function healthReg() {
    var health = document.getElementById("health");

    var f = new FormData();
    f.append("h", health.value);

    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
                document.getElementById.apply("msgDiv4").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
            
        }
    }

    request.open("POST", "healthRegProcess.php", true);
    request.send(f);
}

function anReg() {
    var id = document.getElementById("id");
    var selectType = document.getElementById("selectType");
    var selectColor = document.getElementById("selectColor");
    var weight = document.getElementById("weight");
    var age = document.getElementById("age");
    var selectBreed = document.getElementById("selectBreed");
    var selectHealth = document.getElementById("selectHealth");
    

    var f = new FormData();
    f.append("id", id.value);
    f.append("type", selectType.value);
    f.append("color", selectColor.value);
    f.append("w", weight.value);
    f.append("age", age.value);
    f.append("breed", selectBreed.value);
    f.append("health", selectHealth.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msgan").innerHTML = "Registration Successfully";
                document.getElementById("msgan").className = "alert alert-success";
                document.getElementById("msgDivan").className = "d-block";

                id.value = "";
                selectType.value = "";
                selectColor.value = "";
                weight.value = "";
                age.value = "";
                selectBreed.value = "";
                selectHealth.value = "";
                reload();

            } else {
                document.getElementById("msgan").innerHTML = response;
                document.getElementById("msgDivan").className = "d-block";
            }
        }
    }

    request.open("POST", "animalRegProcess.php", true);
    request.send(f);
}


function uploadImg() {
    var img = document.getElementById("imgUploader");
  
    var f = new FormData();
    f.append("i", img.files[0]);
  
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "empty") {
                swal("Warning", "Plz Select Your Profile Image", "warning");
                // alert("Plz Select Your Profile Image");
            } else {
                document.getElementById("i").src = response;
                img.value = "";
            }
        }
    }
  
    request.open("POST", "profileImgUpload.php", true);
    request.send(f);
  }

  function updateData() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    // alert(fname.value);

    var f = new FormData();
    f.append()
}

  function updateData() {
    // alert("ok");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var d_on = document.getElementById("d_on");
    var d_off = document.getElementById("d_off");
    var sal = document.getElementById("sal");
    // alert(no.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("don", d_on.value);
    f.append("dof", d_off.value);
    f.append("s", sal.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            reload();

        }
    };

    request.open("POST", "updateDataProcess.php", true);
    request.send(f);
}


function comreg() {
    // alert("ok");

    var com = document.getElementById("com");

    var f = new FormData();
    f.append("c", com.value);

    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
                document.getElementById.apply("msgDiv1").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
            
        }
    }

    request.open("POST", "companyRegProcess.php", true);
    request.send(f);

}

function supReg() {
    var mobile = document.getElementById("mobile");
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var selectCompany = document.getElementById("selectCompany");

    var f = new FormData();
    f.append("m", mobile.value);
    f.append("n", name.value);
    f.append("e", email.value);
    f.append("com", selectCompany.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msgan").innerHTML = response;
                document.getElementById("msgDivan").className = "d-block";
                document.getElementById.apply("msgDivan").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("msgan").innerHTML = response;
                document.getElementById("msgDivan").className = "d-block";
            }
        }
    }


    request.open("POST", "supplierRegProcess.php", true);
    request.send(f);
}

function loadSup() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tbs").innerHTML = response;
        }
    };

    request.open("POST", "loadSupplierProcess.php", true);
    request.send();
}

function ftypereg() {
    var ftr = document.getElementById("ftr");

    var f = new FormData();
    f.append("f", ftr.value);

    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                ftr.value = "";
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
                document.getElementById.apply("msgDiv1").className = "alert alert-success";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
            
        }
    }

    request.open("POST", "foodTypeRegProcess.php", true);
    request.send(f);
}

function foodReg() {
    var fname = document.getElementById("fname");
    var ftype = document.getElementById("ftype");
    var fqty = document.getElementById("fqty");
    var fdate = document.getElementById("fdate");
    var fcost = document.getElementById("fcost");
    var smobile = document.getElementById("smobile");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ft", ftype.value);
    f.append("fq", fqty.value);
    f.append("fd", fdate.value);
    f.append("fc", fcost.value);
    f.append("sm", smobile.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState==4 & request.status==200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                ftr.value = "";
                document.getElementById("msgan").innerHTML = response;
                document.getElementById("msgDivan").className = "d-block";
                document.getElementById.apply("msgDivan").className = "alert alert-success";
            } else {
                document.getElementById("msgan").innerHTML = response;
                document.getElementById("msgDivan").className = "d-block";
            }
            
        }
    }

    request.open("POST", "foodRegProcess.php", true);
    request.send(f);

}

function loadfood() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tbf").innerHTML = response;
        }
    };

    request.open("POST", "loadFoodProcess.php", true);
    request.send();
}