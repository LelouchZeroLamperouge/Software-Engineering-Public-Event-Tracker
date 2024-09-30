"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    let myMap = new Map();

    $("#createBtn").addEventListener("click", () => {
        let eName = $("#eName").value;  
        let eDesc = $("#Desc").value; 
        let eLoc = $("#Loc").value; 
        let eTime = $("#Date").value; 

        alert(eName+" | "+eDesc+" | "+eLoc+" | "+eTime+" Created");
    });
});
