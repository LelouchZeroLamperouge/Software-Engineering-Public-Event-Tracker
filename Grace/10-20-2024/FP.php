<?php
    include_once("config.php");
    
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = $_POST['email'];
            
        // Querying for users that have the email entered
        $sql = "SELECT * FROM USERS WHERE EMAIL = ?"; 
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            // Assigning the new password
            $pass = $_POST['pass'];
            $hashed = password_hash($pass, PASSWORD_DEFAULT);   // Hashing the password
            $cPass = $_POST['cPass'];

            if (empty($pass)|| empty($email)){
                echo "One or more of the values is empty";
            } else{
                if($pass === $cPass){
                    $stmt = $mysqli->prepare("UPDATE USERS SET PASSWORD = ? WHERE EMAIL = ?");
                    $stmt->bind_param("ss",$hashed,$email);
                    $stmt->execute();

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

                }}       
        
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
                    <button type="submit" class = "btn btn-primary" id="rButton">Reset Button</button>
                    <br>

                </form>
            </fieldset>
            
        </div>
    </main>

    
</body>
<footer id="vue-footer">
  <div>
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
