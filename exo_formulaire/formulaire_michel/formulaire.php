<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Formulaire</title>
	<link rel="stylesheet" href="includes/css/styles_form.css">
</head>
<body>
	<?php

		// Je suis arrivé sur le formulaire, que dois-je faire ?
		// print_r($_GET);

		// Si vous ne voulez pas aller plus dans le cas ou l'action n'est pas définie
		// if (empty($_GET)){
		// 	print('Erreur');
		// 	die();
		// }

		//Sinon, on défini une action par défaut : ajout d'un contact
		$action = $_GET['action'] ?? 'add';
		$id = $_GET['id'] ?? 0;

		$nomPersonne = '';
		$prenomPersonne = '';
		$dateNaissancePersonne = '';
		$idCivilite = 0;
		$libelleCivilite = '';
		$numRue = '';
		$nomRue = '';
		$ComplementRue = '';
		$idCodePostalPersonne = 0;
		$poidsPersonne = 0;
		$taillePersonne = 0;
		
		//Je dois donc 
		// Me connecter à la bdd
		require_once('bdd.php');
		
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
				SELECT nom, prenom, date_naissance, id_civilite, libelle_court, numero_rue, 
				nom_rue, complement_adresse, id_cp_ville, taille, poids 
				FROM personne INNER JOIN civilite ON personne.id_civilite = civilite.id
					INNER JOIN cp_ville ON personne.id_cp_ville = cp_ville.id
				WHERE personne.id = :id";

			//$SQLResult = $conn->query($SQLQuery);
			//$unePersonne = $SQLResult->fetch(PDO::FETCH_ASSOC);
			//$SQLResult->closeCursor();

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
				$libelleCivilite = $unePersonne['libelle_court'];
				$numRue = $unePersonne['numero_rue'];
				$nomRue = $unePersonne['nom_rue'];
				$ComplementRue = $unePersonne['complement_adresse'];
				$idCodePostalPersonne = $unePersonne['id_cp_ville'];
				$poidsPersonne = $unePersonne['poids'];;
				$taillePersonne = $unePersonne['taille'];;
		
			}

			// Remplir les champs avec
			// print_r($unePersonne);
			// print_r($lesCivilites);


			/*
				Petit exercice de digestion 

					Ajouter sur le formulaire les informations nécessaires 
					a la gestion de l'adresse postale de chaque contact : 
						Numéro de rue
						Rue
						Complément 
						Code Postal
						Ville

					:-)

					Adapter la bdd et le code pour intégrer le poids et la taille
					Ces champs sont obligatoires avec un minimum de 10 pour le poids 
					et 53 pour la taille 
			*/
		}

	?>
	<main>
		<form action="traitement_formulaire.php?action=<?=$action?>&id=<?=$id?>" method="post" enctype="multipart/form-data">
			<header>Personne</header>
			<div>
				<span>Civilite :</span>
				<!--<div class="radios"><input type="radio" name="rdCivilite" value="1" id="rdMme" <?= $idCivilite == 1 ? 'checked' : '' ?>><label for="rdMme">Madame</label></div>
				<div class="radios"><input type="radio" name="rdCivilite" value="2" id="rdM" <?= $idCivilite == 2 ? 'checked' : '' ?>><label for="rdM">Monsieur</label></div>-->
				<select name="cbCivilite" id="chCbCivilite">
					<option value="0">-- Sélectionner --</option>
					<?php
						foreach ($lesCivilites as $uneCivilite){
							$idCivilite = $uneCivilite['id'];
							$libelleCiv = $uneCivilite['libelle_long'];²

							//$selected = ($idCivilite == $idCivilitePersonne ? 'selected' : '');
							//print('<option value="'.$idCivilite.'" '.$selected.'>'.$libelleCiv.'</option>');

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
				<input type="date" name="chDateNaissance" id="chDateNaissance" value="<?= $dateNaissancePersonne ?>">
			</div>
			<div>
				<label for="chNumeroRue">Adresse :</label><br>
				<input type="text" name="chNumeroRue" id="chNumeroRue" value="<?= $numRue ?>">
				<input type="text" name="chRue" id="chRue" value="<?= $nomRue ?>"><br>
				<input type="text" name="chComplementRue" id="chComplementRue" value="<?= $ComplementRue ?>"><br>
				<select name="cbCpville" id="cbCpville">
					<option value="0">--Sélectionner--</option>
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
				<button type="button" id="btn">--Sélectionner codepostal--</button>
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
				<button type="submit">Valider</button>
				<button type="reset">Réinitialiser</button>
			</div>
		</form>
	</main>
<script>
	function submit(){

	}

	const btn = document.getElementById('btn');
	btn.addEventListener('click', function(event){
		console.log(event);
			event.preventDefault();
				window.location.href="./formulaire2_codepostal.php";
	});
	
	document.querySelector('#chPrenom').addEventListener('blur', function(){
		this.value = this.value[0].toUpperCase() + this.value.slice(1).toLowerCase();
	});
	
	document.querySelector('form').addEventListener('submit', function(event){
		event.preventDefault();
		
		if (verifForm()){
			this.submit();
		}else{
			alert('Vous be respectez pas les règles !');
		}
	});
	
	function verifForm(){
		let retVal = false;
		
		// je dois vérifier que la date saisie est bien antérieur à la date actuelle
		let dateJour = new Date();
		
		let dateSaisie = document.querySelector('#chDateNaissance').value;
		let dateFormatee = new Date(dateSaisie);
		
		if (dateJour < dateFormatee){
			retVal = false;
			alert('Erreur sur la date !');
		}else{
			retVal = true;
		}
		
		//Je dois vérifier que la civilite a bien été sélectionnéelse
		
		// Idem pour le cpville
		
		return retVal;
</script>
</body>
</html>

<?php 
	/*
	Petits exercices de digestion : 

		1 - 
		Ajoutez sur le formulaire un bouton qui permet
		d'accéder à un autre formulaire pour ajouter un code postal ville
		dans la base de données

		Attention : 
		Vous ne pouvez pas enregistrer un code postal / ville déjà existant !!!

		2 - 
		En JS ou en HTML (a vous de choise) :
		Faire en sorte que :
			- Un nom de contact soit toujours renseigné et en majuscule
			- Un prénom soit toujours renseigné en Initcap 
			- Une date de naissance ne peut être postérieure à la date du jour
			- Que les champs obligatoires soient renseignés 

		

	*/