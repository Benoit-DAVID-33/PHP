<?php

    // C'est ici que je me connecte
    // et que j'exécute les requêtes
    
    require_once "includes/core/models/bdd.php";
    
    function getAllContacts(){
        // JE récupère TOUS les contacts
        $conn = getConnexion();
        $SQLQuery = "
        SELECT personne.id, nom, prenom, 
            DATE_FORMAT(date_naissance, \"%d/%m/%Y\") as date_naissance,
            libelle_court, CONCAT_WS(' ', codepostal, ville) as ville
        FROM personne INNER JOIN civilite ON id_civilite = civilite.id
            INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
        ORDER BY nom ASC, prenom ASC";
                    
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->execute();
                
        $retVal = $SQLStmt->fetchAll(PDO::FETCH_ASSOC);
                
        $SQLStmt->closeCursor();
        return $retVal;
        
    }
    
    function getUnContact($idContact){
        $conn = getConnexion();
        // Je récupère un contact
        $SQLQuery = "
            SELECT nom, prenom, TIMESTAMPDIFF(YEAR, date_naissance, CURRENT_TIMESTAMP) as age,
            libelle_court,
            CONCAT_WS(' ', numero_rue, nom_rue, COALESCE(complement_adresse, '')) as adresse,
            CONCAT_WS(' ', codepostal, ville) as ville
            FROM personne INNER JOIN civilite ON id_civilite = civilite.id
                INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
            WHERE personne.id = :id";
        $SQLStmt= $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $idContact, PDO::PARAM_INT);
        $SQLStmt->execute();
        $retVal = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $SQLStmt->closeCursor();
        return $retVal;
    }
    
    
    
    
  