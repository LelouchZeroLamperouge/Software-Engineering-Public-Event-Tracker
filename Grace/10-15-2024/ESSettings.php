<?php
include_once("config.php");

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: SE.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $theme = $_POST['theme'];

    // Store theme choice in the session (or database if you prefer)
    $_SESSION['theme'] = $theme;

    header("Location: ES.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- PHP for the user creation page will send itself back to login page if account was created-->
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

        <div class="topBtn"> 
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" > Account</button>
              <div class="dropdown-content">
                  <a href="Create.php">My Profile</a>
                  <a href="ESManageer.php">Creator Mode</a>
                  <a href="https://example.com">My Events</a>
                  <a href="SE.php">Logout</a>
              </div>
             </div>
          </div>
    </header>
    <main>
        
        <div class="box11">
            <fieldset>
                <legend> Settings </legend>
                	<form method="POST" action="">
				<label for="theme">Choose a theme:</label>
				<select name="theme" id="theme">
				    <option value="light">Light Theme</option>
				    <option value="dark">Dark Theme</option>
				</select>
				<button type="submit">Save</button>
			</form>
            </fieldset>
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
</footer>
    
</html>

