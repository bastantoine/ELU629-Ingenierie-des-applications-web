<?php

// Auteurs : Bastien & Pierre-Adrien

session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Rechercher</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form class="form-inline" method="post">
					<label for="recherche">Rechercher</label>
					<input class="form-control" type="text" name="recherche" id="recherche" <?php if(isset($_POST)) { echo 'value="'.$_POST["recherche"].'"'; } ?>">
					<button type="submit" class="btn btn-primary">Rechercher</button>
				</form>
			</div>
		</div>
		<div class="row">
				<?php
					include("includes/connexionpdo.php");
					if(isset($_POST) && isset($_POST["recherche"])) {
						$query = $db->prepare("SELECT id, nom, recette FROM recettes WHERE nom LIKE :nom");
						$query->bindValue("nom", "%" . $_POST["recherche"] . "%");
						$query->execute();
						while($data = $query->fetch()) {
							echo '<div class="col-lg-4">';
								echo '<p><h3><a href="recette.php?id='.$data["id"].'">'.$data["nom"].'</a></h3>';
								echo substr(str_replace(array("\r\n", "\n", "\r"),'<br />' ,$data["recette"]), 0, 100).'</br></p>';
							echo '</div>';
						}
					}
					$query->closeCursor();
				?>
			</div>
		</div>
	</div>
</body>
</html>