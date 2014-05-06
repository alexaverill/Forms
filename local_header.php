<?php
include('mini_header.php'); //mini header already has the connection created, therefore no reason to double the amount of code.
include('classes.php');
include('session.php');
$Verification = new Verification;
echo $_SESSION['id'];
if(!$Verification->is_user() && !$Verification->is_admin()){
    echo "Please login";
    die();
}
$id = $SESSION['id'];
$Data = new Data($SESSION['id']);
$display = new Display;
?>