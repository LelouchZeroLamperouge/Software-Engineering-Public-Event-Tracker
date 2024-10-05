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
                        <a class="nav-link" href="ESManageer.html">Home</a>
                        <li class="nav-item">
                          <a class="nav-link" href="ESDetailsManager.html">Details</a>
                        </li>
                        <li class = "nav-item">
                        <a class="nav-link" href="ESCreate.html">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ESManage.html">Manage
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
                  </tr>
                </thead>
                <tbody>
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
