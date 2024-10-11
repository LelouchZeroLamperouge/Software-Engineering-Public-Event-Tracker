<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<!-- Home page for user if not in creator mode here they will see all events nearby -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <link rel="stylesheet" href="bootstrap-2.css">
</head>
<body>
    <header class=".center">
        <img src="2.png"> 
        <h1>Event Listings</h1> 
        <div class="topBtn"> 
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle">Account</button>
                <div class="dropdown-content">
                    <a href="Create.php">My Profile</a>
                    <a href="ESManageer.php">Creator Mode</a>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="ES.php">Home <span class="visually-hidden">(current)</span></a>
                        </li>
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

        <table class="table table-hover" id="ET">
            <thead>
                <tr class="table-active">
                    <th scope="col">Status</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Location</th>
                    <th scope="col">Event Time</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT EVENT_ID, EVENT_NAME, STREET_ADD, ZIPCODE, DATETIME FROM EVENTS"; // Make sure EVENT_ID is selected in the SQL query
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td>" . htmlspecialchars($row['EVENT_NAME']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['STREET_ADD']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['DATETIME']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ZIPCODE']) . "</td>";
                        echo "<td>
                                <form method='post' action='save_status.php'>
                                    <input type='hidden' name='event_id' value='" . htmlspecialchars($row['EVENT_ID']) . "'>
                                    <select class='col-form-label mt-4' name='event_status' onchange='this.form.submit()'>
                                        <option value='' selected></option>
                                        <option value='Saved'>Saved</option>
                                        <option value='Interested'>Interested</option>                  
                                        <option value='Going'>Going</option> 
                                    </select>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No events found.</td></tr>"; // Adjusted colspan to match the number of columns
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <div>
            <em>&copy; 2024 EventHub</em><br>
            <em>CS 4003 Software Engineering</em>
        </div>
        <script>
            let today = new Date();
            document.write(today.toDateString());
            document.write('<br>');
            document.write(today.toTimeString());
        </script>
        <script src="https://unpkg.com/vue@3"></script>
        <script src="ES.js"></script>
    </footer>
</body>
</html>

