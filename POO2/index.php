<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		require_once "Serpent.php";
		require_once "Autruche.php";
		require_once "Kangourou.php";
		require_once "Dauphin.php";
		require_once "Marsupilami.php";

		$unSerpent = new Serpent('Père Siffleur', '12/08/1998', 'Vert');

		$uneAutruche = new Autruche('Bernard', '21/07/2001', 'Noire');

		$unKangourou = new Kangourou('Skippy', '14/09/2004', 'Roux');

		$unDauphin = new Dauphin('Flipper', '12/04/1952', 'Bleu');

		$unMarsupilami = new Marsupilami('Houba', '15/05/2005', 'Jaune et Noir');

		print($unSerpent->seDeplacer_V2());
		print('<br>');
		print($uneAutruche->seDeplacer_V2());
		print('<br>');
		print($unKangourou->seDeplacer_V2());
		print('<br>');
		print($unDauphin->seDeplacer_V2());
		print('<br>');
		print($unMarsupilami->seDeplacer_V2());
		print('<br>');
		/* 
			A vous de compléter pour que le code suivant soit fonctionnel
		*/
		print($uneAutruche->getNom().'<br>');
		print($unKangourou->getDateArrivee().'<br>');
		print($unKangourou->getCouleurPoils().'<br>');
		print($unSerpent->getCouleurEcailles().'<br>');


		/* Le type d'un objet : 
			get_class($objet) : renvoie le nom de la classe de l'objet 
			instanceof : $kangourou instanceof Serpent : vérifie que l'objet est du type Classe
			is_a($objet, 'nomClasse') : permet de savoir si $objet est du type nomClasse
			Classe::class : renvoie le nom d'une classe au format chaine de caractère
		*/
		/*print(get_class($unKangourou));
		print('<br>');
		print(is_a($unKangourou, Kangourou::class));
		print('<br>');
		print($unKangourou instanceof Kangourou);*/

		$unSerpent2 = new Serpent('Père Siffleur', '12/08/1998', 'Vert');

		// __toString() : Transformer un objet un chaîne de caractères
		// __equals() : permet de personaliser la comparaison entre 2 objets 
		// __clone()
		// __compareTo() 


		print($unSerpent.'<br>');
		print($unSerpent2.'<br>');

		if ($unSerpent === $unSerpent2){
			print('Nous sommes jumeaux !');
		}else{
			print('Non, nous le sommes pas !');
		}

		print('<br>');

		$unSerpent3 = $unSerpent2;
		$unSerpent3->setNom('Serpentar');
		print($unSerpent2.'<br>');
	?>
</body>
</html>