<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Ajouter un commentaire</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Ajouter un commentaire</h1>
	<?php

		include("connexionpdo.php");

		$idRecette = intval($_GET["idRecette"]);

		$query = $db->query("SELECT nom FROM recettes WHERE id = ".$idRecette);
		$nomRecette = $query->fetchAll()[0]["nom"];
		$query->closeCursor();

	?>
	<form style="background-color:white;" method="post" action="script_ajout_commentaire.php?idRecette=<?php echo $idRecette; ?>">
	Nom de la recette : <input type="text" name="nom_recette" value="<?php echo $nomRecette; ?>" readonly><br>

	<label for="commentaire">Commentaire :</label><br>
	<textarea id="commentaire" name="commentaire" rows="15" cols="50">
Veuillez entrer votre commentaire
	</textarea><br>

	<input type="submit" value="Envoyer">
	</form>
</body>
</html>	