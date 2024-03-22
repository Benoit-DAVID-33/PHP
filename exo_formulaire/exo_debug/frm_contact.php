<?php
	ini_set('display_errors', 'on');
	require_once "includes/core/globals.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php require "includes/partials/page_head.phtml"; ?>
	<style>#content+footer{color: black}</style>
</head>
<body>
<main>
	<header>
		<?php require "includes/partials/page_header.phtml"; ?>
	</header>
	<nav>
		<?php require_once "includes/partials/navbar.phtml"; ?>
	</nav>
	<section id="content">
		<?php
			require_once('includes/core/database/bdd.php');

			$action = $_GET['action'] ?? 'add';
			$id = $_GET['id'] ?? 0;

			$nomPersonne = '';
			$prenomPersonne = '';
			$dateNaissancePersonne = '';
			$idCivilitePersonne = 0;
			$numRue = '';
			$nomRue = '';
			$ComplementRue = '';
			$idCodePostalPersonne = 0;
			$poidsPersonne = 0;
			$taillePersonne = 0;

			// Je récupère toutes les civilites
			$SQLQueryCiv = "SELECT id, libelle_court, libelle_long FROM civilite";

			$SQLResultCiv = $conn->query($SQLQueryCiv);
			$lesCivilites = $SQLResultCiv->fetchAll(PDO::FETCH_ASSOC);
			$SQLResultCiv->closeCursor();

			// Je récupère toutes les villes
			$SQLQueryCpv = "SELECT id, codepostal, ville FROM cp_ville LIMIT 100";

			$SQLResultCpv = $conn->query($SQLQueryCpv);
			$lesVilles = $SQLResultCpv->fetchAll(PDO::FETCH_ASSOC);
			$SQLResultCpv->closeCursor();

			if ($action == 'add'){
				// Je viens pour ajouter un contact
				// donc les champs du formulaire doivent être initialisés à vide (ou des valeurs par défaut)

			}else{
				// Je viens pour modifier un contact
				// Donc les champs doivent être initialisés aux données de la personne dans la bdd


				// Récupérer les valeurs de l'enregistrement de la personne désirée
				$SQLQuery = "
					SELECT nom, prenom, date_naissance, id_civilite, numero_rue, 
					nom_rue, complement_adresse, id_cp_ville, taille, poids 
					FROM personne 
					WHERE personne.id = :id";

				$SQLStmt = $conn->prepare($SQLQuery);
				$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
				$SQLStmt->execute();
				$unePersonne = $SQLStmt->fetch(PDO::FETCH_ASSOC);
				$SQLStmt->closeCursor();

				if (!empty($unePersonne)){ // sinon $SQLResult->rowCount() > 0
					$nomPersonne = $unePersonne['nom'];
					$prenomPersonne = $unePersonne['prenom'];
					$dateNaissancePersonne = $unePersonne['date_naissance'];
					$idCivilitePersonne = $unePersonne['id_civilite'];
					$numRue = $unePersonne['numero_rue'];
					$nomRue = $unePersonne['nom_rue'];
					$ComplementRue = $unePersonne['complement_adresse'];
					$idCodePostalPersonne = $unePersonne['id_cp_ville'];
					$poidsPersonne = $unePersonne['poids'];;
					$taillePersonne = $unePersonne['taille'];;

				}
			}
		?>

		<form action="traitement_formulaire.php?action=<?=$action?>&id=<?=$id?>" method="post" enctype="multipart/form-data">
			<header>Personne</header>
			<div>
				<span>Civilite :</span>
				<select name="cbCivilite" id="chCbCivilite">
					<option value="0">-- Sélectionner --</option>
					<?php
						foreach ($lesCivilites as $uneCivilite){
							$idCivilite = $uneCivilite['id'];
							$libelleCiv = $uneCivilite['libelle_long'];

							if ($idCivilite == $idCivilitePersonne){
								print('<option value="'.$idCivilite.'" selected>'.$libelleCiv.'</option>');
							}else{
								print('<option value="'.$idCivilite.'">'.$libelleCiv.'</option>');
							}
						}
					?>
				</select>
			</div>
			<div>
				<label for="chNom">Nom : </label>
				<input type="text" name="chNom" id="chNom" value="<?= $nomPersonne ?>" required>
			</div>
			<div>
				<label for="chPrenom">Prénom : </label>
				<input type="text" name="chPrenom" value="<?= $prenomPersonne ?>" id="chPrenom">
			</div>
			<div>
				<label for="chDateNaissance">Date de naissance :</label>
				<input type="date" namee="chDateNaissance" id="chDateNaissance" value="<?= $dateNaissancePersonne ?>">
			</div>
			<div>
				<label for="chNumeroRue">Adresse :</label><br>
				<input type="text" name="chNumeroRue" id="chNumeroRue" value="<?= $numRue ?>">
				<input type="text" name="chRue" id="chRue" value="<?= $nomRue ?>"><br>
				<input type="text" name="chComplementRue" id="chComplementRue" value="<?= $ComplementRue ?>"><br>
				<select name="cbCpville" id="cbCpville">
					<option value="0">-- Sélectionner --</option>
					<?php
						foreach ($lesVilles as $uneVille){
							$idCpville = $uneVille['id'];
							$codePostal = $uneVille['codepostal'];
							$ville = $uneVille['ville'];

							if ($idCpville == $idCodePostalPersonne){
								print('<option value="'.$idCpville.'" selected>'.$codePostal.' '.$ville.'</option>');
							}else{
								print('<option value="'.$idCpville.'">'.$codePostal.' '.$ville.'</option>');
							}
						}
					?>
				</select>
			</div>
			<div>
				<label for="chPoids">Poids :</label>
				<input type="number" name="chPoids" id="chPoids" min="0" max="200" step="1" value="<?= $poidsPersonne ?>">
			</div>
			<div>
				<label for="chTaille">Taille :</label>
				<input type="number" name="chTaille" id="chTaille" min="0" max="200" step="2" value="<?= $taillePersonne ?>">
			</div>
			<div>
				<button type="submit" class="btn btn-submit">Valider</button>
				<button type="reset" class="btn btn-cancel">Réinitialiser</button>
			</div>
		</form>
	</section>
	<footer>
		<?php require_once "includes/partials/footer.phtml"; ?>
	</footer>
	<script src="public/scripts/common_functions.js"></script>
</main>
</body>
</html>