<?php
    require_once 'includes/core/models/bdd.php';
    
    function userExists(string $login): bool{
        $conn = getConnexion();
        
        $SQLQuery = "
            SELECT COUNT(id) as existe
            FROM userauth
            WHERE login = :login
        ";
        
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR).
        $SQLStmt->execute();
        
        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $loginTrouve = $SQLRow['existe'];
        
        $SQLStmt->closeCursor();
        
        return ($loginTrouve > 0);
    }
    
    function checkAuth(string $login, string $mdp): bool{
        $conn = getConnexion();
        
        $SQLQuery ="
            SELECT mdp
            FROM userauth
            WHERE login = :login
        ";
        
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':login', $login, PDO::PARAM_STR).
        $SQLStmt->execute();
        
        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $motDePasseStocke = $SQLRow['mdp'];
        
        $SQLStmt->closeCursor();
        
        return (password_verify($mdp, $motDePasseStocke));
    }