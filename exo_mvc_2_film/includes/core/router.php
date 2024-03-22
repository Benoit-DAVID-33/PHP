<?php

    /*
        ?page=...&action=...&id=...
    
        page : Permettra de définir la section (ou page) à laquelle on veut accéder 
        action : Permettre de définir l'action à effectuer sur cette section
        Le reste sera spécifique pour chaque section / action
        
        page : par défaut : index
        action : par defaut : view
    */
    
    print('Je suis sur le routeur<br>');
    
    $page = $_GET['page'] ?? 'index';
    $action = $_GET['action'] ?? 'view';
    
    print('<pre>');
    print_r($_GET);
    print('</pre>');
    
    switch ($page){
        case 'index':{
            require_once("includes/core/controllers/controller.php");
            break;
        }
        case 'contact':{
            require_once("includes/core/controllers/controller_contact.php");
            break;
        }
        case 'cpville';{
            require_once("includes/core/controllers/controller_cpville.php");
            break;
        }
        default:{
            require_once("includes/core/controllers/controller_error.php");
        }
    }
    
