<?php
include_once("config.php");

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if an event ID is provided
if (isset($_POST['event_id']) && isset($_POST['user_id'])) {
     $event_id = (int)$_POST['event_id'];
     $user_id = (int)$_POST['user_id'];
} else {
	echo "<p class='error'>No event ID or user ID provided.</p>";
    exit();
}

                
		
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the RSVP status from the form
    $rsvp = (int)$_POST['rsvp'];

    // Check if the entry exists
    $checkSql = "SELECT * FROM EVENT_STATUS WHERE USER_ID = ? AND EVENT_ID = ?";
    $checkStmt = $mysqli->prepare($checkSql);
    $checkStmt->bind_param('ii', $user_id, $event_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Entry exists, perform an update
        $updateSql = "UPDATE EVENT_STATUS SET STATUS_ID = ? WHERE USER_ID = ? AND EVENT_ID = ?";
        $updateStmt = $mysqli->prepare($updateSql);
        $updateStmt->bind_param('iii', $rsvp, $user_id, $event_id);
        if ($updateStmt->execute()) {
            echo "<p class='success'>RSVP successfully updated.</p>";
        } else {
            echo "<p class='error'>Error updating RSVP: " . $mysqli->error . "</p>";
        }
    } else {
        // Entry does not exist, perform an insert
        $insertSql = "INSERT INTO EVENT_STATUS (USER_ID, EVENT_ID, STATUS_ID) VALUES (?, ?, ?)";
        $insertStmt = $mysqli->prepare($insertSql);
        $insertStmt->bind_param('iii', $user_id, $event_id, $rsvp);
        if ($insertStmt->execute()) {
            echo "<p class='success'>RSVP successfully submitted.</p>";
        } else {
            echo "<p class='error'>Error inserting RSVP: " . $mysqli->error . "</p>";
        }
    }
    
    // Redirect after successful submission or update
    header("Location: ES.php");
    exit();
}
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event - EventHub</title>
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
                    <a href="Create.html">My Profile</a>
                    <a href="ES.html">Customer Mode</a>
                    <a href="https://example.com">My Events</a>
                    <a href="SE.html">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="box2">
            <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="ESManageer.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ESDetailsManager.php">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ESCreate.php">Create
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ESManage.php">Manage</a>
                        </li>
                    </ul>
                   
                </div>
            </nav>
        </div>

        <div class="box3">
            <fieldset>
                <legend> Save Event?</legend>

                <!-- Form to update the event -->
                <form method="POST" action="">
                    <button type="submit" class="btn btn-link" id="updateBtn">Submit</button>
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
