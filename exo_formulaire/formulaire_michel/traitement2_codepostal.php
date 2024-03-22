<?php
    require_once 'bdd.php';
    
    $action = $_GET['action'] ?? 'add';
    $id = $_GET['id'] ?? 0;
    
    if ($action == 'add'){
        
        // Je récupère les données transmises
        $codepostal = $_POST['chCodepostal'] ?? '';
        $ville = $_POST['chVille'] ?? '';
        
        var_dump($codepostal);
        var_dump($ville);
        var_dump($_POST);
        
        // Avant d'insérer les informations dans la base
        // Je dois m'assurer qu'elles n'y existent pas déjà
        $SQLQuery = "
            SELECT  COUNT(id)
            FROM cp_ville
            WHERE codepostal = :codepostal
                AND UPPER(ville) = UPPER(:ville)
            ";
            
        $SQLStmt = $conn ->prepare($SQLQuery);
        $SQLStmt->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
        $SQLStmt->bindValue(':ville', $ville, PDO::PARAM_STR);
        $SQLStmt->execute();
        $SQLResult = $SQLStmt->fetch(PDO::FETCH_NUM);
        if ($SQLResult[0] == 0){
            
            //Le code et la ville n'existent pas je peux les insérer
            $SQLQuery = '
                INSERT INTO cp_ville(codepostal, ville)
                VALUES (:codepostal, :ville)
            ';
            $SQLStmt = $conn->prepare($SQLQuery);
            $SQLStmt->bindValue(':codepostal', $codepostal, PDO::PARAM_STR);
            $SQLStmt->bindValue(':ville', $ville, PDO::PARAM_STR);
            if ($SQLStmt->execute()){
                header('Location: formulaire.php?action=add');
            }
        }
    }