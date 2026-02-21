<?php
require 'vendor/autoload.php';

use Smalot\PdfParser\Parser;

$servername = "";
$username = "";
$password = "";
$dbname = "";
$folderPath = 'iiardjournals\public_html\test'; // Update with your folder path

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to extract data from PDF
function extractDataFromPdf($filePath) {
    $parser = new Parser();
    $pdf = $parser->parseFile($filePath);
    $text = $pdf->getText();

    // Initialize data array
    $data = [];

    // Extract Pub Name
    preg_match('/\b(?:Pub Name|Title|Name):?\s*(.+?)(?:\n|\r|$)/i', $text, $matches);
    $data['Pub_Name'] = $matches[1] ?? '';

    // Extract Pub Issue (requires database lookup, assuming we have a function getPubIssueByVolume)
    $data['Pub_Issue'] = ''; // Placeholder, needs a function to fill in

    // Extract Pub Volume
    preg_match('/\bVolume:?\s*(Vol\s*\d+\.?\s*No\.?\s*\d+\s*\d{4})/i', $text, $matches);
    $data['Pub_Volume'] = $matches[1] ?? '';

    // Extract Pub Author
    preg_match('/\b(?:Author|Pub Author|Authors):?\s*(.+?)(?:\n|\r|$)/i', $text, $matches);
    $data['Pub_Author'] = $matches[1] ?? '';

    // Extract Pub Journal
    preg_match('/\bJournal:?\s*(.+?)(?:\n|\r|$)/i', $text, $matches);
    $data['Pub_Journal'] = $matches[1] ?? '';

    // Extract Pub Abstract
    preg_match('/\bAbstract:?\s*(.+?)(?=Keywords:|Key words:|References:|References)/is', $text, $matches);
    $data['Pub_Abstract'] = trim($matches[1] ?? '');

    // Extract DOI
    preg_match('/\bDOI:?\s*(.+?)(?:\n|\r|$)/i', $text, $matches);
    $data['Doi'] = $matches[1] ?? '';

    // Extract Keywords
    preg_match('/\b(?:Keywords|Key words):?\s*(.+?)(?=References:|References)/is', $text, $matches);
    $data['Keyword'] = trim($matches[1] ?? '');

    // Extract References
    preg_match('/\bReferences:?\s*(.+)$/is', $text, $matches);
    $data['Reference'] = trim($matches[1] ?? '');

    return $data;
}

// Function to get Pub Issue by Volume (implement as needed)
function getPubIssueByVolume($volume) {
    // Implement your logic to fetch the issue based on volume
    // This is a placeholder function
    return 'Issue Value Based on Volume';
}

// Scan folder for PDFs
$files = glob($folderPath . '/*.pdf');

foreach ($files as $file) {
    $data = extractDataFromPdf($file);
    $data['Date_Added'] = date('Y-m-d');

    // Extract the PDF filename
    $pdfFilename = basename($file);

    // Construct the new path format
    $data['Path'] = 'get/' . $data['Pub_Journal'] . '/' . $data['Pub_Volume'] . '/' . $pdfFilename;

    // Generate a unique ID or fetch the next ID
    $result = $conn->query("SELECT MAX(Id) AS max_id FROM publications");
    $row = $result->fetch_assoc();
    $data['Id'] = $row['max_id'] + 1;

    // Set Pub Issue based on Volume
    $data['Pub_Issue'] = getPubIssueByVolume($data['Pub_Volume']);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO publications (Id, Pub_Name, Pub_Issue, Pub_Volume, Pub_Author, Pub_Journal, Date_Added, Path, Pub_Abstract, Doi, Keyword, Reference) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssssss", $data['Id'], $data['Pub_Name'], $data['Pub_Issue'], $data['Pub_Volume'], $data['Pub_Author'], $data['Pub_Journal'], $data['Date_Added'], $data['Path'], $data['Pub_Abstract'], $data['Doi'], $data['Keyword'], $data['Reference']);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully for PDF: $file\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }
}

// Close connection
$conn->close();
?>
