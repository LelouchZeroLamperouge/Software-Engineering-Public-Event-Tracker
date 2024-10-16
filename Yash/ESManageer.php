<?php
include_once("config.php");
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
            <button class="btn btn-primary dropdown-toggle" > Account</button>
            <div class="dropdown-content">
                <a href="Create.php">My Profile</a>
                <a href="ES.php">Customer Mode</a>
                <a href="https://example.com">My Events</a>
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
                    <a class="nav-link active" href="ESManageer.php">Home
                      <span class="visually-hidden">(current)</span>
                    </a>
                    <li class = "nav-item">
                    <a class="nav-link" href="ESCreate.php">Create
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ESManage.php">Manage</a>
                    </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-sm-2" type="search" id="SearchBar" placeholder="Search">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="Search">Search</button>
                </form>
            </div>
          </nav>
          <div class="row">            
                <?php
               
                $stmt = $mysqli->prepare("SELECT * FROM EVENTS");

		$stmt->execute();
		$result = $stmt->get_result();

       
// Array mapping categories to image URLs
$category_images = array(
    "sport" => "sports.png",
    "gaming" => "gaming.png",
    "movies" => "movies.png",
    "music" => "music.png",
    "meetup" => "meetup.png",
    "studying" => "studying.png",
    "pets" => "pets.png",
    "dancing" => "dancing.png",
    "reading" => "reading.png",
    "cosplay" => "cosplay.png",
    "sewing" => "sewing.png",
    "hiking" => "hiking.png",
    "quilting" => "quilting.png",
    "tableTop" => "tabletop.png",
    "cardGame" => "cardgame.png"
);

// Check if the category has an associated image


        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4 mb-3">'; // "mb-3" adds margin-bottom for spacing between cards
            echo '<div class="card">';
            echo '<h3 class="card-header">Event</h3>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['EVENT_NAME']) . '</h5>';
            echo '</div>'; // Closing the card-body div correctly
            $cat_id = $row['CATEGORY'];
            $testing = "SELECT CATEGORY_NAME FROM CATEGORIES WHERE CATEGORY_ID = ?";
            $wassup = $mysqli->prepare($testing);
            $wassup->bind_param('i', $cat_id);
            $wassup->execute();
            $yippee = $wassup->get_result();
            while ($uwu = $yippee->fetch_assoc())
            {
                $category = $uwu['CATEGORY_NAME'];
            }
            if (array_key_exists($category, $category_images)) {
                $image_url = $category_images[$category];
            } else {
                $image_url = "path/to/default_image.jpg";
            }
            echo '<img src="' . htmlspecialchars($image_url) . '"  class="card-img-top" alt="' . htmlspecialchars($event_category) . '">';
            echo '<div class="card-body">';
            echo '<p class="card-text" style="display: inline-block; white-space: normal; word-wrap: break-word;">' . htmlspecialchars($row['EVENT_DESCR']) . '</p>';
            echo '</div>';
            echo '<div class="card">';
            echo '<ul class="list-group list-group-flush">';
            echo '<div class="textAlign">';
            echo '<li class="list-group-item textAlign"> Street: ' . htmlspecialchars($row['STREET_ADD']) . '</li>';
            echo '<li class="list-group-item textAlign"> Date: ' . htmlspecialchars($row['DATETIME']) . '</li>';
            echo '<li class="list-group-item textAlign"> Zip: ' . htmlspecialchars($row['ZIPCODE']) . '</li>';
            echo '</div>';
            echo '</ul>';
            echo '<form action="save_RSVP.php" method="POST">
                    <input type="hidden" name="event_id" value="' . $row["EVENT_ID"] . '">
                    <input type="hidden" name="user_id" value="' . $user_id . '">
                    <div style="display: flex; align-items: center;">
                        <label>
                        <input type="radio" name="rsvp" value="3"> Going
                        </label>
                        <label style="margin-left: 5%;">
                        <input type="radio" name="rsvp" value="1"> Not Going
                        </label>
                        <label style="margin-left: 5%;">
                        <input type="radio" name="rsvp" value="2"> Interested
                        </label>
                        <button type="submit" class="btn btn-primary" style="margin-left: 5%;">Submit</button>
                    </div>
                    </form>';
            echo '</div>'; // Closing the card div
            echo '</div>';
            echo '<div class="card-footer">';
            echo '</div>';
            echo '</div>'; // Closing the col-lg-4 div
        }
                ?>
                </div>
                </div>
                

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
