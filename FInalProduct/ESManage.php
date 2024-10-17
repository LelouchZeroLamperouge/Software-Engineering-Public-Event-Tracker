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

$currentDate = date('Y-m-d H:i:s');
$sql = "SELECT * FROM EVENTS WHERE DATE(DATETIME) < DATE(2024-10-15)";
$stmt = $mysqli->prepare($sql);
//$stmt->bind_param('s', $currentDate);

if ($stmt->execute())
{
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc())
  {
    $delete = "DELETE FROM EVENT_STATUS WHERE EVENT_ID = ?";
    $id = $row['EVENT_ID'];
    $cool = $mysqli->prepare($delete);
    $cool->bind_param('i', $id);

    $deleteRecord = "DELETE FROM EVENTS WHERE EVENT_ID = ?";
    $wassup = $mysqli->prepare($deleteRecord);
    $wassup->bind_param('i', $id);
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
              <a class="navbar-brand" href="#">Navbar</a>
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
                <form class="d-flex">
                  <input class="form-control me-sm-2" type="search" id="SearchBar" placeholder="Search">
                  <button class="btn btn-secondary my-2 my-sm-0" id="Search">Search</button>
                </form>
            </div>
          </nav>
          <table class="table table-hover" id="ET">
                <thead>
                  <tr class="table-active">
                    <th scope="col">Event Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
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
                        echo "<td>  <a href='edit_record.php?id=" . $row['EVENT_ID'] . "' class='btn btn-warning'>Edit</a> </td>";
                        echo "<td>  <a href='delete_record.php?id=" . $row['EVENT_ID'] . "' class='btn btn-warning'>Delete</a> </td>";
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
  <script src="ESManage.js"></script>
</footer>

