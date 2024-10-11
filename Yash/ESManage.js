"use strict";

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    $("#logoutBtn").addEventListener("click", () => {
        window.location.href = 'SE.php';
    });
    $("#cust").addEventListener("click", () => {
        window.location.href = 'ES.php';
    });

    $("#profileBtn").addEventListener("click", () => {
        window.location.href = 'Create.php';
    });
});

