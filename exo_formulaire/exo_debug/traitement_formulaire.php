<?php
	ini_set('display_errors', 'on');
	require_once('includes/core/database/bdd.php');

	$action = $_GET['action'] ?? 'add';
	$id = $_GET['id'] ?? 0;

	if ($action == 'add'){
		// Je dois faire un insert de mon post
		$SQLQuery = "
			INSERT INTO personne (nom, prenom, date_naissance, numero_rue, nom_rue, complement_adresse, id_civilite, id_cp_ville, taille, poids) 
			VALUES(LOWER(:nom), SUBSTRING(:prenom, 2, 2), :datenaissance, :numrue, :complement, :nomrue, :idcivilite, :idcpville, :poids, :taille)
			";



		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':nom', $_POST['chNom']);
		$SQLStmt->bindValue(':prenom', $_POST['chPreno'] ?? '');
		$SQLStmt->bindValue(':datenaissance', $_POST['chDateNaissance']);
		$SQLStmt->bindValue(':numrue', $_POST['chNumeroRue']);
		$SQLStmt->bindValue(':nomrue', $_POST['chRue']);
		$SQLStmt->bindValue(':complement', $_POST['chComplementRue']);
		$SQLStmt->bindValue(':idcivilite', $_POST['cbCivilite'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':taille', $_POST['chTaille'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':poids', $_POST['chPoids'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':idcpville', $_POST['cbCpville'], PDO::PARAM_INT);

	}else if ($action == 'edit'){
		// Je dois faire un update de mon post
		$SQLQuery = "
				UPDATE personne 
				SET nom=:nom, 
					prenom=:prenom, 
					date_naissance=:datenaissance, 
					numero_rue=:numrue, 
					nom_rue=:numrue, 
					complement_adresse=:complement, 
					id_civilite=:idcivilite, 
					taille=:poids, 
					poids=:taille,
					id_cp_ville = :idCpVille
--				WHERE id=:idpersonne
		";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':nom', $_POST['chNom']);
		$SQLStmt->bindValue(':prenom', $_POST['chPrenom']);
		$SQLStmt->bindValue(':datenaissance', $_POST['chDateNaissance']);
		$SQLStmt->bindValue(':numrue', $_POST['chNumeroRue']);
		$SQLStmt->bindValue(':complement', $_POST['chComplementRue']);
		$SQLStmt->bindValue(':idcivilite', $_POST['cbCivilite'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':taille', $_POST['chTaille'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':poids', $_POST['chPoids'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':idCpVille', $_POST['cbCpville'], PDO::PARAM_INT);
		$SQLStmt->bindValue(':idpersonne', $id, PDO::PARAM_INT);

	}

	if ($SQLStmt->execute()){
		header('Location: lst_contacts.php');
	}else{
		print('KO');
	}