<?php

function noHTML( $input, $encoding = 'UTF-8' ) {
		return htmlentities( $input, ENT_QUOTES | ENT_HTML5, $encoding );
	}

	include_once("inc/config.php");
	if(isset($_FILES['UploadFileField'])){

			$pname = $_POST['pname'];
                        $pname = noHTML($pname);
			$pissue = $_POST['pissue'];
			$pvolume = $_POST['pvolume'];
			$pauthor = $_POST['pauthor'];
			$pjournal = $_POST['pjournal'];
			
			$UploadName = $_FILES['UploadFileField']['name'];
			$dir = 'get/'.$pjournal.'/'.$pvolume.'';
			$path='get/'.$pjournal.'/'.$pvolume.'/'.$UploadName.'';
			
			

		
			if (!is_dir($dir)) 
			// is_dir - tells whether the filename is a directory
			{
			//mkdir - tells that need to create a directory
			mkdir($dir, 0755, true);
			}
			
			if(file_exists($path)){
						echo "<p style='color:#f00; font-weight: bold; font-size: 18px; margin:10px; padding: 10px; text-align: center;'>The file ".$pname." exists already</p>";
				exit();
			}
			
		
			move_uploaded_file( $_FILES['UploadFileField']['tmp_name'], "$path");
			
			
				
				try {
    $sql = $db->prepare("INSERT INTO publications (pub_name, pub_issue, pub_volume, pub_author, pub_journal, path)
    VALUES (:pname, :pissue, :pvolume, :pauthor, :pjournal, :path)");

$sql->execute(array(
    "pname" => $pname,
    "pissue" => $pissue,
    "pvolume" => $pvolume,
	"pauthor" => $pauthor,
    "pjournal" => $pjournal,
    "path" => $path
));
	

    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
		
			
			echo "<p style='color: #1FA833; font-weight: bold; font-size: 18px; margin:10px; padding: 10px; text-align: center;'>".$pname." has been uploaded</p>";
			}
	
?>

<!DOCTYPE html>
<html>
<head>
	<?php require_once("inc/path.php"); ?>
<title>IIARD | Submit Manuscript - International Institute of Academic Research and development | Special Offers </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="IIARD Publications is an independent institution in Africa. It focuses on the developmental issues of the continent, by providing a medium for interaction between researchers in the academic community. Its main purpose is to foster the relationship between researchers and to create an enabling environment for contributors and academicians to share ideas that relates to developmental issues."> 
<meta name="keyword" content="iiardpub, iiard, research, publication, 'publications', publications, journal, journals, institute, 'publication company', 'online publication', 'academic research and development', 'international institute',iiardpublication, 'academic research', 'international journals', 'international publications', 'international journal','international publication'">
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
<body>
	<!--header-->
	<?php include_once("inc/header.php"); ?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Submit Manuscript</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--Short codes-->
	<div class="codes">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div>
		  <h3 class="title" style="margin-top:-40px;">Admin<span> Upload</span></h3>
                <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">

            <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
            
		  <div class="row wow fadeInDown animated" data-wow-delay=".5s"><!-- /.col-lg-6 --><!-- /.col-lg-6 -->
			</div><!-- /.row -->
			<div class="row wow fadeInDown animated" data-wow-delay=".5s">
				<form role="form" method="post" action="rico/" enctype="multipart/form-data">
                <div class="col-lg-6 in-gp-tl">
                  <div class="input-group">
					  <span class="input-group-addon" id="sizing-addon3">P Name</span>
				<input type="text" class="form-control" required placeholder="P Name" aria-describedby="sizing-addon3" name="pname">
					</div>
                    
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">P Author</span>
				<input type="text" class="form-control" required placeholder="P Author" aria-describedby="sizing-addon3" name="pauthor">
					</div>
                    
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">P Volume</span>
				
                <select class="form-control" name="pvolume" required>
			<option selected disabled><em>Publication Volume</em></option>
    <option>Vol. 1 No.8, 2015</option>
    <option>VOL. 2 NO. 1 
    
    
    
    </option>
    <option>VOL. 2 NO. 2 2019</option>
    <option>VOL. 2 NO. 3 2019</option>
    <option>VOL. 2 NO. 4 2018</option>
    <option>VOL. 2 NO. 5 2018</option>
    <option>VOL. 2 NO. 6 2018</option>
    <option>VOL. 2 NO. 7 2018</option>
    <option>VOL. 2 NO. 8 2018</option>
    <option>VOL. 2 NO. 9 2018</option>
    <option>VOL. 2 NO. 10 2018</option>
    <option>VOL. 3 NO. 1 2019</option>
    <option>VOL. 3 NO. 1 2020</option>
    <option>VOL. 3 NO. 2 2019</option>
    <option>VOL. 3 NO. 3 2018</option>
    <option>VOL. 3 NO. 4 2018</option>
    <option>VOL. 3 NO. 5 2018</option>
    <option>VOL. 3 NO. 6 2018</option>
    <option>VOL. 3 NO. 7 2018</option>
    <option>VOL. 3 NO. 8 2018</option>
    <option>VOL. 3 NO. 9 2018</option>
    <option>VOL. 3 NO. 10 2018</option>
    <option>VOL. 3 NO. 11 2018</option>
    <option>VOL. 3 NO. 12 2018</option>
    <option>VOL. 3 NO. 13 2018</option>
    <option>VOL. 3 NO. 14 2018</option>
    <option>VOL. 4 NO. 1 2019</option>
    <option>VOL. 4 NO. 1 2020</option>
    <option>VOL. 4 NO. 2 2019</option>
    <option>VOL. 4 NO. 3 2019</option>
    <option>VOL. 4 NO. 4 2019</option>
    <option>VOL. 4 NO. 5 2019</option>
    <option>VOL. 4 NO. 6 2019</option>
    <option>VOL. 4 NO. 7 2019</option>
    <option>VOL. 4 NO. 8 2019</option>
    <option>VOL. 4 NO. 9 2019</option>
    <option>VOL. 5 NO. 1 2019</option>
    <option>VOL. 5 NO. 1 2020</option>
    <option>VOL. 5 NO. 2 2019</option>
    <option>VOL. 5 NO. 2 2020</option>
    <option>VOL. 5 NO. 3 2019</option>
    <option>VOL. 5 NO. 3 2020</option>
    <option>VOL. 5 NO. 4 2019</option>
    <option>VOL. 5 NO. 5 2019</option>
    <option>VOL. 5 NO. 6 2019</option>
    <option>VOL. 5 NO. 7 2019</option>    
    <option>VOL. 6 NO. 1 2020</option>
    <option>VOL. 6 NO. 2 2020</option>
    <option>VOL. 6 NO. 3 2020</option>
    <option>VOL. 6 NO. 4 2020</option>
    <option>VOL. 6 NO. 5 2020</option>

  </select>
					</div>

                  
                  <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">Pub Issue</span>
				<select class="form-control" name="pissue" required>
			<option>CURRENT</option>
    
    <option> BACK</option>
    
  </select>
					</div>
                    
                  
                    
                  
                    
                                        
                    <div class="input-group">
						<span class="input-group-addon" id="sizing-addon3">P Journal</span>
				<input type="text" class="form-control" required placeholder="P Journal" aria-describedby="sizing-addon3" name="pjournal">
					</div>
                    
                  <label for="UploadFileField">Select a file to Upload: <span><code> .doc , .docx</code></span></label>
	<input type="file" name="UploadFileField" required id="UploadFileField" /> <br />
	<input class="btn btn-primary" type="submit" name="UploadButton" />
	 </div></form>
                    
				</div>
                
			
			
			
			<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
			
			
	  </div>
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
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>