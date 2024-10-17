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

// Will display errors to the webpage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if an event ID is provided to fetch its details for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch event details from the database for the provided ID
    $sql = "SELECT * FROM EVENTS WHERE EVENT_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        echo "<p class='error'>Event not found.</p>";
        exit();
    }
} else {
    echo "<p class='error'>No event ID provided.</p>";
    exit();
}

// Handle form submission to update the event
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Deleting the event_status records tied to this event
    $delete = "DELETE FROM EVENT_STATUS WHERE EVENT_ID = ?";
    $cool = $mysqli->prepare($delete);
    $cool->bind_param('i', $id);

    # Deleting the event itself
    if ($cool->execute())
    {
        $sql = "DELETE FROM EVENTS WHERE EVENT_ID = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo "<p class='success'>Event deleted successfully.</p>";
            header("Location: ESManage.php"); // Redirect after successful deletion
            exit();
        }
        else
        {
            echo "<p class='error'>Error deleting event: " . $mysqli->error . "</p>";
        }
    }
    else
    {
        echo "<p class='error'>Error deleting event: " . $mysqli->error . "</p>";
    }
}
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
                    <a href="Create.php">My Profile</a>
                    <a href="ES.php">Customer Mode</a>
                    <a href="https://example.com">My Events</a>
                    <a href="Confirm_Logout.php">Logout</a>
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
                <legend> Are you sure you want to Delete this event? </legend>

                <!-- Form to update the event -->
                <form method="POST" action="">
                    <div class="botBtn1">
                        <button type="submit" class="btn btn-primary" id="updateBtn">Delete Event</button>
                        <br>
                    </div>
                </form>
            </fieldset>
        </div>
    </main>

</body>

<footer id="vue-footer">
    <div>
        <em>&copy; 2024 EventHub </br></em>
        <em> CS 4003 Software Engineering</em>
        <p>{{currentDate}} {{currentTime}}</p>

    </div>
    <script src="ES.js"></script>
</footer>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
const app = Vue.createApp({
    data() {
        return {
            currentDate: '', // Store the date string
            currentTime: '' // Store the time string
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