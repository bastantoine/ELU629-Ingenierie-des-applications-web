<?php

session_start();

$config = parse_ini_file("../includes/config.ini");

$name = $_POST['name'];
$password = $_POST['password'];

$_SESSION['connected'] = false;
$_SESSION['admin'] = false;

include("../includes/connect_database.inc.php");

$query = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
$query->execute(array(":pseudo" => $name));
$data = $query->fetchAll()[0];
$query->closeCursor();

if($data["pseudo"] == $name & $data["password"] == $password){
    $_SESSION['connected'] = true;
    $_SESSION['name'] = $data['name'];
    $_SESSION['id'] = $data['id'];
}

if($data["is_admin"] == "1") {
    $_SESSION['admin'] = true;
}

header("Location: " . $config['root_folder']);

?>