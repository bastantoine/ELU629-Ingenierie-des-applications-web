<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Ajouter une recette</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Ajouter une recette</h1>	
  <form>
	Nom de la recette : <input type="text" name="nom_recette"><br>
	Catégorie(s) :<br>
		    <input type="checkbox" name="entrée" id="entrée">
		    <label for="entrée">Entrée</label><br>
		    <input type="checkbox" name="plat" id="plat">
                    <label for="plat">Plat</label><br>
                    <input type="checkbox" name="dessert" id="dessert">
                    <label for="dessert">Dessert</label><br>
		    	

	Difficulté : <select name="difficulte">
		     <?php 
		             for($i=1; $i<=5;$i++){
				echo "<option>$i";
				}
			?>
		     </select><br>
	Coût : <select name="difficulte">
		     <?php 
		             for($i=0; $i<=5;$i++){
				echo "<option>$i";
				}
			?>
		    </select><br>
	Temps de préparation : <input type="time" name="temps" edge><br>
        <label for="ingredients">Entrez la liste des ingrédients :</label><br>


        <textarea id="ingredients" name="ingredients"
          rows="15" cols="50" placeholder="Veuillez entrer la liste des ingrédients sous cette forme :
          - 500g de fraises
          - 100g de sucre 
          - ect ...">
          
        </textarea><br>
        <label for="recette">Entrez la recette :</label><br>


        <textarea id="recette" name="recette"
          rows="25" cols="50" placeholder="Veuillez entrer la liste des instructions">
          
        </textarea><br>
	
	Photo de la recette : <input type="file" name="photo" accept="image/png, image/jpeg"><br>
	<input type="submit" value="Envoyer">
  </form>
</body>
</html>
