<?php

include('local_header.php');
$data = new Data;

	if($_POST['go']){
		admin_table($_POST['teams']);
	}
	if($_POST['paid']){
		$data->set_paid($id);
	}
	if($_POST['drop']){
		foreach($_POST['dropping'] as $check) {
			$data->drop_room_reserve($check);	
		}	
	}
