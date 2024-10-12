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
    $descr = $_POST['event_descr'];
    $street = $_POST['event_street'];
    $city = $_POST['event_city'];
    $zip = $_POST['event_zip'];
    $date = $_POST['event_date'];
    $website = $_POST['website'];

    // Update the event in the database
    $sql = "UPDATE EVENTS SET EVENT_DESCR = ?, STREET_ADD = ?, CITY = ?, ZIPCODE = ?, DATETIME = ?, WEBSITE = ? WHERE EVENT_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssssssi', $descr, $street, $city, $zip, $date, $website, $id);

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
                <legend> Update Event </legend>

                <!-- Form to update the event -->
                <form method="POST" action="">
                    <label class="col-form-label mt-4" for="inputDefault">Event Description:</label>
                    <input type="text" class="form-control-2" placeholder="Description" id="Desc" name="event_descr" value="<?php echo $record['EVENT_DESCR']; ?>" required>
                    <span>*</span><br>

                    <label class="col-form-label mt-4" for="inputDefault">Street Address:</label>
                    <input type="text" class="form-control-2" placeholder="Street" id="strtAdd" name="event_street" value="<?php echo $record['STREET_ADD']; ?>" required>
                    <span>*</span><br>

                    <label class="col-form-label mt-4" for="inputDefault">City:</label>
                    <input type="text" class="form-control-2" placeholder="City" id="city" name="event_city" value="<?php echo $record['CITY']; ?>" required>
                    <span>*</span><br>

                    <label class="col-form-label mt-4" for="inputDefault">Zip Code:</label>
                    <input type="text" class="form-control-2" placeholder="Zip" id="zip" name="event_zip" value="<?php echo $record['ZIPCODE']; ?>" required>
                    <span>*</span><br>

                    <label class="col-form-label mt-4" for="inputDefault">Event Date:</label>
                    <input type="text" class="form-control-2" placeholder="DoW Time" id="Date" name="event_date" value="<?php echo $record['DATETIME']; ?>" required>
                    <span>*</span><br>

                    <label class="col-form-label mt-4" for="inputDefault">Website:</label>
                    <input type="text" class="form-control-2" placeholder="Website" id="Date" name="website" value="<?php echo $record['WEBSITE']; ?>"><br>

                    <button type="submit" class="btn btn-link" id="updateBtn">Update Event</button>
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

