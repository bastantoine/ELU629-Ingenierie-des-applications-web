<?php

function updateTypeUtilisateur($idUtilisateur) {

    function setTypeUtilisateur($type, $idUtilisateur) {
        $query = $db->query("UPDATE utilisateurs SET type = ".$type." WHERE id = ".$idUtilisateur);
        $query->closeCursor();
        $_SESSION["type"] = $type;
    }
    
    $typeActuel = $_SESSION["type"];
        
    $idUtilisateur = $_SESSION["idUtilisateur"];
    
    $query = $db->query("SELECT COUNT(id) AS nbRecettes FROM recettes WHERE idAuteur = ".$idUtilisateur);
    $nbRecettes = $query->fetchAll()[0]["nbRecettes"];
    $query->closeCursor();
    
    $query = $db->query("SELECT COUNT(id) AS nbCommentaires FROM commentaires WHERE idAuteur = ".$idUtilisateur);
    $nbCommentaires = $query->fetchAll()[0]["nbCommentaires"];
    $query->closeCursor();
    
    if($nbRecettes > 0)
        setTypeUtilisateur("contributeur", $idUtilisateur);
    elseif($nbCommentaires > 0)
        setTypeUtilisateur("commentateur", $idUtilisateur);
    else
        setTypeUtilisateur("utilisateur", $idUtilisateur);

}

?>