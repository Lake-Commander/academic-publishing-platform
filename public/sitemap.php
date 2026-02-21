<?php

$db_host = 'localhost'; // The hostname of your database
$db_user = 'iiardpub_1108'; // The username for your database
$db_pass = 'DoubleProtection123$$$'; // The password for your database
$db_name = 'iiardpub_1108'; // The name of your database
$table_name = 'publications'; // The name of the table containing your pages
$url = 'https://iiardjournals.org'; // The base URL of your website
$priority = 0.7; // The default priority of your pages
$freq = 'hourly'; // The default frequency of how often your pages are updated

 
// Connect to the database
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);



// Retrieve the pages from the database
$result = mysqli_query($db, "SELECT * FROM $table_name");

echo mysqli_num_rows($result) . "-NB-REFRESH TO UPDATE sitemap or ALTERNATIVELY (SPEED) switch Dynamic Cache on /off on sitegrounds" ;

// Open the sitemap file for writing
$sitemap = fopen('sitemap.xml', 'w');

// Write the header of the sitemap file
fwrite($sitemap, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
fwrite($sitemap, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ' . PHP_EOL);
fwrite($sitemap, ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' . PHP_EOL);
fwrite($sitemap, ' xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9" ' . PHP_EOL);
fwrite($sitemap, '>' . PHP_EOL);
fwrite($sitemap, '<!-- created by Dumka Bipnelo see sitemap.php for its auto gen; -->' . PHP_EOL);


// Loop through the pages
while ($page = mysqli_fetch_array($result)) {
    // Write the URL entry for the page
    fwrite($sitemap, '  <url>' . PHP_EOL);
    fwrite($sitemap, '<loc>' . $url . '/abstract.php?j=' . $page['pub_journal'] . '&amp;pn=' . str_replace(" ", "%20", htmlspecialchars($page['pub_name'])) . '&amp;id=' . $page['id'] .'</loc>' . PHP_EOL);
    fwrite($sitemap, '</url>' . PHP_EOL );
}

// Write the footer of the sitemap file
fwrite($sitemap, '</urlset>');

// Close the sitemap file
fclose($sitemap);

// Close the database connection
mysqli_close($db);

?>