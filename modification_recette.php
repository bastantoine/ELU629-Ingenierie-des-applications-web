<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Modifier une recette</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
			
    function formatTemps($temps) {
        $heures = intdiv($temps, 60);
        $minutes = $temps % 60;
        $time = '';
        if($heures < 10)
            $time = '0'.$heures.':';
        else
            $time = $heures.':';
        if($minutes < 10)
            $time .= '0'.$minutes;
        else
            $time .= $minutes;
        return $time;
    }

    include ("connexionpdo.php");

    $idRecette = intval($_GET["id"]);
    $idUtilisateur = $_SESSION["idUtilisateur"];

    $query = $db->query("SELECT * FROM recettes WHERE id = ".$idRecette);
    $recette = $query->fetchAll()[0];
    $query->closeCursor();

    if($recette["idAuteur"] != $idUtilisateur)
        header("Location: error_acces.php");

    ?>
    <h1>Modifier une recette</h1>	
        <form style="background-color:white;" method="post" action="script_modification_recette.php?id=<?php echo $recette["id"]; ?>">
        Nom de la recette : <input type="text" name="nom_recette" value="<?php echo $recette["nom"]; ?>"><br>
        Catégorie(s) :
        <input type="radio" name="categorie" value="entree" <?php if(intval($recette["entree"]) == 1) { echo 'checked="checked"'; } ?>> Entrée<br>
        <input type="radio" name="categorie" value="plat" <?php if(intval($recette["plat"]) == 1) { echo 'checked="checked"'; } ?>> Plat<br>
        <input type="radio" name="categorie" value="dessert" <?php if(intval($recette["dessert"]) == 1) { echo 'checked="checked"'; } ?>> Dessert<br>
        Difficulté : <select name="difficulte">
            <?php 
                for ($i=1; $i<=5;$i++){
                    if($i == $recette["difficulte"])
                        echo "<option selected='selected'>$i";
                    else
                        echo "<option>$i";
                }
            ?>
        </select><br>

        Coût : <select name="cout">
            <?php 
                for ($i=1; $i<=5;$i++){
                    if($i == $recette["cout"])
                        echo "<option selected='selected'>$i";
                    else
                        echo "<option>$i";
                }
            ?>
        </select><br>
        Temps de préparation : <input type="time" name="temps" value="<?php echo formatTemps($recette["temps"]); ?>"><br>

        <label for="ingredients">Entrez la liste des ingrédients :</label><br>
        <textarea id="ingredients" name="ingredients" rows="15" cols="50">
<?php echo $recette["ingredients"]; ?>
        </textarea><br>

        <label for="recette">Entrez la recette :</label><br>
        <textarea id="recette" name="recette" rows="25" cols="50">
<?php echo $recette["recette"]; ?>
        </textarea><br>

        <input type="submit" value="Modifier">
	</form>
</body>
</html>	