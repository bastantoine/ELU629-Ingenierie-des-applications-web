<?php

    // Auteurs : Bastien & Pierre-Adrien

    session_start();
    if(!isset($_SESSION["connecte"]) || $_SESSION['connecte'] == false || $_SESSION["type"] != "admin"){
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="fr">
<head>
	<?php include("includes/header.php"); ?>
	<title>Administration</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <h1>Liste des utilisateurs</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            include("includes/connexionpdo.php");
                            $query = $db->query("SELECT id, nom, prenom, email, type FROM utilisateurs");
                            while($utilisateur = $query->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $utilisateur["nom"]; ?></td>
                                    <td><?php echo $utilisateur["prenom"]; ?></td>
                                    <td><?php echo $utilisateur["email"]; ?></td>
                                    <td><?php echo $utilisateur["type"]; ?></td>
                                    <td><a href="modification_utilisateur.php?id=<?php echo $utilisateur["id"]; ?>">Modifier</a></td>
                                    <td><a href="scripts/script_supression_utilisateur.php?id=<?php echo $utilisateur["id"]; ?>">Supprimer</a></td>
                                </tr>
                                <?php
                            }
                            $query->closeCursor();
                        ?>
                    </tbody>
                </table>
            </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
                <h1>Liste des recettes</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Auteur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $query = $db->query("SELECT recettes.nom AS nomRecette, utilisateurs.nom AS nomUtilisateur, utilisateurs.prenom FROM recettes JOIN utilisateurs ON recettes.idAuteur = utilisateurs.id");
                            while($recette = $query->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $recette["nomRecette"]; ?></td>
                                    <td><?php echo $recette["prenom"]." ".$recette["nomUtilisateur"]; ?></td>
                                </tr>
                                <?php
                            }
                            $query->closeCursor();
                        ?>
                    </tbody>
                </table>
            </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
                <h1>Liste des commentaires</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Auteur</th>
                            <th>Date</th>
                            <th>Commentaire</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = $db->query("SELECT commentaire.id, commentaire.commentaire, commentaire.date, utilisateurs.nom, utilisateurs.prenom FROM commentaire JOIN utilisateurs ON commentaire.idAuteur = utilisateurs.id");
                            while($commentaire = $query->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $commentaire["prenom"]." ".$commentaire["nomUtilisateur"]; ?></td>
                                    <td><?php echo $commentaire["date"]; ?></td>
                                    <td><?php echo substr($commentaire["commentaire"], 0, 10); ?></td>
                                    <td><a href="modification_commentaire.php?id=<?php echo $commentaire["id"]; ?>">Modifier</a></td>
                                    <td><a href="scripts/script_suppression_commentaire.php?id=<?php echo $commentaire["id"]; ?>">Supprimer</a></td>
                                </tr>
                                <?php
                            }
                            $query->closeCursor();
                        ?>
                    </tbody>
                </table>
            </div>
		</div>
	</div>
</body>
</html>