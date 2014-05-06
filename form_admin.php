<?php

include('local_header.php');
$data = new Data;
$display-> display_page('admin');

	if($_POST['paid']){
		$data->set_paid($id);
	}
	if($_POST['drop']){
		foreach($_POST['dropping'] as $check) {
			$data->drop_room_reserve($check);	
		}	
	}
