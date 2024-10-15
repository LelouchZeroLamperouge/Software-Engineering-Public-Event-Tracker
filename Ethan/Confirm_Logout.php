<?php
    include_once("config.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
       session_destroy();

       header("Location: SE.php");
       exit();
                
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogOut- EventHub</title>
    <link rel="stylesheet" href="bootstrap-2.css">
</head>

<body>
    <header class=".center">
        <img src="2.png">
        <h1> Event Listings </h1>
        <div class="topBtn">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle"> Account</button>
                <div class="dropdown-content">
                    <a href="userSettings.php">My Profile</a>
                    <a href="ES.php">Customer Mode</a>
                    <a href="https://example.com">My Events</a>
                </div>
            </div>
        </div>
    </header>

    <main>

        <div class="box1">
            <fieldset>
                <legend> Are you sure you want to logout? </legend>

                <!-- Form to update the event -->
                <form method="POST" action="">
                <div class="botBtn1">
                    <button  type="submit" id="logBtn">Logout</button>
                </div>
                </form>
            </fieldset>
        </div>
    </main>

</body>

<footer>
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
</footer>

</html>