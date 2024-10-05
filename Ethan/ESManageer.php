<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

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
        <button type="button" class="btn btn-link1" id="cust">Customer Mode</button>
        <button type="button" class="btn btn-link1" id="logoutBtn">Logout</button>
      </div>
    </header>
    <main class="box2">
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="ESManageer.html">Home
                      <span class="visually-hidden">(current)</span>
                    </a>
                    <li class="nav-item">
                      <a class="nav-link" href="ESDetailsManager.html">Details</a>
                    </li>
                    <li class = "nav-item">
                        <a class="nav-link" href="ESCreate.html">Create</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="ESManage.html">Manage</a>
                    </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-sm-2" type="search" id="SearchBar" placeholder="Search">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="Search">Search</button>
                </form>
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
              </tr>
            </thead>
            <tbody>
              <tr class="table-primary">
                <th scope="row">Active</th>
                <td>Table Top</td>
                <td>Fort Smith</td>
                <td>Saturday 9 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Active</th>
                <td>Card Game</td>
                <td>Little Rock</td>
                <td>Sunday 2 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Inactive</th>
                <td>Table Top</td>
                <td>Fayetteville</td>
                <td>Friday 8 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Active</th>
                <td>Board Game</td>
                <td>Hot Springs</td>
                <td>Monday 7 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Inactive</th>
                <td>Table Top</td>
                <td>Bentonville</td>
                <td>Wednesday 6 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Active</th>
                <td>Card Game</td>
                <td>Jonesboro</td>
                <td>Saturday 3 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Active</th>
                <td>Board Game</td>
                <td>Conway</td>
                <td>Tuesday 5 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Inactive</th>
                <td>Table Top</td>
                <td>Springdale</td>
                <td>Thursday 4 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Active</th>
                <td>Board Game</td>
                <td>Rogers</td>
                <td>Friday 9 P.M.</td>
                <td>72944</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">Inactive</th>
                <td>Card Game</td>
                <td>North Little Rock</td>
                <td>Monday 6 P.M.</td>
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
