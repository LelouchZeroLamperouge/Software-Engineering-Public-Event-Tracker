<?php

# This file is used to connect to the DB in the php files. It must be included in each webpage in order to communicate with the DB on the webpages.

$databaseHost = '127.0.0.1';        # IP address of the DB server (localhost)
$databaseUsername = 'student';      # username used to access DB (must have been granted privileges to the EVENT_FINDER DB)
$databasePassword = 'UA123!';       # password of the above username
$databaseName = 'EVENT_FINDER';     # DB name
  

# Initiating the connection to the DB
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

# Will echo an error if it is unable to connect to the DB
if (!$mysqli)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
