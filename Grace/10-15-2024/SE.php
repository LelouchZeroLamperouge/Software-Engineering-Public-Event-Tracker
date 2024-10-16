<?php
    include_once("config.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $query = $mysqli->prepare('SELECT USER_ID, PASSWORD FROM USERS WHERE EMAIL = ?');

        if ($query)
        {
            $query->bind_param("s",$email);
            $query->execute();
            $data = $query->get_result();
            if ($data->num_rows > 0)
            {
                while ($row = $data->fetch_assoc()) {
                    $encrypted = $row['PASSWORD'];
                    $user_id = $row['USER_ID'];
                }
            }
            else
            {
                header("Location: SE.php");
            }

            if (password_verify($password,$encrypted))
                {
                    session_start();
                    $_SESSION['user_id'] = $user_id;
                    header("Location: ES.php");
                }
        }
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
                <legend> Login</legend>
            <!--Form to login-->
                <form method="POST" action="">
                
    
                <label for="exampleInputEmail1" class="form-label mt-4">Email address:</label>
                <input type="email" class="form-control-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <span>*</span>
                <br>
                <label for="password" class="col-form-label mt-4" type="form-label">Password:</label>
                <input type="password" class="form-control-2" id="floatingPassword" placeholder="Password" autocomplete="off" name="pass">
                <span>*</span>
                <br>
                <div class="botBtn1" >
                    <br>
                <button  type="submit" id="login">Login</button>
                </div>
                </form>  
                
            </fieldset>
            <?php
            echo "<a href='Create.php' class='btn btn-link' id='createBtn'>Create Account</a>";
            echo "<a href='FP.php' class='btn btn-link' id='fButton'>Forgot Password</a>";

            ?>
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
