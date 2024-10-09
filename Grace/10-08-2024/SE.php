<?php
    include_once("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        # NEED TO PUT CODE HERE THAT VERIFIES USERNAME AND PASSWORD IS CORRECT.
        # IF IT IS CORRECT, DO THE FOLLOWING CODE!

        session_start();
        $email = $_POST['email'];
        $sql = "SELECT USER_ID FROM USERS WHERE EMAIL = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['USER_ID'];
            }
        } else {
            echo "No users found.";
            header("Location: SE.php");
        }

        $_SESSION['user_id'] = $user_id;
        header("Location: ESDetails.php");
    }
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

            <!--Form to login-->
                <form method="POST" action="">
                <legend> Login</legend>
    
                <label for="exampleInputEmail1" class="form-label mt-4">Email address:</label>
                <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <span>*</span>
                <br>
                <label for="password" type="form-label">Password:</label>
                <input type="password" id="floatingPassword" placeholder="Password" autocomplete="off" name="password">
                <span>*</span>
                <br>
                <button  type="button" class="btn btn-link" id="loginBtn">Login</button>
                </form>
                
                
            </fieldset>
            <button type="button" class="btn btn-link" id="createBtn">Create Account</button>
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
