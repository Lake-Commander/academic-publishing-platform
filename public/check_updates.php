<?php
$flagFilePath = '/home/u991-mlndw7zd5pr2/www/iiardjournals.org/public_html/updates_available.txt'; // Path to the flag file

if (file_exists($flagFilePath)) {
    // The flag file exists, indicating updates are available
    echo 'updates_available';
    
    // Remove the flag file since updates have been detected
    unlink($flagFilePath);
} else {
    // The flag file does not exist, indicating no updates
    echo 'no_updates';
}
?>
