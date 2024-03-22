<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mon Ecole</title>
</head>
<body>
	<?php
		require_once "Directeur.php";
		require_once "Surveillant.php";
		require_once "Etudiant.php";
		require_once "Professeur.php";
		require_once "Ecole.php";

		$unDirecteur = new Directeur('BOSS', 'Hugo', '2009-10-10');

		print('<pre>');
		print_r($unDirecteur);
		print('</pre>');

		$unSurveillant = new Surveillant('PECOLTRAN', 'Rosco', 12);

		print('<pre>');
		print_r($unSurveillant);
		print('</pre>');

		$uneEtudiante = new Etudiant('DUKE', 'Daisy', '1985-12-15');
		$unEtudiant = new Etudiant('DUKE', 'Boe', '1988-08-18', 'Quel étudiant brillant !');
		

		print('<pre>');
		print_r($uneEtudiante);
		print_r($unEtudiant);
		print('</pre>');

		$unProfesseur = new Professeur('DUKE', 'Uncle', 57, array('Chasse', 'Pêche', 'Metallurgie'));
		
		$unProfesseur->setMatiere('Tir au pigeon');
		$unProfesseur->setMatiere('Crochet', 2);
		$unProfesseur->setMatiere('Crêperie');
		print('<pre>');
		print_r($unProfesseur);
		print('</pre>');


		// $tab = array('Janvier', 'Fevrier', 'Mars');
		// print(join(',', $tab));

		// $phrase = "DOE,John,2005-12-25,Physique,Maths,Allemand";
		// $tab = explode(',', $phrase);
		// var_dump($tab);

		print($unSurveillant);
		print($unDirecteur);
		print($uneEtudiante);
		print($unEtudiant);
		print($unProfesseur);

		/*
		pour un étudiant : Je m'appelle {nom prénom}, j'ai {age} ans.
		pour un prof : Je m'appelle {nom, prenom}, j'enseigne {matieres}
		pour un directeur : Je m'appelle {nom, prenom}, je suis directeur depuis {annees anciennete}
		Surveillant : Je m'appelle {nom, prenom}, je surveille depuis {anciennete} mois
		*/
		//$monEcole->setDirecteur($unDirecteur);

		//print($monEcole);

		// Doit afficher : Ecole : AVASchool, mon directeur : Hugo BOSS embauché le 10/10/2009

		/*

		*/
		$monEcole = new Ecole('AVASchool');

		$unNouveauDirecteur = new Directeur('MUSK', 'Elon', '2005-05-12');
		$monEcole->setDirecteur($unNouveauDirecteur);

		$unAutreProf = new Professeur('BROWN', 'Emmet', 999, array('Physique Quantique', 'Convection Temporelle'));
		$monEcole->setProfesseurs(array($unProfesseur, $unAutreProf));
		$monEcole->setEtudiants(array($uneEtudiante, $unEtudiant)); 

		print($monEcole);
		/*
			Doit afficher : 
				Ecole : AVASchool 
				Mon Directeur : Nom Prenom
				J'ai nombreprof professeurs 
				J'ai nombreetudiants etudiants
		*/

	?>
</body>
</html>