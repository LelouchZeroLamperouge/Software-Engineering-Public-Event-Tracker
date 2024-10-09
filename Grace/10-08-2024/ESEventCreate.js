"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {

    $("#createBtn").addEventListener("click", () => {
        let eName = $("#eName").value;  
        let eDesc = $("#Desc").value; 
        let eTime = $("#Date").value;
        let street = $("#strtAdd").value;
        let city = $("#city").value;
        let zip = $("#zip").value;
        let cat = $("#Cat").value;


        alert(eName+" "+eDesc+" "+street+" "+ city+" "+ zip+" "+ cat +" "+eTime+" Created");
    });

    $("#profileBtn").addEventListener("click", () => {
        window.location.href = 'Create.php';
    });
    
    $("#logoutBtn").addEventListener("click", () => {
        window.location.href = 'SE.php';
    });
    $("#cust").addEventListener("click", () => {
        window.location.href = 'ES.php';
    });
});

