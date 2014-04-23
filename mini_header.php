<?php
require('/var/www/ESUS/ESUS3/database.php');      //Links to database in the correct division
// Database info. here since database.php is dynamically generated
try{
    $dbh= new PDO('mysql:host='.$data_host.';dbname='.$name_database,$data_username,$data_password);
}catch(PDOException $e){
    echo $e->getMessage();
}

?>