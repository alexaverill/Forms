<?php
include('local_header.php');
$display = new Display;
if($_POST['drop']){
	foreach($_POST['dropping'] as $check) {
		$display->call_drop($check);			
	}
	$display-> display_page('index');
}else{
	$display-> display_page('index');
}
?>
