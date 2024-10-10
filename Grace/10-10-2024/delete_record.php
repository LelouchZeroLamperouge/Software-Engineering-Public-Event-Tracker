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
    // Get updated values from the form
    
    

    // Update the event in the database
    $sql = "DELETE FROM EVENTS WHERE EVENT_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "<p class='success'>Event updated successfully.</p>";
        header("Location: ESManage.php"); // Redirect after successful update
        exit();
    } else {
        echo "<p class='error'>Error updating event: " . $mysqli->error . "</p>";
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
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="search" id="SearchBar" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="Search">Search</button>
                    </form>
                </div>
            </nav>
        </div>

        <div class="box3">
            <fieldset>
                <legend> Are you sure you want to Delete this event? </legend>

                <!-- Form to update the event -->
                <form method="POST" action="">
                    <button type="submit" class="btn btn-link" id="updateBtn">Delete Event</button>
                </form>
            </fieldset>
        </div>
    </main>

</body>

<footer>
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
