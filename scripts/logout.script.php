<?php

session_start();
session_destroy();

$config = parse_ini_file("../includes/config.ini");

header("Location: " . $config['root_folder']);

?>