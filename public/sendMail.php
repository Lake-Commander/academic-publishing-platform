<?php 
require_once("inc/config.php");
require_once("inc/search.php");

if(isset($_GET['Name'])){

/**
	$captchaResponse = $_POST['captcha_token']);
$captchSite = "https://www.google.com/recaptcha/api/siteverify";
$captchaKey = "6LdZneAZAAAAAJRjwxYzp41sNUlJNup6cDPukC-V";
$mainCaptcha = file_get_contents($captchSite."?secret=".$captchaKey."&response=".$captchaResponse);
$mainCaptcha = json_decode($mainCaptcha);
*/

	$to = "editor@iiardpub.org";
	$from = $_GET['Email'];
	$name = $_GET['Name'];
	$phone = $_GET['Phone'];
	$words = "We have successfully received youyr mail. You will hear from us in less than 24 hours.";
	$subject = "New Contact for IIARD Publications";
	$subject2 = "IIARD Editorial Team";
	$message = "Name: " . $name . "\n\n".  "Email: "  . $from . "\n\n" . "Phone: " . $phone . "\n\n" ."Message:"  . "\n" . $_GET['Message'];
	$message2 = "Dear," . " " . $name . "\n\n" . $words . "\n\n" . "With Best Regards," ."\n\n" . "IIARD Publishing Team";
	$headers = "From:" . $from;
	$headers2 = "From:" . $to;
	mail($to,$subject,$message,$headers);
	mail($from,$subject2,$message2,$headers2);
	
	header("location: contact.php?success=true&name=$name");
}
?>