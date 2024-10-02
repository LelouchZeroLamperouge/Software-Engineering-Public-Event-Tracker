"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    $("#logoutBtn").addEventListener("click", () => {
        window.location.href = 'SE.html';
    });
    $("#cust").addEventListener("click", () => {
        window.location.href = 'ES.html';
    });
});

