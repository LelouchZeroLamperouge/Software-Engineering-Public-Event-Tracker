<?php
# Filtering by date range
$startDate = '2023-01-01';
$endDate = '2023-12-31';

$stmt = $mysqli->prepare("SELECT * FROM EVENTS WHERE event_date BETWEEN ? AND ?");
$stmt->bind_param("ss", $startDate, $endDate); // Both are string dates
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Event: " . $row["event_name"] . " - Date: " . $row["event_date"] . "<br>";
    }
} else {
    echo "No events found within this date range.";
}

# Filtering by category
$category_id = 2;
$stmt = $mysqli->prepare("SELECT * FROM EVENTS WHERE category_id = ?");
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Event: " . $row["event_name"] . " - Category ID: " . $row["category_id"] . "<br>";
    }
} else {
    echo "No events found in this category.";
}
?>
