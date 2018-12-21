<?php

// Auteurs : Paul & Guillaume

session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Modifier une recette</title>
</head>
<body>
    <?php include("includes/navigation.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                
                    include("includes/connexionpdo.php");
                
                    $idRecette = intval($_GET["id"]);
                    $idUtilisateur = intval($_SESSION["idUtilisateur"]);
                
                    $query = $db->query("SELECT * FROM recettes WHERE id = ".$idRecette);
                    $recette = $query->fetchAll()[0];
                    $query->closeCursor();
                
                    if($recette["idAuteur"] != $idUtilisateur)
                        header("Location: error_acces.php");
                
                ?>
                <h1>Modifier une recette</h1>
                <form method="post" action="scripts/script_modification_recette.php?id=<?php echo $recette["id"]; ?>">
                    <div class="form-group row">
                        <label for="nom_recette" class="col-lg-3 col-form-label">Nom de la recette</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="nom_recette" id="nom_recette" value="<?php echo $recette["nom"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categorie" class="col-lg-3 col-form-label">Catégorie</label>
                        <div class="col-lg-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="entree" name="categorie" value="entree" <?php if(intval($recette["entree"]) == 1) { echo 'checked="checked"'; } ?>>
                                <label class="form-check-label" for="entree">Entrée</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="plat" name="categorie" value="plat" <?php if(intval($recette["plat"]) == 1) { echo 'checked="checked"'; } ?>>
                                <label class="form-check-label" for="plat">Plat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="dessert" name="categorie" value="dessert" <?php if(intval($recette["dessert"]) == 1) { echo 'checked="checked"'; } ?>>
                                <label class="form-check-label" for="dessert">Dessert</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="difficulte" class="col-lg-3 col-form-label">Difficulté</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="difficulte">
                            <?php 
                                for ($i=1; $i<=5;$i++){
                                    if($i == $recette["difficulte"])
                                        echo "<option selected='selected'>$i";
                                    else
                                        echo "<option>$i";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cout" class="col-lg-3 col-form-label">Coût</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="cout">
                            <?php 
                                for ($i=1; $i<=5;$i++){
                                    if($i == $recette["cout"])
                                        echo "<option selected='selected'>$i";
                                    else
                                        echo "<option>$i";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="temps" class="col-lg-3 col-form-label">Temps de préparation</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="time" name="temps" value="<?php echo formatTemps($recette["temps"]); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ingredients" class="col-lg-3 col-form-label">Entrez la liste des ingrédients</label>
                        <div class="col-lg-9">
                        <textarea class="form-control" id="ingredients" name="ingredients" rows="5"><?php echo $recette["ingredients"]; ?></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="recette" class="col-lg-3 col-form-label">Entrez la recette</label>
                        <div class="col-lg-9">
                        <textarea class="form-control" id="recette" name="recette" rows="5"><?php echo $recette["recette"]; ?></textarea>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-9">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>	