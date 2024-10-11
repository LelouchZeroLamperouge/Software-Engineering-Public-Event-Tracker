<?php
    include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<!--Login page for users here they will log in if information is correct they'll be sent to ES.php. If create is clicked they'll be redirected to Create.php first-->
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
                <legend> Login</legend>
    
                <label for="exampleInputEmail1" class="form-label mt-4">Email address:</label>
                <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <span>*</span>
                <br>
                <label for="password" type="form-label">Password:</label>
                <input type="password" id="floatingPassword" placeholder="Password" autocomplete="off">
                <span>*</span>
                <br>
                
                
            </fieldset>
            <button type="button" class="btn btn-link" id="createBtn">Create Account</button>
            <button  type="button" class="btn btn-link" id="loginBtn">Login</button>
            <button  type="button" class="btn btn-link" id="fButton">Forgot Password</button>
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
    <script src="SE.js"></script>
</footer>
    
</html>
