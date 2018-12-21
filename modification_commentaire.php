<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Modifier un commentaire</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    include ("connexionpdo.php");

    $idCommentaire = intval($_GET["id"]);
    $idUtilisateur = $_SESSION["idUtilisateur"];

    $query = $db->query("SELECT commentaire.id AS idCommentaire, commentaire.commentaire, commentaire.idAuteur, recettes.nom FROM commentaire JOIN recettes ON recettes.id = commentaire.idRecette WHERE commentaire.id = ".$idCommentaire);
    $commentaire = $query->fetchAll()[0];
    $query->closeCursor();

    if($commentaire["idAuteur"] != $idUtilisateur)
        header("Location: error_acces.php");

    ?>
    <h1>Modifier un commentaire</h1>
    <form style="background-color:white;" method="post" action="script_modification_commentaire.php?id=<?php echo $commentaire["idCommentaire"]; ?>">
        Recette : <input type="text" name="nom_recette" value="<?php echo $commentaire["nom"]; ?>" readonly><br>

        <label for="commentaire">Commentaire :</label><br>
        <textarea id="commentaire" name="commentaire" rows="15" cols="50">
<?php echo $commentaire["commentaire"]; ?>
        </textarea><br>

        <input type="submit" value="Envoyer">
	</form>
</body>
</html>	