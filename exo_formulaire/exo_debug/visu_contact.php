<?php
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

			// Etape 2 : Exécution de la requête
			$id = $_GET['id'] ?? 0;

			// if (isset($_GET['id'])){
			// 	$id = $_GET['id'];
			// }else{
			// 	$id = 0;
			// }
			$SQLQuery = "
			SELECT nom, prenom,TIMESTAMPDIFF(YEAR, date_naissance, CURRENT_TIMESTAMP) as age, libelle_court, 
			CONCAT_WS(' ', numero_rue, nom_rue, COALESCE(complement_adresse, '')) as adresse, 
			CONCAT_WS(' ', codepostal, ville) as ville 
			FROM personne INNER JOIN civilite ON id_civilite = civilite.id
				INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
			WHERE personne.id = ".$id;

			$SQLResult = $conn->query($SQLQuery);

			// Etape 3 : Exploitation des résultats

			if ($SQLResult->rowCount() == 0){
				print("Personne ne répond !!");
				die();
			}

			$unePersonne = $SQLResult->fetch(PDO::FETCH_ASSOC);

			// Etape 4 : Libération des ressources
			$SQLResult->closeCursor();
		?>
		<div>
			<label for="">Civilité :</label>
			<?= $unePersonne['libelle_court'] ?>
		</div>
		<div>
			<label for="">Nom : </label>
			<?= $unePersonne['nom'] ?>
		</div>
		<div>
			<label for="">Prénom : </label>
			<?= $unePersonne['prenom'] ?>
		</div>
		<div>
			<label for="">Age : </label>
			<?= $unePersonne['age'] ?>
		</div>
		<div>
			<label for="">Adresse : </label>
			<?= $unePersonne['adresse'] ?><br>
			<?= $unePersonne['ville'] ?>
		</div>
	</section>
	<footer>
		<?php require_once "includes/partials/footer.phtml"; ?>
	</footer>
</main>
</body>
</html>