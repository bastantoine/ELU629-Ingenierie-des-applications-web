<?php

echo("Step 1");
$nom = htmlentities($_POST["nom"]);
$prenom = htmlentities($_POST["prenom"]);
$email = htmlentities($_POST["email"]);
$password = hash("md5", htmlentities($_POST["password"]));

echo("Step 2");
include("../includes/connexionpdo.php");

echo("Step 3");
$query = $db->prepare("INSERT INTO utilisateurs VALUES (null,:nom,:prenom,:email,:password,:type,:etat");
echo("Step 4");
$query->bindParam('nom', $nom, PDO::PARAM_STR);
$query->bindParam('prenom', $prenom, PDO::PARAM_STR);
$query->bindParam('email', $email, PDO::PARAM_STR);
$query->bindParam('password', $password, PDO::PARAM_STR);
$query->bindParam('type', 'utilisateur', PDO::PARAM_STR);
$query->bindParam('etat', 'OK', PDO::PARAM_STR);
echo("Step 5");
try {
    echo("inside try");
    $query->execute();
} catch(Exception $e) {
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

//header("Location: ../index.php");

?>