<?php
include('local_header.php');
$data = new Data;
$total=$_POST['total_rows'];
for($x=1;$x<=$total;$x++){
	echo "fuck";
	echo $id;
	$data->insert_rooming($id,$_POST['first'.$x],$_POST['last'.$x],$_POST['gender'.$x],$_POST['arr'.$x],$_POST['arr'.$x],$_POST['linens'.$x],$_POST['occ'.$x],$_POST['disab'.$x],$_POST['role'.$x]);
}
$display = new Display;
$display->display_page('process');

?>
