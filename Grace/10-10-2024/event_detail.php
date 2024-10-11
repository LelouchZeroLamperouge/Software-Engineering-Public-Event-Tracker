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

    $address = $record['STREET_ADD'] . " " . $record['CITY'] . ", AR " . $record['ZIPCODE'];

    $apiKey = "CR638URQ0VGqkceCO0a4fDSAk9Xe0hwv";
    $formatted = urlencode($address);

    $url = "https://api.tomtom.com/search/2/geocode/%7B$formatted%7D.json?key={$apiKey}";

    $reply = file_get_contents($url);

    $info = json_decode($reply);
    
    if (empty($info->results))
    {
        return null;
    }
    else
    {
        $latitude = $info->results[0]->position->lat;
        $longitude = $info->results[0]->position->lon;
        echo $longitude . "\n";
        echo $latitude . "\n";
    }



?>