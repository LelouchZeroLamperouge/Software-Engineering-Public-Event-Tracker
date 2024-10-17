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

# Will display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<!--Home page for user if not in creator mode here they will see all events nearby-->

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
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ESManageer.php">Home</a>
                    <li class="nav-item">
                        <a class="nav-link" href="ESCreate.php">Create
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ESManage.php">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="FilterLocationManager.php">Filter by Location</a>
                        <span class="visually-hidden">(current)</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="FilterCategoryManager.php">Filter by Category</a>
                       
                    </li>
                    <li class="nav-item">
                            <a class="nav-link " href="FilterDateManager.php">Filter by Date</a>
                            
                        </li>
                </ul>
               
            </div>
            </div>
        </nav>
        <table class="table table-hover" id="ET">
            <thead>
                <tr class="table-active">
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Location</th>
                    <th scope="col">Event Time</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>

                <!-- Form -->
                <form method="POST" action="">

                    <label class="col-form-label mt-4" for="inputDefault">Current Address:</label>
                    <input type="text" class="form-control-2" placeholder="Current Address" id="address" name="address">
                    <span>*</span>
                    <br>

                    <label class="col-form-label mt-4" for="inputDefault">Mile Radius:</label>
                    <input type="number" class="form-control-2" placeholder="Mile Radius" id="radius" name="radius">
                    <span>*</span>
                    <br>
                    <div class="botBtn1">
                        <br>
                        <button type="submit" class = "btn btn-primary" id="address">Filter</button>
                    </div>
                </form>

                <?php
               
                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {    
                    $address = $_POST['address'];
                    $radius = $_POST['radius'];

                    $apiKey = "CR638URQ0VGqkceCO0a4fDSAk9Xe0hwv";
                    $origin = urlencode($address);

                    $url = "https://api.tomtom.com/search/2/geocode/%7B$origin%7D.json?key={$apiKey}";

                    $reply = file_get_contents($url);

                    $info = json_decode($reply);
                        
                    if (empty($info->results))
                    {
                        return null;
                    }
                    else
                    {
                        $latOrig = $info->results[0]->position->lat;
                        $longOrig = $info->results[0]->position->lon;
                    }


                    $stmt = $mysqli->prepare("SELECT * FROM EVENTS");
                    $stmt->execute();
                    $result = $stmt->get_result();            
            
                    while ($row = $result->fetch_assoc())
                    {

                        $destination = $row['STREET_ADD'] . " " . $row['CITY'] . ", AR " . $row['ZIPCODE'];
                        $formatted = urlencode($destination);
                        $url = "https://api.tomtom.com/search/2/geocode/%7B$formatted%7D.json?key={$apiKey}";

                        $reply = file_get_contents($url);

                        $info = json_decode($reply);
                        
                        if (empty($info->results))
                        {
                            return null;
                        }
                        else
                        {
                            $latDest = $info->results[0]->position->lat;
                            $longDest = $info->results[0]->position->lon;
                        }

                        // Earth’s radius in miles
                        $earthRadius = 3959;

                        // Convert degrees to radians
                        $latFrom = deg2rad($latOrig);
                        $lonFrom = deg2rad($longOrig);
                        $latTo = deg2rad($latDest);
                        $lonTo = deg2rad($longDest);

                        // Haversine formula
                        $latDelta = $latTo - $latFrom;
                        $lonDelta = $lonTo - $lonFrom;

                        $a = sin($latDelta / 2) * sin($latDelta / 2) + cos($latFrom) * cos($latTo) * sin($lonDelta / 2) * sin($lonDelta / 2);
                        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

                        $distance = $earthRadius * $c;

                        if ($distance <= $radius)
                        {   
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['EVENT_NAME']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['STREET_ADD']) . ", " . htmlspecialchars($row['CITY']) . ", AR " . htmlspecialchars($row['ZIPCODE']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['DATETIME']) . "</td>";
                            echo "<td>" . $distance . " miles away" . "</td>";
                            echo "</tr>";
                        }
                }
            }
                ?>
            </tbody>
        </table>

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