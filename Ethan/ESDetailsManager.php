<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<!-- Details tab for each event within the database while in creator mode. -->
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
                    <a class="nav-link" href="ESManageer.php">Home </a>
                    <li class="nav-item">
                      <a class="nav-link active" href="ESDetailsManager.php">Details
                        <span class="visually-hidden">(current)</span>
                      </a>
                    </li>
                    <li class = "nav-item">
                        <a class="nav-link" href="ESCreate.php">Create</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="ESManage.php">Manage</a>
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
                    <th scope="col">Zip Code</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-primary">
                    <td>Table Top</td>
                    <td>An active tabletop gaming session in Fort Smith at 9 P.M. on Saturday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Card Game</td>
                    <td>Join an exciting card game in Little Rock at 2 P.M. on Sunday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Table Top</td>
                    <td>An inactive tabletop event scheduled for Fayetteville at 8 P.M. on Friday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Board Game</td>
                    <td>Participate in an engaging board game in Hot Springs at 7 P.M. on Monday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Table Top</td>
                    <td>An inactive tabletop gaming session in Bentonville at 6 P.M. on Wednesday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Card Game</td>
                    <td>Enjoy a lively card game in Jonesboro at 3 P.M. on Saturday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Board Game</td>
                    <td>A dynamic board game event in Conway at 5 P.M. on Tuesday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Table Top</td>
                    <td>An inactive tabletop session in Springdale at 4 P.M. on Thursday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Board Game</td>
                    <td>An active board game gathering in Rogers at 9 P.M. on Friday.</td>
                    <td>72944</td>
                  </tr>
                  <tr class="table-primary">
                    <td>Card Game</td>
                    <td>An inactive card game event in North Little Rock at 6 P.M. on Monday.</td>
                    <td>72944</td>
                  </tr>
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
