<?php
	$server="localhost";
	$admin="mysqlAdmin";
	$password="mysqlPwd";
        $bd="site_recettes";
	$pdo=new PDO("mysql:host=$server;dbname=$bd", $admin, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
