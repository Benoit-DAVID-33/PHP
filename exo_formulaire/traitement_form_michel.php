<?php
	//ini_set("display_errors", "on");
	var_dump($_POST);

	//$numero1 = $_POST['chNumber1'] ?? 0;

	//$numero1 = isset($_POST['chNumber1']) ? $_POST['chNumber1'] : 0;

	if (isset($_POST['chNumber1']) && isset($_POST['chNumber2'])){
		$numero1 = $_POST['chNumber1'];
		$numero2 = $_POST['chNumber2'];
		
		extract($_POST); //Permet de générer des variables dont le nom est l'indice des tableaux
		
		$addition = $numero1 + $numero2;
		$multiplication = $numero1 * $numero2;
		$soustraction = $numero1 - $numero2;
		try{
			$division = $numero1 / $numero2;
		}catch (DivisionByZeroError | Exception $ex){
			print($ex);
			$division = 'Erreur de numérateur !';
		}
		print("<pre>L'addition vaut : $addition</pre>");
		print("<pre>La soustraction vaut : $soustraction</pre>");
		print("<pre>La multiplication vaut : $multiplication</pre>");
		print("<pre>La division vaut : $division</pre>");
	}elseif (isset($_POST['cbValues'])){
		
		
		
	//////////////// Exo 3 //////////////////////////
	
		
		$valeurTransmise = $_POST['cbValues'];
		$script = '<table>';
		for ($i = 0; $i <= 10; $i++){
			$script .= '<tr><td>'.($i * $valeurTransmise).'</td></tr>';
		}
		$script .= '</table>';
		print($script);
	}elseif (isset($_POST['cbListePersonnes'])){
		require('datas_michel2.php');
		
		if ($_POST['cbListePersonnes'] == 'tous'){
			$tri = $_POST['reTri'] ?? 'C';
				uasort($apprenants, 'cmp'); // la fonction cmp trie par ordre croissant
		}else{
			uasort($apprenants, 'cmprev'); //la fonction cmprev trie par ordre décroissant
			
		}
			
		$parite = $_POST['rdParite'] ?? 'P';
		
		
		// Je dois parcourir tout le tableau des apprenants pour générer un tableau html
		$script = '<table>';
		foreach ($apprenants as $apprenant){
			if ($partie == 'P' && strlen($apprenant['nom']) % 2 == 0){
				$script .= '<tr><td>'.$apprenant['nom'].'</td><td>'.$apprenant['prenom'].'</td></tr>';
			}else if($partie == 'I' && strlen($apprenant['nom']) % 2 != 0){
				$script .= '<tr><td>'.$apprenant['nom'].'</td><td>'.$apprenant['prenom'].'</td></tr>';
			}else{
				$script .= '';
			}
		}
		$script .= '</table>';
		print($script);
		}else{
			// Je dois afficher uniquement les infos de l'apprenant sélectionné
			var_dump($apprenants[$_POST['cbListePersonnes']]);
			
		}
	
	