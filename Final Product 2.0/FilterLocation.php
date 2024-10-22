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
        <div class="topBtn" style="padding-top: 1%;">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle"> Account</button>
                <div class="dropdown-content">
                    <a href="userSettings.php">My Profile</a>
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
            <img style="width: 4%; height: 4%; margin-left: 0%;" src="2.png">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="ES.php">Home
                            </a>
                        <li class="nav-item">
                            <a class="nav-link active" href="FilterLocation.php">Filter by Location</a>
                            <span class="visually-hidden">(current)</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FilterCategory.php">Filter by Category</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="FilterDate.php">Filter by Date</a>
                            
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
                    <th scope="col">Distance</th>
                    <th scope="col"></th>
                    
                    
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
                        // Earth’s radius in miles
                        $earthRadius = 3959;

                        // Convert degrees to radians
                        $latFrom = deg2rad($latOrig);
                        $lonFrom = deg2rad($longOrig);
                        $latTo = deg2rad($row['LATITUDE']);
                        $lonTo = deg2rad($row['LONGITUDE']);

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
                            $date = new DateTime(($row['DATETIME']));
                            echo '<td> ' . $date->format('m-d-y H:i A') . '</td>';
                            echo "<td>" . $distance . " miles away" . "</td>";
                            echo '<td>
                            <form action="save_RSVP.php" method="POST">
                    <input type="hidden" name="event_id" value="' . $row["EVENT_ID"] . '">
                    <input type="hidden" name="user_id" value="' . $user_id . '">
                    
                    <div style="display: flex; align-items: center;">
                       
                        <input type="radio"  name="rsvp" value="3"> Going
                        
                        <input type="radio" style = "margin-left:5%" name="rsvp" value="1"> Not Going
                        
                        <input type="radio" style = "margin-left:5%" name="rsvp" value="2"> Interested
                        
                        <button type="submit" class="btn btn-primary" style = "margin-left:10%" ">Submit</button>
                        </form>
                    </td>
                    </tr>
                    </div>';
                        }
                }
            }
                ?>
            </tbody>
        </table>

    </main>

</body>
<footer id="vue-footer">
  <div style="text-align:center;">
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