<?php
include('../mini_header.php');
$id=$_POST['id'];
$value=$_POST['value'];
$space=' ';
$place=strpos($value,$space);
$first=substr($value,0,$place);
$last=substr($value,$place);
$sql="UPDATE `beds` SET `first`=?, `last`=? WHERE `id`=?";
$update=$dbh->prepare($sql);
$update->execute(array($first,$last,$id));
echo $first.' '.$last;
?>

