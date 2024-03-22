<?php
$apprenants = array(
	array('nom' => 'HUGON', 'prenom' => 'Mauranne', 'age' => 32), 
	array('nom' => 'LIMLAHI', 'prenom' => 'Fawsy', 'age' => 32),
	array('nom' => 'ALTABER', 'prenom' => 'Thibault', 'age' => 32),
	array('nom' => 'GUINARD', 'prenom' => 'Julia', 'age' => 32),
	array('nom' => 'ATTALI', 'prenom' => 'Joanna', 'age' => 32),
	array('nom' => 'MARZOUK', 'prenom' => 'Anissa', 'age' => 32),
	array('nom' => 'EMONTS', 'prenom' => 'Sandie', 'age' => 32),
	array('nom' => 'GIROUD','prenom' => 'Yoan', 'age' => 32),
	array('nom' => 'DAVID', 'prenom' => 'Benoît', 'age' => 32),
	array('nom' => 'LOORIUS', 'prenom' => 'Olivier', 'age' => 32),
	array('nom' => 'DURAND', 'prenom' => 'Mickaël', 'age' => 32),
	array('nom' => 'AGBANGLA', 'prenom' => 'Claude', 'age' => 32),
	array('nom' => 'VIANA', 'prenom' => 'Ludivine', 'age' => 32),
	array('nom' => 'BALLET', 'prenom' => 'Bryan', 'age' => 32)
);

//Tri par le premier sous-élément des données
//sort($apprenants);

//Fonction de comparaison
function cmp($a, $b) {
	if ($a['prenom'] == $b['prenom']) {
		return 0;
	}
	return ($a['prenom'] < $b['prenom']) ? -1 : 1;
}

//Tri du tableau par le prénom
uasort($apprenants, 'cmp');