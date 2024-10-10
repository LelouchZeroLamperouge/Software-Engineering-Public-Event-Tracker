"use strict";

const $ = selector => document.querySelector(selector);

function filterEventsES() {
    const input = document.getElementById('SearchBar');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('ET');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) { 
        const cells = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
        if (!cells.includes(filter)) {
            rows[i].style.display = 'none';
        } else {
            rows[i].style.display = '';
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    $("#Search").addEventListener("click", () => {
        filterEventsES();
    });
    $("#profileBtn").addEventListener("click", () => {
        window.location.href = 'Create.php';
    });
    $("#creatorBtn").addEventListener("click", () => {
        window.location.href = 'ESManageer.php';
    });

    $("#logoutBtn").addEventListener("click", () => {
        window.location.href = 'SE.php';
    });

   
});
