
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
    <main>
        <div class="box2">
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
                    <a class="nav-link active" href="ESCreate.html">Create
                        <span class="visually-hidden">(current)</span>
                    </a>
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
        </div>
          <div class="box3">
            <fieldset>
                <legend> Event Creation </legend>
    
                <label class="col-form-label mt-4" for="inputDefault">Event Name:</label>
                <input type="text" class="form-control-2" placeholder="Event Name" id="eName">
                <span>*</span>
                <br>

                <label class="col-form-label mt-4" for="inputDefault">Event Description:</label>
                <input type="text" class="form-control-2" placeholder="Description" id="Desc">
                <span>*</span>
                <br>
                
                <label class="col-form-label mt-4" for="inputDefault">Street Address:</label>
                <input type="text" class="form-control-2" placeholder="Street" id="strtAdd" >
                <span>*</span>
                <br>

                <label class="col-form-label mt-4" for="inputDefault">City:</label>
                <input type="text" class="form-control-2" placeholder="City" id="city" >
                <span>*</span>
                <br>

                <label class="col-form-label mt-4" for="inputDefault">Zip Code:</label>
                <input type="text" class="form-control-2" placeholder="Zip" id="zip" >
                <span>*</span>
                <br>
                
                <label for="Cat">Category</label>
                <select name="Cat" id="Cat">
                    <option value="sport">Sports</option>>
                    <option value="gaming">Gaming</option>                  
                    <option value="movies">Movies</option> 
                    <option value="music">Music</option> 
                    <option value="hiking">Hiking</option> 
                    <option value="meetup">Meetup</option> 
                    <option value="studying">Studying</option> 
                    <option value="pets">Pets</option> 
                    <option value="dancing">Dancing</option> 
                    <option value="reading">Reading</option> 
                    <option value="cosplay">Cosplay</option> 
                    <option value="sewing">Sewing</option> 
                    <option value="hiking">Hiking</option> 
                    <option value="sports">Sports</option> 
                    <option value="quilting">Quilting</option> 
                    <option value="tableTop">Table Top</option> 
                    <option value="cardGame">Card Game</option> 
                </select>
                <span>*</span>
                <br>

                <label class="col-form-label mt-4" for="inputDefault">Event Date:</label>
                <input type="text" class="form-control-2" placeholder="DoW Time" id="Date" >
                <span>*</span>
                <br>

                
            </fieldset>
            <button type="button" class="btn btn-link" id="createBtn">Create Event</button>
            <br>
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
  <script src="ESEventCreate.js"></script>
</footer>
