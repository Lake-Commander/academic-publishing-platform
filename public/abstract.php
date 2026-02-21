<?php 
require_once("inc/config.php");
require_once("inc/search.php");


$j = $_GET['j'];

$u_id = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM journals WHERE journal_name = :j LIMIT 1");
$stmt->bindParam(':j', $j);
$stmt->execute();

// if not empty result
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if (is_array($row)) {

    $category = $row['journal_category'];
    $issn = $row['ISSN'];

//editorial board
    $stmt_edit = $db->prepare("SELECT * FROM editorials WHERE journal = '$j'");
    $stmt_edit->execute();

//current_abstract file 
    $stmtx = $db->prepare("SELECT * FROM publications WHERE id = '$u_id'  ");
    $stmtx->execute();
    $row_curr = $stmtx->rowCount();

	$stmtc = $db->prepare("SELECT * FROM publications WHERE id = '$u_id'  ");
    $stmtc->execute();

	$stmtv = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j'  AND (pub_issue = 'CURRENT' OR pub_issue ='BACK' )ORDER BY id DESC ");
    $stmtv->execute();
}

?>


<!DOCTYPE html>
<html>
<head>
	<?php require_once("inc/path.php"); ?>
<title id="title"></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta id="description" name="" content=""> 
<meta name="keyword" content="Abstract, iiardpub, iiard, iiard abstract, research, publication, 'publications', publications, journal, journals, institute, 'publication company', 'online publication', 'academic research and development', 'international institute',iiardpublication, 'academic research', 'international journals', 'international publications', 'international journal','international publication'">

<?php $rowc = $stmtc->fetch(PDO::FETCH_ASSOC);?>

<meta property="citation_title" content="<?php echo $rowc['pub_name'];?>">

<meta property="citation_abstract_html_url" content="<?php echo 'https://www.iiardjournals.org' . $_SERVER['REQUEST_URI'];?>">
<meta property="citation_fulltext_html_url" content="<?php echo 'https://www.iiardjournals.org' . $_SERVER['REQUEST_URI'];?>">

<meta property="citation_author" content="<?php echo $rowc['pub_author'];?>">
<meta property="citation_publication_date" content="<?php echo $rowc['date_added'];?>">
<meta property="citation_doi" content="<?php echo $rowc['doi'];?>">
<meta property="citation_journal_title" content="<?php echo $row['journal_name_full'];?>">
<meta property="citation_pdf_url" content="<?php echo 'https://www.iiardjournals.org/' . $rowc['path'];?>">
<meta property="citation_issn" content="<?php echo $row['ISSN'];?>">

<link rel="canonical" href="<?php echo 'https://www.iiardjournals.org' . $_SERVER['REQUEST_URI'];?>">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/fontawesome-free-5.15.4-web/css/font-awesome.min.css">
-->
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
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
<link href="css/liMarquee.css" rel="stylesheet">
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

<style>
.download_button{
background-color:transparent;
  border-radius:20px;
  padding:5px;
  padding-right:30px;
  padding-left:30px;
  font-size: 15px;
  font-weight: 600; 
  border: solid #8c3f1b 1px;
  color:#111;
} 

 .download_button:hover {
  color: #ffffff;
  background-color:#d48133;
  text-decoration: none;
}


/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://iiardjournals.org/images/no-bg-logo.png) center no-repeat #fff;
}



</style>

<body>
	<!--header-->
	<?php include_once("inc/header.php"); ?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li><a href="journals/"><span class="glyphicon" aria-hidden="true"></span>Journals</a></li>
				<li class="active"><?php echo $row['journal_name']; ?></li>
				<li class="active">Abstract</li>
				<li class="active"><?php echo $row['pub_name']; ?></li> 
			</ol>
		</div>
	</div>
    <!--//breadcrumbs-->

	<!-- code content-->

	<div class="codes">
		<div class="container" >

	 <div class="col-md-9 product-model-sec" >
	<div class="title-info wow fadeInUp animated " data-wow-delay=".5s"  style="text-align:left;" >
	  <p style="font-style: normal; color:black;"> <?php echo $row['journal_name_full']; ?>
     <span>(<?php echo $_GET['j']; ?> <span>)</p>
	 <p style="font-style: normal; color:black;">
	 <?php $rowv = $stmtv->fetch(PDO::FETCH_ASSOC); 
					 echo $row['ISSN'];  ?> <br> 
					 <?php $rowx = $stmtx->fetch(PDO::FETCH_ASSOC);
					 echo $rowx['pub_volume']; ?> <br>
					 <?php 
					 if($rowx['doi'] > "1") {
					    echo "DOI:"; 
						   } ?>
					<a href="<?php echo $rowx['doi'];?>"> <?php echo $rowx['doi'];?> </a> </p>
				<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
			
			<h2 class="title">	
               <?php echo $rowx['pub_name'];  ?>
				 </b> </h2>

<script>
var title = document.getElementById("title");
title.textContent += `<?php echo $rowx['pub_name'];?>`;
</script>



			<p  style="font-style: normal; color:black;"><?php echo $rowx['pub_author'];?> </p>

			<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">

				<h3>Abstract</h3>
				<br>
	  <p style="font-style: normal; color:black;"> <?php echo $rowx['pub_abstract']; ?> </p>

<script>
document.getElementById("description").name = `<?php echo $rowx['pub_name'];?>`;
document.getElementById("description").content = `<?php echo $rowx['pub_abstract'];?>`;
</script>



     <br>
	 <?php 
					 if($rowx['keyword'] > "1") {
					    echo "<b> keywords: </b>"; 
						   } ?>
     <p  style="font-style: normal; color:black;"> <?php echo $rowx['keyword']; ?></p>
	 <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
	 <?php 
					 if($rowx['reference'] > "1") {
					    echo "<b>References:</b>"; 
						   } ?>
	      <p  style="font-style: normal; color:black;"> <br> <?php echo nl2br($rowx['reference']); ?></p>
		  <br>
	 <a href="<?php echo $rowx['path']; ?>" class="download_button" > DOWNLOAD PDF <i class="fa-solid fa-arrow-down fa-bounce" aria-hidden="true"></i></a>
	 <br>
	 <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
     <a href="journal/?j=<?php echo $row['journal_name'];?>" onclick="window.close()" class="download_button"><i class="fa-solid fa-arrow-left "> Back</i></a>
</div>
</div>
<!--left panel -->
<div class="col-md-3 rsidebar"  style="margin-right:0px;  padding-bottom:0px;">
            <div class="rsidebar-top">
            <div class="sidebar-row" style="margin-top: 0px; padding: 0px;">

					<h4 style="text-align:center">Call for Papers  <p style=" color:black; font-size: 0.7em; font-family:  sans-serif; text-align:center"> JUNE 2024 EDITION </p></h4>
						
			  <div class="sidebar-row" style=" height: 150px; overflow: hidden; " >
			  <marquee behavior="scroll" direction="up" scrollamount="3" width="100%" style="text-align:center;">

			  Scholars and Researchers in the academic community and other institutions are invited to submit their
research articles for publication.<br> An Author wishing to submit a paper should ensure that it has not been
previously published or its being considered for publication in another journal. <br>The manuscript should be the Author's original work. IIARD invites Researchers, Academicians, Professionals, Practitioners, and Students from all over the world to submit high-quality theoretical and empirical original research papers, case studies, review papers, literature reviews, book reviews, conceptual framework, analytical and simulation models, and technical notes for publication.

			  </marquee>
			  </div>
				</div>
				</div>

				<br> 
					<div class="rsidebar-top">
                    <div class="sidebar-row" style="margin-top: 0px;">
				        <h4>LATEST UPDATES</h4>
						<ul>
						<li>
						<div class="sidebar-row" >
				<img src="images/secf.png" class="img-responsive"  alt="crossref"/>
					<p style="font-size: 1.0em; text-align: center;"><b> DOI (DIGITAL OBJECT IDENTIFIER) ISSUANCE </b></p>
					<p>We are pleased to inform you that IIARD is now a registered member of <b>Crossref</b>. Henceforth, we will be issuing <b>DOI</b> to every published article.  </p>
					</div>
						</li>
						<hr>
						<li>
						<p style="font-size: 1.0em; text-align: center;" ><b>JOURNAL HARD COPIES ARE READY FOR DISPATCH </b></p>
					<p> All Journal hard copies are ready for dispatch. Corresponding authors are advice to submit their mailing addresses to 
					<a href="mailto:editor@iiardjournals.org"  subject="Subject : Journal hard copies" > editor@iiardjournals.org   </a>	</p>
                    </li>
					<ul>
					</div>
</div>
<br>
<div class="rsidebar-top"  style="margin-top: 0px; padding: 0px;">
            <div class="sidebar-row" style="margin-top: 0px; padding: 0px;">
         
				 <embed src="" width="100%" height="300px" type="application/pdf" >
    </embed>		
			 
				</div>
				</div>



				</div>
<!--left panel -->
</div>
</div>






     <br>

<amp-ad width="100vw" height="320vw"
     type="adsense"
     data-ad-client="ca-pub-9123239308143055"
     data-ad-slot="9537710258"
     data-auto-format="rspv"
     data-full-width="">
  <div overflow="auto"> </div>
</amp-ad>



  <!-- code content -->
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
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>

<div class="se-pre-con"></div>

</body>
</html>






<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});

   </script>
