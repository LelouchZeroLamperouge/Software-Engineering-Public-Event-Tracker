<?php

include_once("config.php");

// Will display errors to the webpage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM EVENTS WHERE EVENT_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
    } else {
        echo "<p class='error'>Record not found.</p>";
        exit();
    }
} else {
    echo "<p class='error'>No ID provided.</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get updated values from the form
    $descr = $_POST['descr'];
    $street = $_POST['street'];

    // Update the record in the database
    $sql = "UPDATE EVENTS SET EVENT_DESCR = ?, STREET_ADD = ? WHERE EVENT_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sss', $descr, $street, $id);

    if ($stmt->execute()) {
        echo "<p class='success'>Record updated successfully.</p>";
        header("Location: ESManage.php"); // Redirect after update
        exit();
    } else {
        echo "<p class='error'>Error updating record: " . $mysqli->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Tab for managing events in creator mode here you can see all events you've made and edit them.-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <link rel="stylesheet" href="bootstrap-2.css">
</head>
<body>
    <header class=".center">
        <img src="2.png"> 
      <h1> Event Listings </h1> 
      <div class="topBtn"> 
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" > Account</button>
          <div class="dropdown-content">
              <a href="Create.php">My Profile</a>
              <a href="ES.php">Customer Mode</a>
              <a href="https://example.com">My Events</a>
              <a href="SE.php">Logout</a>
          </div>
         </div>
      </div>
    </header>
<body>

<div class="box2">
    <h2>Edit Record</h2>

    <!-- Display the record's current data in a form for editing -->
    <form method="POST" action="">
        <div>
            <label for="descr">Descr:</label>
            <input type="text" id="descr" name="descr" required>
        </div>

        <div>
            <label for="street">Street:</label>
            <textarea id="street" name="street" rows="5" required></textarea>
        </div>

        <input type="submit" value="Update Record">
    </form>

    <!-- Link to go back to the management page -->
    <a href="ESManage.php" class="back-link">Back to Records List</a>
</div>

</body>
</html>