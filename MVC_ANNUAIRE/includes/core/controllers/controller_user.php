<?php

switch ($action){
    case 'login':{
        require_once "includes/core/models/daoUser.php";
        
        if (!empty($_POST)){
            $loginSaisi = $_POST['champLogin'];
            $mdpSaisi = $_POST['champMdp'];
            
            if (userExists($loginSaisi)){
                print('Mon login existe :-)');
                if (checkAuth($loginSaisi, $mdpSaisi)){
                    print("C'est bon, je suis authentifié :-)");
                    $_SESSION['login'] = $loginSaisi;
                }else{
                    $message = "Mauvaise informations d'identification !";
                }
            }else{
                $message = "Cet utilisateur n'existe pas !";
            }
        }
        
        require_once "includes/core/views/form_auth.phtml";
        break;
    }
    
    case 'logout':{
        if (isset($_SESSION['login'])){
            unset($_SESSION['login']);
            
        }
        header('location: index.php');
        break;
    }
    default:{
        
    }
}