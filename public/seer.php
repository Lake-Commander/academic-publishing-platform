<?php

$errors = [];
$successMessage = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	try {
    // Get form data
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


	// File uploads
    $imageFileName = $_FILES["UploadFileFieldpic"]["name"];
    $cvFileName = $_FILES["UploadFileField"]["name"];
    $imageTempName = $_FILES["UploadFileFieldpic"]["tmp_name"];
    $cvTempName = $_FILES["UploadFileField"]["tmp_name"];

    // Prepare email content
    $to = "info@iiardjournals.org";
    $subject = "New Reviewer Application";
    
	// Message body
$messageBody = "--{$boundary}\r\n";
$messageBody .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
$messageBody .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$messageBody .= "Full Name: $fname\n";
$messageBody .= "Qualification: $qualification\n";
$messageBody .= "Designation: $designation\n";
$messageBody .= "Institute: $institute\n";
$messageBody .= "Email: $email\n";
$messageBody .= "Phone: $phone\n";
$messageBody .= "Research Area: $researcharea\n";
$messageBody .= "Address: $address\n";
$messageBody .= "City/District: $city\n";
$messageBody .= "State/Province: $state\n";
$messageBody .= "Country: $country\n";
$messageBody .= "Journal of Interest: $journal\n\r\n";

    // Set headers
    $headers = "From: $email";

// Attach files to email
$fileAttachment = chunk_split(base64_encode(file_get_contents($imageTempName)));
$fileAttachmentCV = chunk_split(base64_encode(file_get_contents($cvTempName)));

   // Headers for file attachments
$headers .= "\r\nMIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"";

// Attach message body
$message = "{$messageBody}\r\n\r\n";

    // Attachment - Image
$message .= "--{$boundary}\r\n";
$message .= "Content-Type: application/octet-stream; name=\"{$imageFileName}\"\r\n";
$message .= "Content-Transfer-Encoding: base64\r\n";
$message .= "Content-Disposition: attachment; filename=\"{$imageFileName}\"\r\n\r\n";
$message .= $fileAttachment . "\r\n\r\n";

// Attachment - CV
$message .= "--{$boundary}\r\n";
$message .= "Content-Type: application/octet-stream; name=\"{$cvFileName}\"\r\n";
$message .= "Content-Transfer-Encoding: base64\r\n";
$message .= "Content-Disposition: attachment; filename=\"{$cvFileName}\"\r\n\r\n";
$message .= $fileAttachmentCV . "\r\n\r\n";

// End boundary
$message .= "--{$boundary}--";

    // Send email
    mail($to, $subject, $message, $headers);

	// Success message
        $successMessage = 'Application submitted successfully!';
    } catch (Exception $e) {
        // Handle errors
        $errors[] = 'Error submitting the application. Please try again later.';
        // Optionally log the error: error_log($e->getMessage());
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<?php require_once("inc/path.php"); ?>
<title>IIARD |  Reviewers and Editors </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="IIARD Publications is an independent institution in Africa. It focuses on the developmental issues of the continent, by providing a medium for interaction between researchers in the academic community. Its main purpose is to foster the relationship between researchers and to create an enabling environment for contributors and academicians to share ideas that relates to developmental issues."> 
<meta name="keyword" content="iiardpub, iiard, research, publication, 'publications', publications, journal, journals, institute, 'publication company', 'online publication', 'academic research and development', 'international institute',iiard publication, 'academic research', 'international journals', 'international publications', 'international journal','international publication'">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!--//Custom Theme files -->
<!--js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
    <!--//js-->
<!--cart-->
<script src="js/simpleCart.min.js"></script>
<!--cart-->
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
<!--web-fonts-->
<!--animation-effect-->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<?php include_once("inc/marquee.php"); ?>
<script>
 new WOW().init();
</script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smooth-scrolling-->
</head>
<body>
	<!--header-->
	<?php include_once("inc/header.php"); ?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Reviewers</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--Short codes-->

	<!-- Add this where you want to display errors -->
<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<!-- Add this where you want to display success message -->
<?php if (!empty($successMessage)) { ?>
    <div class="alert alert-success">
        <?php echo $successMessage; ?>
    </div>
<?php } ?>


	<div class="codes">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div>
		  <h3 class="title" style="margin-top:-40px;">Reviewers<span> and Editors</span></h3>
                <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
				<p style="text-align:justify">  The success of IIARD Journal is unequivocally attributed to the dedication and expertise of its esteemed reviewers. As key contributors to the scholarly review process, our reviewers play a pivotal role in ensuring the quality, rigor, and integrity of the research published in our journal. Their commitment to excellence has established IIARD as a reputable platform for disseminating cutting-edge research and advancing the frontiers of knowledge." As a reviewer, you will have the opportunity to engage with groundbreaking research, provide valuable insights to authors, and contribute to the shaping of academic conversations. Your expertise will be instrumental in maintaining the journal's reputation for excellence and fostering a culture of continuous improvement.

				</p>
			
            
            <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
            
		  <div class="row wow fadeInDown animated" data-wow-delay=".5s"><!-- /.col-lg-6 --><!-- /.col-lg-6 -->
			</div><!-- /.row -->
			<div class="row wow fadeInDown animated" data-wow-delay=".5s">
				<form role="form" method="post"  action="" enctype="multipart/form-data">
                <div class="col-lg-6 in-gp-tl">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Full Name</span>
				<input type="text" class="form-control" required placeholder="Full Name" aria-describedby="sizing-addon3" name="fname">
					</div>
                    

					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Qualification</span>
				<input type="text" class="form-control" required placeholder="Qualification" aria-describedby="sizing-addon3" name="qualification">
					</div>


					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Designation</span>
				<input type="text" class="form-control" required placeholder="Designation" aria-describedby="sizing-addon3" name="designation">
					</div>


					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Institute</span>
				<input type="text" class="form-control" required placeholder="Institute" aria-describedby="sizing-addon3" name="institute">
					</div>

                                        
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Email</span>
				<input type="email" class="form-control" required placeholder="Email" aria-describedby="sizing-addon3" name="email">
					</div>
                    
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Mobile</span>
				<input type="text" class="form-control" required placeholder="Phone Number" aria-describedby="sizing-addon3" name="phone">
					</div>

					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Research Area</span>
				<input type="text" class="form-control" required placeholder="Research Area" aria-describedby="sizing-addon3" name="researcharea">
					</div>


					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Address</span>
				<input type="text" class="form-control" required placeholder="Address" aria-describedby="sizing-addon3" name="address">
					</div>


					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">City/District</span>
				<input type="text" class="form-control" required placeholder="City" aria-describedby="sizing-addon3" name="city">
					</div>

                    
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">State/Province</span>
				<input type="text" class="form-control" required placeholder="State" aria-describedby="sizing-addon3" name="state">
					</div>
                    
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Country</span>
				<input type="text" class="form-control" required placeholder="Country" aria-describedby="sizing-addon3" name="country">
					</div>

                    
	<label for="UploadFileField">Please Upload a Passport Photo<span><code> .jpeg or .jpg </code>(File should be less than 1mb)</span></label>
	<input type="file" name="UploadFileFieldpic" required  id="UploadFileFieldpic" /> <br />
    
    <label for="UploadFileField">Please Upload Your CV/Resume<span><code> .doc or .docx</code></span></label>
	<input type="file" name="UploadFileField" required id="UploadFileField" /> <br />
    
    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Journal of Interest</span>
				<select class="form-control" id="select" name="journal" required>
			<option><em>--Plese Select--</em></option>
     <option>IIARD INTERNATIONAL JOURNAL OF ECONOMICS AND BUSINESS MANAGEMENT</option>
     <option>INTERNATIONAL JOURNAL OF ECONOMICS AND FINANCE MANAGEMENT</option>
     <option>INTERNATIONAL JOURNAL OF MARKETING AND COMMUNICATION STUDIES</option>
     <option>INTERNATIONAL JOURNAL OF SOCIAL SCIENCES AND MANAGEMENT RESEARCH</option>
     <option>JOURNAL OF ACCOUNTING AND FINANCE MANAGEMENT (JAFM)</option>
     <option>JOURNAL OF BUSINESS AND AFRICAN ECONOMY (JBAE)</option>
     <option>WORLD JOURNAL OF ENTREPRENEURIAL DEVELOPMENT STUDIES</option>
     <option>WORLD JOURNAL OF FINANCE AND INVESTMENT RESEARCH</option>
     <option>AFRICAN JOURNAL OF HISTORY AND ARCHAEOLOGY (AJHA)</option>
     <option>INTERNATIONAL JOURNAL OF ENGLISH LANGUAGE AND COMMUNICATION STUDIES</option>
     <option>INTERNATIONAL JOURNAL OF RELIGIOUS AND CULTURAL PRACTICE</option>
     <option>JOURNAL OF HUMANITIES AND SOCIAL POLICY (JHSP)</option>
     <option>JOURNAL OF LAW AND GLOBAL POLICY (JLGP)</option>
     <option>JOURNAL OF HOTEL MANAGEMENT AND TOURISM RESEARCH</option>
     <option>RESEARCH JOURNAL OF HUMANITIES AND CULTURAL STUDIES</option>
     <option>INTERNATIONAL JOURNAL OF EDUCATION AND EVALUATION (IJEE)</option>
     <option>INTERNATIONAL JOURNAL OF ENGINEERING AND MODERN TECHNOLOGY (IJEMT)</option>
     <option>RESEARCH JOURNAL OF MASS COMMUNICATION AND INFORMATION TECHNOLOGY</option>
     <option>JOURNAL OF POLITICAL SCIENCE AND LEADERSHIP RESEARCH</option>
     <option>JOURNAL OF PUBLIC ADMINISTRATION AND SOCIAL WELFARE RESEARCH</option>
     <option>INTERNATIONAL JOURNAL OF HEALTH AND PHARMACEUTICAL RESEARCH</option>
     <option>IIARD INTERNATIONAL JOURNAL OF GEOGRAPHY AND ENVIRONMENTAL MANAGEMENT.</option>
     <option>INTERNATIONAL JOURNAL OF AGRICULTURE AND EARTH SCIENCE (IJAES)</option>
     <option>INTERNATIONAL JOURNAL OF APPLIED SCIENCE AND MATHEMATICAL THEORY (IJASMT)</option>
     <option>INTERNATIONAL JOURNAL OF CHEMISTRY AND CHEMICAL PROCESSES (IJCCP)</option>
     <option>INTERNATIONAL JOURNAL OF COMPUTER SCIENCE AND MATHEMATICAL THEORY</option>
     <option>INTERNATIONAL JOURNAL OF MEDICAL EVALUATION AND PHYSICAL REPORT</option>
     <option>JOURNAL OF BIOLOGY AND GENETIC RESEARCH</option>
     <option>RESEARCH JOURNAL OF FOOD SCIENCE AND QUALITY CONTROL</option>
     <option>RESEARCH JOURNAL OF PURE SCIENCE AND TECHNOLOGY</option>
     <option>WORLD JOURNAL OF INNOVATION AND MODERN TECHNOLOGY</option>
     <option>IIARD INTERNATIONAL JOURNAL OF BANKING AND FINANCE RESEARCH (IJBFR)</option>
  <option> Other</option>
  </select>
					</div>
                    
                    <hr>
                
                <!--<legend>Delivery Address </legend>-->
                <input type="checkbox" name="terms" value="" required />
                I accept the terms and conditions.<a data-toggle="modal" href="#myModal"> Click Here to View</a>.
                                
                <hr>
                    
    
	<input class="btn btn-primary" type="submit" name="UploadButton"  value="Submit Application"/>
	 </form>
                </div>    
		  </div>
                
			
			
			
			<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
			
            
			
		</div>
	
    
    <div id="myModal" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
 
                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <h3 class="title">Terms  and Conditions</h3>
                </div>
                <div class="modal-body">
                
                <p><strong>Apply  as an Associate Editor/Reviewer </strong></p>
                <p>The International Institute of Academic Research and Development (IIARD) invite renowned academicians and researchers to join our panel of reviewers. While accepting the candidate as a reviewer, IIARD follows a strict set of requirements. The International Institute of Academic Research and Development (IIARD) utilize a swift and rigorous peer-review process. This procedure is used to ensure that the journal's integrity is preserved.</p>
                
				<p>&nbsp;</p>
                <p><strong>Academic  Qualification</strong><br>
•	The applicant must have earned a doctorate from a recognized university<br>
•	The applicant must be an author with at least four peer-reviewed publications.
</p>
                <p>&nbsp;</p>
                <p><strong>Reviewer&rsquo;s  Responsibilities</strong><br>
                  •	All conflicts of interest should be avoided by the Reviewer.<br>
                  • The Reviewer must be prepared to provide a full report on each article that is assigned to him or her.<br>
                  •	The Reviewer must complete the review procedure within the time frame indicated<strong> </strong><br>
                  •	The Reviewer should be aware that the manuscript is a confidential document. It should not be discussed or shared with coworkers, students, or anyone. The COPE Ethical Guidelines for Peer Reviewers should be followed by all intended reviewers. IIARD is committed to following COPE's best practices for dealing with ethical concerns in journal publishing and has accepted COPE criteria that the editorial members (Editors, Advisory Board, and Journal Manager) have agreed fit the journal's goals and objectives. The complete guidelines, developed by COPE can be downloaded  <a href="images/T&C for reviewers.pdf">here</a>.<br>
                  •	By performing peer-review, soliciting, and submitting appropriate papers for the Journal, reviewers will position themselves as well-known experts in their respective fields.<br>
                  •	They should contribute ideas, input, oversight, contacts, and moral support to guarantee the Journal's reputation as a source of high-quality information is maintained and expanded. </p>
                <p>&nbsp;</p>
                
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <a href="images/T&C for reviewers.pdf" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span>Download Pdf</a>
                    </div>
                </div>
 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
    </div>
	<!--//short-codes-->	
	<!--footer-->
	<?php include_once("inc/footer.php"); ?>
	<!--//footer-->			
	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>

<script>
$(document).ready(function(){
    $("#button").click(function(){
        $("#terms").toggle('slow');
    });
});
</script>



	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>