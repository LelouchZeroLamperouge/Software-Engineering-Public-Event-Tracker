<?php
include_once("config.php");
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
    <main class="box2">
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ESManageer.php">Home</a>
                        <li class="nav-item">
                          <a class="nav-link" href="ESDetailsManager.php">Details</a>
                        </li>
                        <li class = "nav-item">
                        <a class="nav-link" href="ESCreate.php">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ESManage.php">Manage
                                <span class="visually-hidden">(current)</span>
                            </a>
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
                $sql = "SELECT EVENT_ID, EVENT_NAME, EVENT_DESCR FROM EVENTS";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
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

