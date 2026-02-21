<?php

// Enable error reporting during development

error_reporting(E_ALL);
ini_set('display_errors', 1);
 echo "VVBV";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST["fname"];
    $qualification = $_POST["qualification"];
    $designation = $_POST["designation"];
    $institute = $_POST["institute"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $researcharea = $_POST["researcharea"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $journal = $_POST["journal"];

    // File upload handling
    $picTempName = $_FILES["UploadFileFieldpic"]["tmp_name"];
    $cvTempName = $_FILES["UploadFileField"]["tmp_name"];
    
    $picName = $_FILES["UploadFileFieldpic"]["name"];
    $cvName = $_FILES["UploadFileField"]["name"];

    // Email content
    $subject = "New Reviewer Application";
    $message = "
        Full Name: $fname
        Qualification: $qualification
        Designation: $designation
        Institute: $institute
        Email: $email
        Phone: $phone
        Research Area: $researcharea
        Address: $address
        City/District: $city
        State/Province: $state
        Country: $country
        Journal of Interest: $journal
    ";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email with attachments
    $to = "info@iiardjournals.org"; // Replace with your actual email address
    $boundary = md5(time());

    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    $message = "--$boundary\r\n";
    $message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
    $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $message .= $message . "\r\n";

    // Attachments
    $message .= "--$boundary\r\n";
    $message .= "Content-Type: application/octet-stream; name=\"$picName\"\r\n";
    $message .= "Content-Disposition: attachment; filename=\"$picName\"\r\n";
    $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $message .= chunk_split(base64_encode(file_get_contents($picTempName))) . "\r\n";

    $message .= "--$boundary\r\n";
    $message .= "Content-Type: application/octet-stream; name=\"$cvName\"\r\n";
    $message .= "Content-Disposition: attachment; filename=\"$cvName\"\r\n";
    $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $message .= chunk_split(base64_encode(file_get_contents($cvTempName))) . "\r\n";


echo "SEE ME";

    // Attempt to send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to success page if the email is sent successfully
         echo "Hurry";
        header("Location: success_page.html");
        exit();
    } else {
        // Display an error message or redirect to an error page
        echo "Error: Unable to send email. Please try again later.";
        // You can redirect to an error page if needed
         header("Location: google.com");
        // exit();
    }
}
?>
