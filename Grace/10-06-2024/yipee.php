<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Software Engineering Project</title>
</head>

<body>
    <h1>This file is to demonstrate retrieval of data from MariaDB database</h1>

    <h2>

<?php

if (!$mysqli)
{
    die("Connection failed: " . mysqli_connect_error());
}

echo "Successful!\n";

$sql = "SELECT USER_ID, F_NAME, EMAIL FROM USERS";
$result = $mysqli->query($sql);


if ($result->num_rows > 0) {
    // Output data of each row

    echo "<h1>Users</h1>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    echo "Hey";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['USER_ID'] . "</td>";
        echo "<td>" . $row['F_NAME'] . "</td>";
        echo "<td>" . $row['EMAIL'] . "</td>";
        #echo "ID: " . $row["USER_ID"] . " - Name: " . $row["F_NAME"] . " - Email: " . $row["EMAIL"] . "\n";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>
</h2>
</body>
</html>