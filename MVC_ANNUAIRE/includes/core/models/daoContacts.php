<?php

	require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/Personne.php";

	//Fonction qui exécute le SELECT ... FROM contacts et renvoie le résultat sous la forme attendue
	function getAllContacts(): array{
		$conn = getConnexion();

		$SQLQuery = "SELECT p.id, p.nom, p.prenom, p.date_naissance, p.numero_rue, p.nom_rue, p.taille, p.poids, p.complement_adresse ,
				civ.libelle_court, civ.libelle_long, cpv.codepostal, cpv.ville 
			FROM personne p INNER JOIN civilite civ ON p.id_civilite = civ.id
				INNER JOIN cp_ville cpv ON p.id_cp_ville = cpv.id;";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listePersonnes = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			//new Personne('BONHEUR', 'Gontrand', date_create('1982-05-12'), '13', 'Rue de la chance', $civiliteM, $villeBordeaux, 127, 87, 'En haut du coffre fort');
			$unePersonne = new Personne($SQLRow['nom'], $SQLRow['prenom'], date_create($SQLRow['date_naissance']), $SQLRow['numero_rue'],
				$SQLRow['nom_rue'], new Civilite($SQLRow['libelle_court'], $SQLRow['libelle_long']), new Cpville($SQLRow['codepostal'], $SQLRow['ville']), 
				$SQLRow['taille'], $SQLRow['poids'], $SQLRow['complement_adresse']);
			
			$unePersonne->setId($SQLRow['id']);

			$listePersonnes[] = $unePersonne;

			// Pour seconde solution possible
			//$listePersonnes[] = new Personne() .....
			//$listePersonnes[count($listePersonnes) - 1]->setId();
				
		}

		$SQLStmt->closeCursor();

		return $listePersonnes;
	}

	function insertContact(Personne $newPersonne): bool {
		// INSERT DANS LA BDD 
		$conn = getConnexion();

		$SQLQuery = "INSERT INTO personne(nom, prenom, date_naissance, numero_rue, nom_rue, taille, 
		poids, complement_adresse, id_cp_ville, id_civilite)
		VALUES (:nom, :prenom, :date_naissance, :numero_rue, :nom_rue, :taille, 
		:poids, :complement_adresse, :id_cp_ville, :id_civilite)";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':nom', $newPersonne->getNom(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':prenom', $newPersonne->getPrenom(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':date_naissance', $newPersonne->getDateNaissance()->format('Y-m-d'), PDO::PARAM_STR);
		$SQLStmt->bindValue(':numero_rue', $newPersonne->getNumRue(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':nom_rue', $newPersonne->getNomRue(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':taille', $newPersonne->getTaille(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':poids', $newPersonne->getPoids(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':complement_adresse', $newPersonne->getComplementRue(), PDO::PARAM_STR);
		$SQLStmt->bindValue(':id_cp_ville', $newPersonne->getCpVille()->getId(), PDO::PARAM_INT);
		$SQLStmt->bindValue(':id_civilite', $newPersonne->getCivilite()->getId(), PDO::PARAM_INT);

		if (!$SQLStmt->execute()){
			return false;
		}else{
			return true;
		}
	}
		
		
		
	function getContactById(int $id){
		require_once "includes/core/models/daoCivilites.php";
		require_once "includes/core/models/daoCpVilles.php";
		$conn = getConnexion();
		
		
		$SQLQuery = "SELECT p.id, nom, prenom, date_naissance, numero_rue, nom_rue, taille, poids, complement_adresse, id_cp_ville, id_civilite, libelle_court, libelle_long, codepostal, ville
			FROM personne p INNER JOIN civilite civ ON p.id_civilite = civ.id
				INNER JOIN cp_ville cpv ON p.id_cp_ville = cpv.id
			WHERE p.id = :id";
		
		
		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$unePersonne = new Personne($SQLRow['nom'], $SQLRow['prenom'], date_create($SQLRow['date_naissance']), $SQLRow['numero_rue'], $SQLRow['nom_rue'],
		getCiviliteById($SQLRow['id_civilite']), getCpVilleById($SQLRow['id_cp_ville']), $SQLRow['taille'], 
		$SQLRow['poids'], $SQLRow['complement_adresse']);
		$unePersonne->setId($SQLRow['id']);
			 
		$SQLStmt->closeCursor();
		return $unePersonne;
	}
	
              //SET
              //    nom = '$nom', prenom = '$prenom', date_naissance = '$dateNaissance', numero_rue = '$numRue', nom_Rue = '$nomRue',
              //    taille = '$taille', poids = '$poids', complement_adresse = '$complementAdresse', id_cp_ville= '$idCpVille', 
              //WHERE personneID = '$personneID' ";
    //$db->exec($query);
	
	
