<?php
    include_once("config.php");
    
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = $_POST['email'];

            
        $sql = "SELECT * FROM USERS WHERE EMAIL = ?"; 
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();


        if ($result->num_rows > 0) {

            $pass = $_POST['pass'];
            $hashed = password_hash($pass, PASSWORD_DEFAULT);
            $cPass = $_POST['cPass'];

            if (empty($pass)|| empty($email)){
                echo "One or more of the values is empty";
            } else{
                if($pass === $cPass){
                    $stmt = $mysqli->prepare("UPDATE USERS SET PASSWORD = ? WHERE EMAIL = ?");
                    $stmt->bind_param("ss",$hashed,$email);
                    $stmt->execute();

                }else{
                    echo "Passwords don't match";
                }

            }
        
        } else {
            echo "Email doesn't exists";
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
        
        <div class="box1">
            <fieldset>
                <legend> Change Password</legend>

                <form method="POST" action="">
    
                    <label for="exampleInputEmail1" class="form-label mt-4">Email address:</label>
                    <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <span>*</span>
                    <br>
                    <label for="password" type="form-label">Password:</label>
                    <input type="password" id="floatingPassword" placeholder="Password" autocomplete="off" name="pass">
                    <span>*</span>
                    <br>
                    <label for="password" type="form-label">Confirm Password:</label>
                    <input type="password" id="floatingPassword" placeholder="Confirm Password" autocomplete="off" name="cPass">
                    <span>*</span>
                    <br>
                    <button type="submit" class="btn btn-link" id="rButton">Reset Button</button>
                    <br>

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
        <script src="https://unpkg.com/vue@3">
    </script>
</footer>
    
</html>
