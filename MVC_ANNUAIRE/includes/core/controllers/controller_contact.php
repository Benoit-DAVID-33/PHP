<?php
	
	switch ($action){
		case 'list':{
			require_once "includes/core/models/daoContacts.php";

			$lesContacts = getAllContacts();

			require_once "includes/core/views/liste_contacts.phtml";
			break;
		}
		case 'view':{

			break;
		}
		case 'edit':{
			require_once "includes/core/models/daoContacts.php";
			require_once "includes/core/models/daoCivilites.php";
			require_once "includes/core/models/daoCpVilles.php";
			$id = $_GET['id'];
			if (empty($_POST)){
				
				// ie doit récuperer les infos
				$unePersonne = getContactById($id);
				
			}else{
				$unePersonne = new Personne(
					$_POST 
					);
					
					udapteContact($unePersonne);
				
			}
			$lesCivilites = getAllCivilites();

			$lesCpVilles = getAllCpVilles();
			require_once "includes/core/views/form_contact.phtml";
			
			break;
		}
		case 'delete':{
		
			break;
		}
		case 'add':{
			require_once "includes/core/models/daoContacts.php";
			require_once "includes/core/models/daoCivilites.php";
			require_once "includes/core/models/daoCpVilles.php";
			if (empty($_POST)){
				// J'arrive sur le formulaire
				$unePersonne = new Personne();
				
			}else{
				// Je viens de valider le formulaire : j'ai cliqué sur Submit
				$unePersonne = new Personne(
					$_POST['chNom'],
					$_POST['chPrenom'],
					date_create($_POST['chDateNaissance']),
					$_POST['chNumRue'],
					$_POST['chNomRue'],
					getCiviliteById($_POST['cbCivilite']),
					getCpVilleById($_POST['chCpVille']),
					intval($_POST['chTaille']),
					intval($_POST['chPoids']),
					$_POST['chComplementAdresse']
				);

				if (insertContact($unePersonne)){
					header('Location: ?page=contact&action=list');
				}else{
					$message = "Erreur d'enregistrement !";
				}
			}
			$lesCivilites = getAllCivilites();

			$lesCpVilles = getAllCpVilles();

			require_once "includes/core/views/form_contact.phtml";
			break;
		}
		default:{

		}
	}