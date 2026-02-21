<?php
$remoteJsonUrl = '/home/u991-mlndw7zd5pr2/www/iiardjournals.org/public_html/report.json'; // URL of the remote JSON file
$localJsonPath = '/home/u991-mlndw7zd5pr2/www/iiardjournals.org/public_html/report_checker.json'; // Path to the local copy of the JSON file
$notificationEmail = 'preciousdpb2000@gmail.com'; // Email address to send notifications
$flagFilePath = '/home/u991-mlndw7zd5pr2/www/iiardjournals.org/public_html/updates_available.txt'; // Path to the flag file

// Check if the local JSON file exists
if (!file_exists($localJsonPath)) {
    // If it doesn't exist, create an empty JSON file
    file_put_contents($localJsonPath, '{}');
}


// Retrieve the remote JSON content
$remoteJson = file_get_contents($remoteJsonUrl);

// Read the previous local JSON content
$localJson = file_get_contents($localJsonPath);

// Compare the remote and local JSON
if ($remoteJson !== $localJson) {
    // The JSON files are different; there's been a change
    
    // Save the updated remote JSON as the new local copy
    file_put_contents($localJsonPath, $remoteJson);
    
    
    file_put_contents($flagFilePath, 'updates_available');
    

    // Send a notification email
    $subject = 'Report.json Updated';
    $message = 'The File has been updated';
    mail($notificationEmail, $subject, $message);

    // You can also trigger additional actions or notifications as needed
}
?>
