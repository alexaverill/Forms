<?php
include('../mini_header.php');
$id=$_POST['id'];
$value=$_POST['value'];
$sql="UPDATE beds SET occ=? WHERE id=?";
$update=$dbh->prepare($sql);
$update->execute(array($value,$id));
if($value==1){
echo 'Single';
}else{
echo 'Double';
}
?>