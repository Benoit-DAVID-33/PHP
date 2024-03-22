<?php
print('<pre>');
print_r($_REQUEST);
print('<pre>');




// $num = $_POST['num1'];
            
//                 for ($j = 1; $j <= 10; $j++){
//                 echo "<table>";
//                       echo '<tr>';
//                          echo   '<td>' .($num * $j);
//                                 '<td>';
//                       echo "<tr>";
//                     echo  "<table>";
//                     };
// var_dump($num);



$peoples = array(
    array("nom" => "Hugon", "prenom" => "Mauranne", "age" => "30 ans"),
    array("nom" => "LIMLAHI", "prenom" => "fawsy", "age" => "29 ans"),
    array("nom" => "Altaber", "prenom" => "Thibault", "age" => "30 ans"),
    array("nom" => "Guinard", "prenom" => "Julia", "age" => "35 ans"),
    array("nom" => "Parking", "prenom" => "Joanna", "age" => "38 ans"),
    array("nom" => "KATE", "prenom" => "Anissa", "age" => "42 ans"),
    array("nom" => "Sable", "prenom" => "Sandy", "age" => "22 ans"),
    array("nom" => "Giroud", "prenom" => "Yoan", "age" => "34 ans"),
    array("nom" => "DAVID", "prenom" => "Benoît", "age" => "44 ans"),
    array("nom" => "Loorius", "prenom" => "olivier", "age" => "36 ans"),
);

// $selectedValue = $_POST['people'];

//     foreach
    
    
    // $arraycity = array('Toronto', 'New-York', 'Vancouver');
 
    //  echo "<select name='city' onchange='alert(this.value)'>" . PHP_EOL ;
 
    //  echo "<option>Tout le monde</option>" . PHP_EOL ;
  
    //  foreach( $peoples as $people ) {
    //       echo '<option>'.$people['nom'].' '.$people['prenom'].' '.$people['age'].'</option>' . PHP_EOL ;
    //       }
    //  echo "</select >" . PHP_EOL ;
     
     
     //////////////////////////////////////////////////////////
//      $peo = $_POST['people'];
     
//      echo = '<table>';
//         foreach($peoples as $people){
//             echo .= '<tr><td>'.$people['nom'].'<td><tr>';
//         }
//         echo = '</table>';
        
        
// var_dump($peo);


//////////////correction //////////////////////////////////


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



















