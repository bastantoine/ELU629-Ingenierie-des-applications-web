<?php

// Auteurs : Bastien & Pierre-Adrien

	$config = parse_ini_file("config.ini");

	try {
        $db = new PDO('mysql:host='.$config["server"].';dbname='.$config["database"], $config["login"], $config["password"]);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $exception) {
        die('Erreur : ' . $exception->getMessage());
    }
    $q = $db->query("SET NAMES UTF8");
    $q->closeCursor();

?>
