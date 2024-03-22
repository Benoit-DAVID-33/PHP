<?php
	ini_set('display_errors', 'on');
	require_once "includes/core/globals.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php require "includes/partials/page_head.phtml"; ?>
</head>
<body>
<main>
	<header>
		<?php require "includes/partials/page_header.phtml"; ?>
	</header>
	<nav>
		<?php require_once "includes/partials/navbar.phtml"; ?>
	</nav>
		<section id="content" class="flexcol">
			<?php
				require_once('includes/core/database/bdd.php');

				// je reviens sur la page avec une action et un id :-)
				$action = $_GET['action'] ?? 'liste';
				$id = $_GET['id'] ?? 0;

				if ($action == 'delete'){
					// J'exécute la requête de suppression de la personne :-)
					$SQLQuery = "
						DELETE FROM personne
						WHERE idpersonne = :id;
					";

					$SQLStmt = $conn->prepare($SQLQuery);
					$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
					if ($SQLStmt->execute()){
						print("Personne supprimée !");
						header('Location: lst_contacts.php');
					}else{
						print("Erreur de suppression de la personne !");
					}
				}

				// Etape 2 : Exécution de la requête
				$SQLResult = $conn->query("
					SELECT personne.id, nom, prenom, DATE_FORMAT(date_naissance, \"%d/%m/%Y\") as date_naissance, libelle_court, 
					       CONCAT_WS(' ', codepostal, ville) as ville 
					FROM personne INNER JOIN civilite ON id_civilite = civilite.id
						INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
					ORDER BY nom ASC, prenom ASC");

				// Etape 3 : Exploitation des résultats
				$mesPersonnes = $SQLResult->fetchAll(PDO::FETCH_ASSOC);

				// Etape 4 : Libération des ressources
				$SQLResult->closeCursor();
			?>
			<a href="frm_contact.php?action=add">Ajouter un nouveau contact</a>
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
					$script = '';
					foreach ($mesPersonnes as $unePersonne){
						$script .= '<tr>';
						$script .= '<td>'.$unePersonne['libelle_court'].'</td>';
						$script .= '<td><a href="visu_contact.php?id='.$unePersonne['id'].'">'.$unePersonne['nom'].'</a></td>';
						$script .= '<td>'.$unePersonne['prenom'].'</td>';
						$script .= '<td>'.$unePersonne['date_naissance'].'</td>';
						$script .= '<td>'.$unePersonne['ville'].'</td>';
						$script .= '<td><a href="frm_contact.php?action=edit&id='.$unePersonne['id'].'"><img src="public/images/edit_blue.png"></a></td>';
						$script .= '<td><a data-name="lien" href="lst_contacts.php?action=delete&id='.$unePersonne['id'].'"><img src="public/images/delete_blue.png"></a></td>';
						$script .= '</tr>';
					}
					print($script);
				?>
				</tbody>
			</table>
		</section>
	<footer>
		<?php require_once "includes/partials/footer.phtml"; ?>
	</footer>
</main>
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