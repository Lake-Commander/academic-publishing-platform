<?php
// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Define the file path
$filename = 'report.json';

// Get the current timestamp
$timestamp = date('Y-m-d H:i:s');

$ipAddress = $_SERVER['REMOTE_ADDR'];

// Get the referrer from the HTTP headers
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

// Get the visitor ID from the client (sent as a query parameter)
$visitorId = isset($_GET['visitor_id']) ? $_GET['visitor_id'] : '';

// Check if the JSON file exists, and if not, create an empty JSON object
if (!file_exists($filename)) {
    file_put_contents($filename, '{}');
}

// Read the existing JSON data from the file
$jsonData = file_get_contents($filename);
$data = json_decode($jsonData, true);

// Add a new entry to the JSON data, including the referrer and visitor ID
$data[] = [
    'IP Address' => $ipAddress,
    'Referrer Header' => $referrer,
    'Timestamp' => $timestamp,
    'Message' => 'Hello Mr Dumka'
];

// Encode the updated data back to JSON format
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Write the JSON data back to the file
file_put_contents($filename, $jsonData);

// Output a message to the user
echo "Report has been created and saved as $filename";
?>
