"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    let myMap = new Map();

    $("#createBtn").addEventListener("click", () => {
            window.location.href = 'Create.php';
    });


    $("#fButton").addEventListener("click", () => {
        window.location.href = 'FP.php';
    });
    
    

    $("#loginBtn").addEventListener("click", () => {
        let email = $("#exampleInputEmail1").value;  
        let password = $("#floatingPassword").value;
        let errormsg = "";

        if (myMap.has(email)) {
            if (myMap.get(email) === password) {

                window.location.href = 'ES.php';
              
            } else {
                errormsg = "Email or password does not match.";
            }
        } else {
            errormsg = "Account does not exist.";
        }

        if (errormsg !== "") {
            alert(errormsg);
        }
    });
});
