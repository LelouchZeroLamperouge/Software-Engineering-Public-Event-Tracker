"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {

    $("#createBtn").addEventListener("click", () => {
        let eName = $("#eName").value;  
        let eDesc = $("#Desc").value; 
        let eLoc = $("#Loc").value; 
        let eTime = $("#Date").value; 

        alert(eName+" | "+eDesc+" | "+eLoc+" | "+eTime+" Created");
    });

    $("#logoutBtn").addEventListener("click", () => {
        window.location.href = 'SE.html';
    });
    $("#cust").addEventListener("click", () => {
        window.location.href = 'ES.html';
    });
});

