<?php
    include_once("config.php");

    session_start();
    if (isset($_SESSION['user_id']))
    {
      $user_id = $_SESSION['user_id'];
    }
    else
    {
      header("Location: SE.php");
      exit();
    }
    
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){


        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        if (empty($pass) && empty($email)){
            echo "No changes";
        }else{
            if(empty($pass)){

                $sql = "SELECT * FROM USERS WHERE EMAIL = ?"; 
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("s", $email);
        
                $stmt->execute();
        
                $result = $stmt->get_result();
        
        
                if ($result->num_rows === 0) {

                $stmt = $mysqli->prepare("UPDATE USERS SET EMAIL = ? WHERE USER_ID = ?");
                $stmt->bind_param("si",$email,$user_id);
                $stmt->execute();
                }else{
                    echo "Email already exists";
                }

            }else{
                if(empty($email)){
                    $stmt = $mysqli->prepare("UPDATE USERS SET PASSWORD = ? WHERE USER_ID = ?");
                    $stmt->bind_param("si",$hashed,$user_id);
                    $stmt->execute();
    
                }else{
                    $sql = "SELECT * FROM USERS WHERE EMAIL = ?"; 
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $email);
            
                    $stmt->execute();
            
                    $result = $stmt->get_result();
            
            
                    if ($result->num_rows === 0) {
                        $stmt = $mysqli->prepare("UPDATE USERS SET EMAIL = ? WHERE USER_ID = ?");
                        $stmt->bind_param("si",$email,$user_id);
                        $stmt->execute();
                    }else{
                        echo "Email already exists";
                    }

                    $stmt = $mysqli->prepare("UPDATE USERS SET PASSWORD = ? WHERE USER_ID = ?");
                    $stmt->bind_param("si",$hashed,$user_id);
                    $stmt->execute();
    

                }

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
    <header class=".center">
        <img src="2.png"> 
        <h1> Update information </h1> 
        <div class="topBtn"> 
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" > Account</button>
            <div class="dropdown-content">
                <a href="ESManageer.php">Creator Mode</a>
                <a href="https://example.com">My Events</a>
                <a href="Confirm_Logout.php">Logout</a>
            </div>
           </div>
        </div>
        
    </header>
        


    </header>
    <main>
        
        <div class="box1">
            <fieldset>
                <legend> Update information </legend>

                <form method="POST" action="">
    
                    <label for="exampleInputEmail1" class="form-label mt-4">Update Email Address:</label>
                    <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <span>*</span>
                    <br>
                    <label for="password" type="form-label">Update Password:</label>
                    <input type="password" id="floatingPassword" placeholder="Password" autocomplete="off" name="pass">
                    <span>*</span>
                    <br>
                    <button type="submit" class="btn btn-link" id="rButton">Save Changes</button>
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
