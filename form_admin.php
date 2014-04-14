<?php

include('local_header.php');


	if($_POST['go']){
		draw_all_data($_POST['teams']);
	}
	if($_POST['paid']){
			$data->set_paid($id);
	}
	if($_POST['drop']){
			foreach($_POST['dropping'] as $check) {
				drop_room_reserve($check);
				
				}
				draw_all_data($_POST['id']);
	}
