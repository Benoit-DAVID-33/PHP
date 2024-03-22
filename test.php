<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.div1{
			color: red;
		}
	</style>
</head>
<body>
	<?php 
		// variable 
		$uneVariable = 'chaine dde caractères';
		$uneAutreVariable = "Une autre chaine";
		$uneVariableNumerique = 32.52;


		$jour = date('d');
		$mois = date('m');
		$annee = date('Y');

		$dateComplete = $jour.'/'.$mois.'/'.$annee;

		$dateComplete2 = "$jour/$mois/$annee";

		echo $dateComplete.'<br>';
		echo $dateComplete2;
		
	?>

	<h1>
		Ceci est le titre de mon site et nous somme le <?= date('d/m/Y'); ?> !
	</h1>

	<ul>
	<?php
		echo '<li class="lejour">'.$jour.'</li>';
		echo '<li>'.$mois.'</li>';
		echo '<li>'.$annee.'</li>';
	?>
	</ul>

	<ul>
	<?php
		$script = '<li class="lejour">'.$jour.'</li>';
		$script .= '<li>'.$mois.'</li>';
		$script .= '<li>'.$annee.'</li>';

		echo $script;
	?>
	</ul>

	<p>
		<?php 
			// A NE PAS REPRODUIRE !!!!!
			// Que fait ce code ? 
			$rouge = 'verte';
			$pomme = 'rouge';

			echo 'La pomme est '.$$pomme; // $'rouge'
		?>
	</p>

	<?php 
		// Un premier tableau 
		$tab1[0] = 'Maurane';
		$tab1[1] = 'Fawsy';
		$tab1[] = 'Thibault';

		// Initialiser un tableau sans indice
		$tab2[] = '3WA';
		$tab2[] = 'EPSI';

		// Tableau associatif
		$personne['nom'] = 'DUCK';
		$personne['prenom'] = 'Donald';
		$personne[] = 75;

		echo $tab1;
		print $tab1;

		// A utiliser uniquement pour le débuggage 
		print('<pre>');
		print_r($personne);
		print('</pre>');

		var_dump($personne);

		// Afficher le nombre d'éléments d'un tableau 
		$nb = count($tab2);
		echo $nb;

		var_dump(array_keys($personne));

		// Avec la fonction array
		$unTableau = array('Maurane', 'Fawsy', 'Thibault');

		$unAutreTableau = array(
			'nom' => 'DUCK',
			'prenom' => 'Donald',
			'age' => 158
		);

		// Un tableau a plusieurs dimensions 
		$personnes = array(
			array('nom' => 'DUCK', 'prenom' => 'Donald'),
			array('nom' => 'TICK', 'prenom' => 'Miss')
		);

		print('<pre>');
		print_r($personnes);
		print('</pre>');

		// Accéder aux éléments de mes tableaux 
		echo $tab1[1];
		echo $personne['prenom'];
		echo $personnes[0]['nom'];

		// imaginons une classe personne contenant le nom et le prénom
		class Personne{
			public $nom, $prenom;

			function __construct($nom, $prenom){
				$this->nom = $nom;
				$this->prenom = $prenom;
			}

			function presenter(){
				echo '<br>Je suis '.$this->nom.' '.$this->prenom.'<br>';
			}
		}
		$unePersonne = new Personne('DUKE', 'Daisy');
		$unePersonne->presenter();
	?>
	<div>
		<h3>Les tests</h3>
		<?php 
			/*
			if (condition){
				//instructions
			}

			if (condition){
				//instrutions
			}else{
				//instrutions
			}

			if (condition){
				//instructions
			}else if (condition){
				//instrutions
			}else{
				//instrutions
			}

			if (condition){
				if (condition){

				}else{

				}
			}else{
				if (condition){

				}else{

				}
			}

			*/
			$unePhrase = 'Je suis Daisy DUKE';
			$complement = 'J\' ai 42 ans';

			$afficheComplement = true;

			echo $unePhrase;
		?>
		<h3>Un autre exemple d'intégration de HTML dans le PHP</h3>
		<?php 
			$afficheComplement = false;
			if ($afficheComplement){
		?>
			<div>
				<?= $complement ?>
			</div>
		<?php 
			}
		?>
	</div>
	<div>
		<h3>Les boucles</h3>
		<?php 
			/*
				la boucle répéter : 
				do{

				}while(condition);

				la boucle tantque :
				while(condition){

				}

				la boucle pour :
				for ($i = 0; $i < 10; $i++){

				}

				la boucle foreach :
				foreach($variabeTableau as $indice => $valeur){
					
				}
			*/
			$i = 0;
			print('<div class="div1">');
			do{
				print($i * $i);
				$i++;
			}while($i < 10);
			print('</div>');
			print('<div>');
			$i = 0;
			while($i < 10){
				print($i * $i);
				$i++;
			}
			print('</div>');
			print('<div>');
			for ($i = 0; $i < 10; $i++){
				print($i * $i);
			}
			print('</div>');
			print('<div>');
			foreach($personne as $infos){
				echo $infos;
			}
			print('</div>');
			print('<div>');
			foreach($personnes as $indice => $unePersonne){
				print_r($unePersonne);
			}
			print('</div>');

			//une fonction 
			function maFonction(){
				
			}
		?>
		<?php

			for ($i = 1; $i <= 10; $i++) {
    		echo $i;
			}
    	?>

	</div>

</body>
</html>