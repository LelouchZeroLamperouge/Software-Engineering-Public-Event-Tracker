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
    
    // Check if an event ID is provided to fetch its details
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
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<!--Home page for user if not in creator mode here they will see all events nearby-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <link rel="stylesheet" href="bootstrap-2.css">
    <script src="https://api.tomtom.com/maps-sdk-for-web/6.x/6.14.0/maps/maps-web.min.js"></script>

    <style>
    #map {
        height: 1000px;
        width: 100%;
        position: relative;
    }
    </style>

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
                    <a href="ESManageer.php">Creator Mode</a>
                    <a href="ESMyEvents.php">My Events</a>
                    <a href="Confirm_Logout.php">Logout</a>
                </div>
            </div>
        </div>

    </header>
    <main class="box2">
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="ES.php">Home
                                <span class="visually-hidden">(current)</span>
                            </a>
                        <li class="nav-item">
                            <a class="nav-link" href="ESDetails.php">Details</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="search" id="SearchBar" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="Search">Search</button>
                    </form>
                </div>
            </div>
        </nav>


        <div id="map"></div>
        <script>
        var apiKey = '<?php echo $apiKey ?>';
        var lon = parseFloat('<?php echo $longitude ?>');
        var lat = parseFloat('<?php echo $latitude ?>');
        var map = tt.map({
            key: apiKey,
            container: 'map',
            style: 'https://api.tomtom.com/map/1/style/20.0.0-8/basic_main.json?keys=' + apiKey,
            center: [lon, lat],
            zoom: 20
        });

        map.addControl(new tt.NavigationControl());

        new tt.Marker().setLngLat([lon, lat]).addTo(map);
        </script>
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
    <script src="https://unpkg.com/vue@3">
    </script>
    <script src="ES.js"></script>
</footer>

</html>