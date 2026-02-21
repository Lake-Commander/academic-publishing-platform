<?php
	require_once("inc/config.php");

	$journal = 'WJIMT';

 	$stmtv = $db->prepare("UPDATE publications SET pub_issue='BACK' WHERE pub_journal='".$journal."' ");
    if($stmtv->execute()){
    	echo "done!! for -  ".$journal;   
    };

?>