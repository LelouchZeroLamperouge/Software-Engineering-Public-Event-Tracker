"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    let myMap = new Map();

    $("#createBtn").addEventListener("click", () => {
        let email = $("#exampleInputEmail1").value;  
        let password = $("#floatingPassword").value; 

        if (email && password) {  
            myMap.set(email, password);
            alert("Account created for: " + email);
        } else {
            alert("Please provide both an email and a password.");
        }
    });

    $("#loginBtn").addEventListener("click", () => {
        let email = $("#exampleInputEmail1").value;  
        let password = $("#floatingPassword").value;
        let accType = $("#accType").value;
        let errormsg = "";

        if (myMap.has(email)) {
            if (myMap.get(email) === password) {
                if(accType === "Creator"){
                    window.location.href = 'ESManageer.html'
                }else{
                    window.location.href = 'ES.html';
                }
              
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
