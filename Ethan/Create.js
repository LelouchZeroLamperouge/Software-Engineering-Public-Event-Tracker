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
                let sqlCheck = 'SELECT EXISTS(SELECT 1 FROM USERS WHERE EMAIL = ?) AS email_exists';
                let sql = 'INSERT INTO USERS (F_NAME, L_NAME, EMAIL, PASSWORD, ORGANIZATION, ADMIN, NOTIFICATIONS) VALUES (?, ?, ?, ?, ?, ?, ?)';
                let values = [fname,lname,email, password, admin, org, notif];
                let exists = false;

                connection.query(sqlCheck, [email], (err, result) => {
                    if (err) {
                      alert('Error checking email:' + err);
                    }
                    exists = result[0].email_exists === 1;
                  });
                  if(exists){
                    connection.query(sql, values, (err, result) => {
                        if (err) {
                          alert('Error inserting data:' + err);
                          return;
                        }
                         alert('Data inserted successfully:' + result);
                      });
                    
                    
                    alert("Account created for: " + fName +" "+lName);
                    window.location.href = 'SE.php';
                  }else{
                    alert('Email exists in the database.');
                  }


            }else{
                alert("Passwords do not match!")
            }
            
        } else {
            alert("Please fill out required information.");
        }
    });

});
