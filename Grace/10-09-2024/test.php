<?php
include_once("config.php");
        $password = "UA123!";
        $email = "gcarma00@uafs.edu";
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

                    if (password_verify($password,$encrypted))
                    {
                        $_SESSION['user_id'] = $user_id;
                        header("Location: ES.php");
                        echo "Sucess!";
                    }
                }
            }
            else
            {
                echo "No users found.";
                header("Location: SE.php");
            }
        }
    





?>
!DOCTYPE html>
<html lang="en">
<!--Login page for users here they will log in if information is correct they'll be sent to ES.php. If create is clicked they'll be redirected to Create.php first-->
<head class="form-group">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <link rel="stylesheet" href="bootstrap-2.css">
</head>
<body>
<form method="POST" action="">
                
    
                <label for="exampleInputEmail1" class="form-label mt-4">Email address:</label>
                <input type="email" class="form-control-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <span>*</span>
                <br>
                <label for="password" class="col-form-label mt-4" type="form-label">Password:</label>
                <input type="password" class="form-control-2" id="floatingPassword" placeholder="Password" autocomplete="off" name="pass">
                <span>*</span>
                <br>
                <button  type="button" class="btn btn-link" id="loginBtn">Login</button>
                </form>
    </body>