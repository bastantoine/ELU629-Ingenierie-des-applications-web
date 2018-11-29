<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $config['root_folder']; ?>">
        <span class="navbar-text">Les daleux</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="<?php echo $config['root_folder']; ?>">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo $config['root_folder']; ?>recettes.php">Recettes</a></li>
            <?php if(!isset($_SESSION['connected']) || $_SESSION['connected'] == false) { ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $config['root_folder']; ?>connexion.php">Connexion</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $config['root_folder']; ?>scripts/logout.script.php">Déconnexion</a></li>
            <?php } ?>
            <?php if($_SESSION['admin'] == true) { ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $config['root_folder']; ?>admin">Administration</a></li>
            <?php } ?>
        </ul>
        <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) { ?>
            <span class="navbar-text">
                Bienvenue <?php echo $_SESSION['name']; ?>
            </span>
        <?php } ?>
    </div>
</nav>