<?php

// Your TomTom API Key
$apiKey = "CR638URQ0VGqkceCO0a4fDSAk9Xe0hwv";

// Start and End Coordinates
$start = "52.37637,4.90056"; // Amsterdam
$end = "52.50931,13.42936";  // Berlin

// Routing API URL
$url = "https://api.tomtom.com/routing/1/calculateRoute/$start/$end/json?key=$apiKey";

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPGET => true,
]);

// Execute the request and fetch the response
$response = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    // Decode the JSON response into a PHP array
    $routeData = json_decode($response, true);

    // Output the entire response
    print_r($routeData);

    // Example: Accessing the summary of the first route
    if (isset($routeData['routes'][0])) {
        $routeSummary = $routeData['routes'][0]['summary'];
        echo "Total Distance: " . $routeSummary['lengthInMeters'] . " meters\n";
        echo "Travel Time: " . $routeSummary['travelTimeInSeconds'] . " seconds\n";
    } else {
        echo "No route found.";
    }
}

// Close cURL session
curl_close($curl);

?>
