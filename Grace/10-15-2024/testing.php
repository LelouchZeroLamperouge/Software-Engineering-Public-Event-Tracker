<?php
function haversineGreatCircleDistance($lat1, $lon1, $lat2, $lon2) {
    
    // Earth’s radius
    $earthRadiusMi = 3959; // in miles

    // Convert degrees to radians
    $latFrom = deg2rad($lat1);
    $lonFrom = deg2rad($lon1);
    $latTo = deg2rad($lat2);
    $lonTo = deg2rad($lon2);

    // Haversine formula
    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $a = sin($latDelta / 2) * sin($latDelta / 2) + cos($latFrom) * cos($latTo) * sin($lonDelta / 2) * sin($lonDelta / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Calculate the distance based on the desired unit
    return $earthRadiusMi * $c; // return distance in miles
}

// Example usage
$origin = [35.3827, -94.3734]; // San Francisco
$destination = [35.0601, -94.2548]; // Los Angeles

// Get distance in miles
$distanceMi = haversineGreatCircleDistance($origin[0], $origin[1], $destination[0], $destination[1]);
echo "Distance between UAFS and Ethan: " . round($distanceMi, 2) . " miles\n";
?>