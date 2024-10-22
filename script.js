function changeView() {
    var s_in = document.getElementById("s_in");
    var s_up = document.getElementById("s_up");

    s_in.classList.toggle("d-none");
    s_up.classList.toggle("d-none");
}

function empSignup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var selectPosition = document.getElementById("selectPosition");
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
            if (request.readyState == 4 & request.status == 200) {
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

    } else {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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
        if (request.readyState == 4 & request.status == 200) {
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

function producttypereg() {
    var ptr = document.getElementById("ptr");

    var f = new FormData();
    f.append("p", ptr.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                ptr.value = "";
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
                document.getElementById.apply("msgDiv1").className = "alert alert-success";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }

        }
    }

    request.open("POST", "productTypeRegProcess.php", true);
    request.send(f);
}

function metricreg() {
    var mtr = document.getElementById("mtr");

    var f = new FormData();
    f.append("m", mtr.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                mtr.value = "";
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
                document.getElementById.apply("msgDiv2").className = "alert alert-success";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }

        }
    }

    request.open("POST", "metricRegProcess.php", true);
    request.send(f);
}

function productReg() {
    var pname = document.getElementById("pname");
    var ptype = document.getElementById("ptype");

    var f = new FormData();
    f.append("pn", pname.value);
    f.append("pt", ptype.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                mtr.value = "";
                document.getElementById("msgpreg").innerHTML = response;
                document.getElementById("msgDivpreg").className = "d-block";
                document.getElementById.apply("msgDivpreg").className = "alert alert-success";
            } else {
                document.getElementById("msgpreg").innerHTML = response;
                document.getElementById("msgDivpreg").className = "d-block";
            }

        }
    }

    request.open("POST", "addProductProcess.php", true);
    request.send(f);
}

function stockReg() {
    var prtype = document.getElementById("prtype");
    var prname = document.getElementById("prname");
    var volume = document.getElementById("volume");
    var mtype = document.getElementById("mtype");
    var uprice = document.getElementById("uprice");
    var mfd = document.getElementById("mfd");
    var exp = document.getElementById("exp");

    var f = new FormData();
    f.append("pt", prtype.value);
    f.append("pn", prname.value);
    f.append("vol", volume.value);
    f.append("m", mtype.value);
    f.append("up", uprice.value);
    f.append("mfd", mfd.value);
    f.append("exp", exp.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                prtype.value = "";
                prname.value = "";
                volume.value = "";
                mtype.value = "";
                uprice.value = "";
                mfd.value = "";
                exp.value = "";
                document.getElementById("msgz").innerHTML = response;
                document.getElementById("msgDivz").className = "d-block";
                document.getElementById.apply("msgDivz").className = "alert alert-success";
            } else {
                document.getElementById("msgz").innerHTML = response;
                document.getElementById("msgDivz").className = "d-block";
            }

        }
    }

    request.open("POST", "addStockProcess.php", true);
    request.send(f);
}

function loadstock() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tbf").innerHTML = response;
        }
    };

    request.open("POST", "loadStockProcess.php", true);
    request.send();
}

function loadbystock() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tbb").innerHTML = response;
        }
    };

    request.open("POST", "loadbyproductkProcess.php", true);
    request.send();
}

function loadstocks() {
    loadstock();
    loadbystock();
}

function removestock() {
    var sid = document.getElementById("sid");
    // alert(userid.value);
    var f = new FormData();
    f.append("sid", sid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("m").innerHTML = "Stock Removed Successfully";
                document.getElementById("m").className = "alert alert-success";
                document.getElementById("md").className = "d-block";
                sid.value = "";
                loadstock();
            } else {
                document.getElementById("m").innerHTML = response;
                document.getElementById("md").className = "d-block";
            }
        }
    };

    request.open("POST", "deleteStockProcess.php", true);
    request.send(f);

}

function byproReg() {

    var antype = document.getElementById("antype");
    var pname = document.getElementById("pname");
    var volume = document.getElementById("volume");
    var uprice = document.getElementById("uprice");

    var f = new FormData();
    f.append("a", antype.value);
    f.append("n", pname.value);
    f.append("v", volume.value);
    f.append("up", uprice.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "New Stock Added Successfully") {
                antype.value = "";
                pname.value = "";
                volume.value = "";
                uprice.value = "";
                document.getElementById("msgz").innerHTML = response;
                document.getElementById("msgDivz").className = "d-block";
                document.getElementById.apply("msgDivz").className = "alert alert-success";
            } else {
                document.getElementById("msgz").innerHTML = response;
                document.getElementById("msgDivz").className = "d-block";
            }

        }
    }

    request.open("POST", "byproductProcess.php", true);
    request.send(f);

}

function removebystock() {
    var byid = document.getElementById("byid");
    // alert(userid.value);
    var f = new FormData();
    f.append("byid", byid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("ms").innerHTML = "Stock Removed Successfully";
                document.getElementById("ms").className = "alert alert-success";
                document.getElementById("mds").className = "d-block";
                byid.value = "";
                loadbystock();
            } else {
                document.getElementById("ms").innerHTML = response;
                document.getElementById("mds").className = "d-block";
            }
        }
    };

    request.open("POST", "deletebyStockProcess.php", true);
    request.send(f);
}


function removeanimal() {
    var aid = document.getElementById("aid");
    // alert(userid.value);
    var f = new FormData();
    f.append("aid", aid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    };

    request.open("POST", "removeanimalprocess.php", true);
    request.send(f);
}

function editanimal() {
    var aid = document.getElementById("aid");
    // alert(userid.value);
    var f = new FormData();
    f.append("aid", aid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                window.location = "editanimaldetails.php";
            } else {
                alert(response);
            }
        }
    };

    request.open("POST", "animalprofile.php", true);
    request.send(f);
}

function updateAnData() {
    // alert("OK");
    var weight = document.getElementById("weight");
    var age = document.getElementById("age");
    var health = document.getElementById("health");
    var vdetails = document.getElementById("vdetails");
    var binfo = document.getElementById("binfo");
    var feed = document.getElementById("feed");

    var f = new FormData();
    f.append("w", weight.value);
    f.append("a", age.value);
    f.append("h", health.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            // swal("lezafarming", response);
            if (response == "Update Successfully") {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "updateAnimalProfileProcess.php", true);
    request.send(f);

}


function loadProducta() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("aas").innerHTML = response;
        }
    };

    request.open("POST", "loadSaleProductProcess.php", true);
    request.send();
}

function addtocart(x) {
    // alert(x);

    var stockId = x;
    var qty = document.getElementById("qty");
    var selectCustomer = document.getElementById("selectCustomer")

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);
        f.append("sc", selectCustomer.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);
                swal("lesafarming", response);
            }
        }
        request.open("POST", "addtoCartProcess.php");
        request.send(f);

    } else {
        alert("Please add a valid quantity");
    }
}


function cusReg() {
    var mobile = document.getElementById("mobile");
    var name = document.getElementById("name");
    var email = document.getElementById("email");

    var f = new FormData();
    f.append("m", mobile.value);
    f.append("n", name.value);
    f.append("e", email.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
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


    request.open("POST", "customerRegProcess.php", true);
    request.send(f);
}

function loadCus() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tbc").innerHTML = response;
        }
    };

    request.open("POST", "loadCustomerProcess.php", true);
    request.send();
}

function checkOut() {
    var selectCustomer = document.getElementById("selectCustomer");

    if (selectCustomer.value > 0) {
        var f = new FormData();
        f.append("sc", selectCustomer.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    window.location = "loadCart.php";
                }
            }
        }
        request.open("POST", "checkoutProcess.php");
        request.send(f);
    } else {
        swal("lesafarming", response);
    }

}

function loadCart() {
    // alert("OK");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    };

    request.open("POST", "loadCartItemsProcess.php", true);
    request.send();
}

function incrementCartQty(x) {
    // alert(x);
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    // alert(qty.value);
    var newQty = parseInt(qty.value) + 1;
    // alert(newQty);
    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                // alert(response);
                swal("newTechonline", response);
            }
        }
    }
    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);
}

function decrementCartQty(x) {
    // alert(x);

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    // alert(qty.value);
    var newQty = parseInt(qty.value) - 1;
    // alert(newQty);
    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    // alert(response);
                    swal("newTechonline", response);
                }
            }
        }
        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }
}

function removeCart(x) {
    // alert(x);
    if (confirm("Are You Sure Deleting This Item?")) {

        var f = new FormData();
        f.append("c", x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                alert(response);
                reload();
            }
        };
        request.open("POST", "removeCartProcess.php", true);
        request.send(f);

    }
}


function checkOutbuy(x) {
    // alert(x);

    var f = new FormData();
    f.append("cart", true);
    f.append("n", x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "invoice.php";
            }

        }
    }


    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}



function finish() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
        }
    };

    request.open("POST", "deleteInvoiceItems.php", true);
    request.send();
}

function removefood() {

    var fid = document.getElementById("fid");

    var f = new FormData();
    f.append("fid", fid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("m").innerHTML = response;
                document.getElementById("md").className = "d-block";
                document.getElementById.apply("md").className = "alert alert-success";
                antype.value = "";
            } else {
                document.getElementById("m").innerHTML = response;
                document.getElementById("md").className = "d-block";
            }
        }
    };

    request.open("POST", "removefoodprocess.php", true);
    request.send(f);
}

function animalHealthProfile() {
    // alert("OK");
    var aid = document.getElementById("selectType");
    // alert(userid.value);
    var f = new FormData();
    f.append("aid", aid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                window.location = "animalHealthProfile.php";
                // alert(response);
            } else {
                alert(response);
            }
        }
    };

    request.open("POST", "animalhealthprocess.php", true);
    request.send(f);
}

function updateAnHealth() {
    // alert("ok");

    var weight = document.getElementById("weight");
    var age = document.getElementById("age");
    var health = document.getElementById("health");
    var mdetails = document.getElementById("mdetails");
    var vdetails = document.getElementById("vdetails");
    var wdetails = document.getElementById("wdetails");
    var tdetails = document.getElementById("tdetails");

    var f = new FormData();
    f.append("md", mdetails.value);
    f.append("vd", vdetails.value);
    f.append("wd", wdetails.value);
    f.append("td", tdetails.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Update Successfully") {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }

        }
    };

    request.open("POST", "animalHealthUpdateProcess.php", true);
    request.send(f);

}

function loadfeeding() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tbmf").innerHTML = response;
        }
    };

    request.open("POST", "loadfeedingProcess.php", true);
    request.send();
}


function feedschedreg() {
    var atype = document.getElementById("atype");
    var fotype = document.getElementById("fotype");
    var foname = document.getElementById("foname");
    var t1 = document.getElementById("t1");
    var t2 = document.getElementById("t2");

    var f = new FormData();
    f.append("at", atype.value);
    f.append("fot", fotype.value);
    f.append("fon", foname.value);
    f.append("t1", t1.value);
    f.append("t2", t2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    };

    request.open("POST", "manageFeedingAddProcess.php", true);
    request.send(f);

}

function removefeedings() {
    var ftid = document.getElementById("fid");

    var f = new FormData();
    f.append("fid", ftid.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    };

    request.open("POST", "deleteFeedingitemsprocess.php", true);
    request.send(f);
}

function vccreminder() {
   var atype = document.getElementById("atype");
   var vdetails = document.getElementById("vdetails");
   var date = document.getElementById("date");
   var time = document.getElementById("time");

   var f = new FormData();
   f.append("vdt", vdetails.value);
   f.append("date", date.value);
   f.append("time", time.value);

   var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    };

    request.open("POST", "addvaccinedetailsprocess.php", true);
    request.send(f);
}



// vaccreminder
document.getElementById('reminderForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const message = document.getElementById('message').value;
    const date = document.getElementById('reminderDate').value;
    const time = document.getElementById('reminderTime').value;

    fetch('add_reminder.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message, date, time })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // alert('Reminder Added!');
                swal("Lezafarming", "Reminder Added!");
                loadReminders();
            } else {
                alert('Not added');
            }
        });
});

function loadReminders() {
    fetch('get_reminders.php')
        .then(response => response.json())
        .then(data => {
            const remindersList = document.getElementById('remindersList');
            remindersList.innerHTML = '';
            data.vaccination_reminder.forEach(reminder => {
                const reminderTime = new Date(`${reminder.reminder_date}T${reminder.reminder_time}`);
                const currentTime = new Date();

                // Check if the reminder time is in the future
                if (reminderTime > currentTime) {
                    const div = document.createElement('div');
                    div.textContent = `${reminder.message} - ${reminder.reminder_date} ${reminder.reminder_time}`;

                    // Set an interval to check when to display the reminder
                    const interval = setInterval(() => {
                        const now = new Date();
                        if (now >= reminderTime) {
                            // alert(`Message: ${reminder.message}`);
                            swal("Lezafarming", `Message: ${reminder.message}`);
                            document.getElementById("msga").innerHTML = reminder.message;
                            document.getElementById("msgDiva").className = "d-block";
                            div.textContent += " (Reminder Seened)";
                            clearInterval(interval);
                        }
                    }, 1000); // Check every second

                    remindersList.appendChild(div);
                }
            });
        });
}

document.addEventListener('DOMContentLoaded', loadReminders);



document.getElementById('reminderForm1').addEventListener('submit', function (event) {
    event.preventDefault();

    const message = document.getElementById('message').value;
    const date = document.getElementById('reminderDate').value;
    const time = document.getElementById('reminderTime').value;

    fetch('add_reminder.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message, date, time })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // alert('Reminder Added!');
                swal("Lezafarming", "Reminder Added!");
                loadReminders();
            } else {
                alert('Not added');
            }
        });
});


function loadReminders1() {
    fetch('get_reminders1.php')
        .then(response => response.json())
        .then(data => {
            const remindersList = document.getElementById('remindersList');
            remindersList.innerHTML = '';
            data.feeding_reminder.forEach(reminder => {
                const reminderTime = new Date(`${reminder.reminder_date}T${reminder.reminder_time}`);
                const currentTime = new Date();

                // Check if the reminder time is in the future
                if (reminderTime > currentTime) {
                    const div = document.createElement('div');
                    div.textContent = `${reminder.message} - ${reminder.reminder_date} ${reminder.reminder_time}`;

                    // Set an interval to check when to display the reminder
                    const interval = setInterval(() => {
                        const now = new Date();
                        if (now >= reminderTime) {
                            // alert(`Message: ${reminder.message}`);
                            swal("Lezafarming", `Message: ${reminder.message}`);
                            document.getElementById("msga").innerHTML = reminder.message;
                            document.getElementById("msgDiva").className = "d-block";
                            div.textContent += " (Reminder Seened)";
                            clearInterval(interval);
                        }
                    }, 1000); // Check every second

                    remindersList.appendChild(div);
                }
            });
        });
}

document.addEventListener('DOMContentLoaded', loadReminders1);