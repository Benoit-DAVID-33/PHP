<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des personnes :-)</title>
	<style>
		table{
			border: solid 1px black;
			border-collapse: collapse;
		}
		th, td{
			border: solid 1px black;
		}
	</style>
</head>
<body>
	<?php
		require_once('bdd.php');

		// je reviens sur la page avec une action et un id :-)
		$action = $_GET['action'] ?? 'liste';
		$id = $_GET['id'] ?? 0;

		if ($action == 'delete'){
			// J'exécute la requête de suppression de la personne :-)
			$SQLQuery = "
				DELETE FROM personne
				WHERE id = :id;
			";

			//$conn->beginTransaction(); // Ouverture d'une transaction 
			$SQLStmt = $conn->prepare($SQLQuery);
			$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
			if ($SQLStmt->execute()){
				print("Personne supprimée !");
				header('Location: liste.php');
			}else{
				print("Erreur de suppression de la personne !");
			}
			//$conn->commitTransaction(); // Valder la perte des données définitivement

			//$conn->rollbackTransaction(); // Annuler les modification sur la base

		}


		// Etape 2 : Exécution de la requête 
		$SQLResult = $conn->query("
		SELECT personne.id, nom, prenom, DATE_FORMAT(date_naissance, \"%d/%m/%Y\") as date_naissance, libelle_court, CONCAT_WS(' ', codepostal, ville) as ville 
		FROM personne INNER JOIN civilite ON id_civilite = civilite.id
			INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
		ORDER BY nom ASC");

		// Etape 3 : Exploitation des résultats 
		$mesPersonnes = $SQLResult->fetchAll(PDO::FETCH_ASSOC);
		
		// Etape 4 : Libération des ressources
		$SQLResult->closeCursor();
	?>
	<a href="formulaire.php?action=add">Ajouter un nouveau contact</a>
	<table>
		<thead>
			<tr>
				<th>Civilité</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Date de naissance</th>
				<th>code postal - ville</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($mesPersonnes as $unePersonne){
					// Si je le fais en PHP
					//$datConvertie = date_create($unePersonne['date_naissance']);
					//$dateFr = date_format($datConvertie, 'd/m/Y');
					//print('<td>'.$dateFr.'</td>');
					
					print('<tr>');
					print('<td>'.$unePersonne['libelle_court'].'</td>');
					print('<td><a href="visu.php?id='.$unePersonne['id'].'">'.$unePersonne['nom'].'</a></td>');
					print('<td>'.$unePersonne['prenom'].'</td>');
					print('<td>'.$unePersonne['date_naissance'].'</td>');
					print('<td>'.$unePersonne['ville'].'</td>');
					print('<td><a href="formulaire.php?action=edit&id='.$unePersonne['id'].'">Modifier</a></td>');
					//print('<td><a onclick="return confirm(\'Sûr ?\');" href="liste.php?action=delete&id='.$unePersonne['id'].'">Supprimer</a></td>');
					print('<td><a name="lien" href="liste.php?action=delete&id='.$unePersonne['id'].'">Supprimer</a></td>');
					print('</tr>');
				}

				/* $script = '';
				foreach ($mesPersonnes as $unePersonne){
					$script .= '<tr>';
					$script .= '<td>'.$unePersonne['libelle_court'].'</td>';
					$script .= '<td><a href="visu.php?id='.$unePersonne['id'].'">'.$unePersonne['nom'].'</a></td>';
					$script .= '<td>'.$unePersonne['prenom'].'</td>';
					$script .= '<td>'.$unePersonne['date_naissance'].'</td>';
					$script .= '<td>'.$unePersonne['ville'].'</td>';
					$script .= '</tr>';
				}
				print($script); */
			?>
		</tbody>
	</table>
<script>
	document.querySelectorAll('[name=lien]').forEach(function(lien){
		lien.addEventListener('click', function(event){
			event.preventDefault();
			if (confirm('Certain ?')){
				location.href = event.target.getAttribute('href');
			}
		});	
	});
</script>
</body>
</html>

<!--
	Petit exercice pour finir la journée :-) 

	Créez un fichier "visu.php" qui permettra d'afficher les informations 
	d'un contact sous la forme d'une fiche par exemple : 

			Civilite : ....
			Nom : ....
			Prénom : ...
			Age : ....
			Adresse complète :
				...
				...
				.... ....

	Petite difficulté : 
		Trouvez le moyen de faire en sorte que le tableau que nous avons créé auparavant
		dispose, pour chaque personne listée, d'un lien amenant sur le fichier visu.php
		permettant ainsi de n'afficher que les informations de la personne choisie 

-->