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

    

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Changing the user's email and password
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
        
                if ($result->num_rows === 0)
                {
                  $stmt = $mysqli->prepare("UPDATE USERS SET EMAIL = ? WHERE USER_ID = ?");
                  $stmt->bind_param("si",$email,$user_id);
                  $stmt->execute();
                }else
                {
                  echo "Email already exists";
                }

            }else{
                if(empty($email))
                {
                    $stmt = $mysqli->prepare("UPDATE USERS SET PASSWORD = ? WHERE USER_ID = ?");
                    $stmt->bind_param("si",$hashed,$user_id);
                    $stmt->execute();
    
                }else
                {
                    $sql = "SELECT * FROM USERS WHERE EMAIL = ?"; 
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $email);            
                    $stmt->execute();            
                    $result = $stmt->get_result();            
            
                    if ($result->num_rows === 0)
                    {
                        $stmt = $mysqli->prepare("UPDATE USERS SET EMAIL = ? WHERE USER_ID = ?");
                        $stmt->bind_param("si",$email,$user_id);
                        $stmt->execute();
                    }else
                    {
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
        <div class="topBtn" style="padding-top: 1%;"> 
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" > Account</button>
            <div class="dropdown-content">
                <a href="ESManageer.php">Creator Mode</a>
                <a href="ESMyEvents.php">My Events</a>
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
                    <div class="botBtn1" >
                      <button type="submit" class="btn btn-primary" id="rButton">Save Changes</button>
                      <br>
                    </div>

                </form>
            </fieldset>
            
        </div>
    </main>

    
</body>
<footer id="vue-footer">
  <div style="text-align:center;">
      <em>&copy; 2024 EventHub </br></em>
      <em> CS 4003 Software Engineering</em>
      <p>{{currentDate}}   {{currentTime}}</p>
      
  </div>
  <script src="ES.js"></script>
</footer>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
const app = Vue.createApp({
  data() {
    return {
      currentDate: '',  // Store the date string
      currentTime: ''   // Store the time string
    };
  },
  mounted() {
    // Update date and time when the component is mounted
    this.updateDateTime();
    // Set interval to update time every second
    setInterval(this.updateDateTime, 1000);
  },
  methods: {
    // Method to get the current date and time
    updateDateTime() {
      const now = new Date();
      this.currentDate = now.toLocaleDateString(); // e.g., "10/16/2024"
      this.currentTime = now.toLocaleTimeString(); // e.g., "9:45:12 PM"
    }
  }
});

app.mount('#vue-footer'); // Mount the Vue app
</script>
    
</html>
