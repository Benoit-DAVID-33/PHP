<?php
ini_set('display_errors', 'on' );
    print('Je suis dans le controller de '.$page.' pour action : '.$action.'<br>');
    
    switch ($action){
        case 'list':{
            require_once "includes/core/models/dao_contact.php";
            
           // Je connais tous les contacts : $lesContacts
           $lesContacts = getAllContacts();
            
            require_once "includes/core/views/list_contacts.phtml";
            break;
        }
        case 'view':{
            require_once "includes/core/models/dao_contact.php";
            
            $id = $_GET['id'] ?? 0;
            $unContact = getUnContact($id);
            
            
            
            
            // $unContact = getInfosContact($id);
            
            require_once "includes/core/views/view_contact.phtml";
            break;
        }
    }