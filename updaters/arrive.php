<?php
include('../mini_header.php');
$id=$_POST['id'];
$value=$_POST['value'];
$sql="UPDATE `beds` SET `arrive`=? WHERE `id`=?";
$update=$dbh->prepare($sql);
$update->execute(array($value,$id));
echo $value;
?>
