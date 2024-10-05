<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head class="form-group">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <link rel="stylesheet" href="bootstrap-2.css">
</head>
<body class="form-group">
    <header>
        <img class=".img1" src="2.png">
        <h1>Welcome to EventHub</h1>
    </header>
    <main>
        
        <div class="box1">
            <fieldset>
                <legend> Create Account </legend>
                
                <label class="col-form-label mt-4" for="inputDefault">First Name:</label>
                <input type="text" class="form-control-2" placeholder="Name" id="fName">
                <span>*</span>
                <br>

                <label class="col-form-label mt-4" for="inputDefault">Last Name:</label>
                <input type="text" class="form-control-2" placeholder="Name" id="lName">
                <span>*</span>
                <br>

                <label for="exampleInputEmail1" class="form-label mt-4">Email address:</label>
                <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <span>*</span>
                <br>
                <label for="password" type="form-label">Password:</label>
                <input type="password" id="floatingPassword" placeholder="Password" autocomplete="off">
                <span>*</span>
                <br>
                <label for="password" type="form-label">Confirm Password:</label>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" autocomplete="off">
                <span>*</span>
                <br>
                
                <label for="Organization">Are You an Organization?</label>
                <select name="Organization" s id="Org">
                    <option value="yOrg">Yes</option>>
                    <option value="nOrg">No</option> 
                </select>
                <span>*</span>
                <br>

                <label for="Admin">Are You an Admin?</label>
                <select name="Admin" s id="Admin">
                    <option value="yAdmin">Yes</option>>
                    <option value="nAdmin">No</option> 
                </select>
                <span>*</span>
                <br>

                <label for="Notif">Do You Want to Receive Notifications?</label>
                <select name="Notif" s id="Notif">
                    <option value="yNotif">Yes</option>>
                    <option value="nNotif">No</option> 
                </select>
                <span>*</span>
                <br>
                
            </fieldset>
            <button type="button" class="btn btn-link" id="createBtn">Create Account</button>
            <br>
        </div>
    </main>

    
</body>
<footer class="form-group">
    <div>
        <em>&copy; 2024 EventHub </br></em>
        <em> CS 4003 Software Engineering</em>
    </div>
    <script>
        let today = new Date();
        document.write(today.toDateString());
        document.write('<br>');
        document.write(today.toTimeString());
    </script>
    <script src="https://unpkg.com/vue@3">
    </script>
    <script src="Create.js"></script>
</footer>
    
</html>
