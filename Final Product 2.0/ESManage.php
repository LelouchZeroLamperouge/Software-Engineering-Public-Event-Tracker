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
<!-- Tab for managing events in creator mode here you can see all events you've made and edit them.-->
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
          <button class="btn btn-primary dropdown-toggle" > Account</button>
          <div class="dropdown-content">
              <a href="userSettings.php">My Profile</a>
              <a href="ES.php">Customer Mode</a>
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
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ESManageer.php">Home</a>
                        
                        <li class = "nav-item">
                        <a class="nav-link" href="ESCreate.php">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ESManage.php">Manage
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FilterLocationManager.php">Filter by Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FilterCategoryManager.php">Filter by Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FilterDateManager.php">Filter by Date</a>
                        </li>
                </ul>
               
            </div>
          </nav>
          <table class="table table-hover" id="ET">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Event Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  // Querying for events created by user
                  $sql = "SELECT EVENT_ID, EVENT_NAME, EVENT_DESCR FROM EVENTS WHERE CREATOR = ? ";
                  $query = $mysqli->prepare($sql);

                  $query->bind_param("i",$user_id);
                  $query->execute();
                  $data = $query->get_result();

                  if ($data->num_rows > 0) {
                      while ($row = $data->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($row['EVENT_NAME']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['EVENT_DESCR']) . "</td>";
                          echo "<td>  <a href='edit_record.php?id=" . $row['EVENT_ID'] . "' class='btn btn-primary'>Edit</a> </td>";
                          echo "<td>  <a href='delete_record.php?id=" . $row['EVENT_ID'] . "' class='btn btn-primary'>Delete</a> </td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='3'>No events found.</td></tr>";
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

