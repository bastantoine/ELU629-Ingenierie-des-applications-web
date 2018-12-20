<ul>
    <li><a class="active" href="index.php">Accueil</a></li>
    <li><a class="active" href="search.php">Rechercher</a></li>
    <li><a class="active" href="#entree">Entrée</a></li>
    <li><a class="active" href="#plats">Plats</a></li>
    <li><a class="active" href="#dessert">Dessert</a></li>
    <li><a class="active" href="contact_us.php">Contactez nous</a></li>
    <?php if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
        echo "<li><a class='active' href='page_perso.php'>Bienvenue ".$_SESSION['prenom']." ".$_SESSION['nom']."</a></li>";
        if($_SESSION["type"] == "admin")
            echo "<li><a class='active' href='admin.php'>Interface d'administration</a></li>";
        echo "<li><a class='active' href='script_deconnexion.php'>Déconnexion</a></li>";
    } ?>
</ul>