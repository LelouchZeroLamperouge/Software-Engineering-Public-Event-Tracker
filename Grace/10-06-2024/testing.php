<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form Example</title>
</head>
<body>

    <h1>Event Submission</h1>

    <!-- Form that submits to the same page -->
    <form method="POST" action="">
        <label for="event_name">Event Name:</label>
        <input type="text" name="event_name" id="event_name" placeholder="Enter event name" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    // Check if the form has been submitted
    include_once("config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize the input
        $eventName = htmlspecialchars($_POST['event_name']);
        
        // Output the submitted event name
        echo "<h2>Submitted Event Name: " . $eventName . "</h2>";

        $stmt = $mysqli->prepare("INSERT INTO EVENTS (EVENT_NAME,EVENT_DESCR,STREET_ADD,CITY,ZIPCODE,CREATOR,CATEGORY,DATETIME,WEBSITE) VALUES (?,?,?,?,?,?,?,?,?)");
        $event_name = "Birthday Party";
        $event_descr = "BDay party for great-grandma";
        $street_add = "505 willow lane";
        $city = "Fort Smith";
        $zipcode = 72958;
        $creator = 1;
        $category = 1;
        $when = "2024-09-30 15:30:00";
        $website = "www.google.com";
        $stmt->bind_param("sssssiiss",$event_name,$event_descr,$street_add,$city,$zipcode,$creator,$category, $when,$website);
        $stmt->execute();
    }
    ?>

</body>
</html>
