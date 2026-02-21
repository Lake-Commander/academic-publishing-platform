<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Name via Email</title>
</head>
<body>

<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);


$to = "preciousdpb2000@gmail.com";
$subject = "Test Email";
$message = "This is a test email sent via PHP.";
$headers = "From: postmaster@iiardjournals.org";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}

?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Submit</button>
</form>

</body>
</html>
