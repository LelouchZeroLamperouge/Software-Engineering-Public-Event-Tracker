"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    let myMap = new Map();

    $("#createBtn").addEventListener("click", () => {
        let fName = $("#fName").value;
        let lName = $("#lName").value;
        let email = $("#exampleInputEmail1").value;  
        let password = $("#floatingPassword").value; 
        let cPassword = $("#confirmPassword").value; 
        let admin = $("#Admin").value;
        let org = $("#Org").value;
        let notif = $("#Notif").value;
        if(org === "yOrg"){
            org = true;
        }else{
            org = false;
        }

        if(admin === "yAdmin"){
            admin = true;
        }else{
            admin = false;
        }

        if(notif === "yNotif"){
            notif = true;
        }else{
            notif = false;
        }


        if (email && password && fName && lName && cPassword) {  
            myMap.set(email, password);
            if(password === cPassword){
                
                alert("Account created for: " + fName +" "+lName);
                window.location.href = 'SE.html';
            }else{
                alert("Passwords do not match!")
            }
            
        } else {
            alert("Please fill out required information.");
        }
    });

});
