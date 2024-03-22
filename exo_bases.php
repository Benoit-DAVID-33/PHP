<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
         echo 'Le'. " ". date('j/n/Y');
        ?>
    </title>

</head>
<body>
<!--    /*-->
<!--	Petit exercice :-->

<!--	1 - Créez un fichier exo_bases.php dans le répertoire Exercice à la racine de votre serveur-->
<!--	2 - Dans ce fichier, construiez la structure basique d'une page HTML-->
<!--	3 - Faites en sorte que le titre du document (<title></title>) affiche : "Le JJ/MM/AAAA"-->
<!--	4 - Dans le boody, intégrez un bloc PHP-->
<!--	En PHP : -->
<!--	5 - Déclarez une variable qui contiendra l'heure actuelle (uniquement l'heure) grâce à la fonction Date de PHP-->
<!--	En fonction de cette heure :-->
<!--		Si [4, 11[ : afficher Bonjour-->
<!--		Si [11, 14[ : Afficher Bon Appétit-->
<!--		Si [14, 16[ : Bon après-midi-->
<!--		Si [16, 21[ : Afficher Bonne soirée -->
<!--		Sinon afficher Bonne nuit-->
		
<!--	6 - En utilisant une boucle for, remplissez un tableau avec uniquement les années multiples de 5-->
<!--	dans l'interrvalle suivant [1952, 2030]-->
<!--	7 - Affichez le contenu de tableau dans une combobox (<select><option></option>...</select>) -->
<!--	en les triant par ordre décroissant-->

<!--	-- BONUS ---->
<!--	8 - Faites en sorte que les années bissextiles ne fassent pas partie de la liste produite :-)-->
<!--	En utilisant la fonction suivante : -->
<!--	function estBissextile($year){-->
<!--		return (cal_days_in_month(CAL_GREGORIAN, 2, $year) === 29) ? true : false;-->
<!--	}-->

<!--*/-->
    <?php
    echo date('j/n/Y'). '<br>';
    
    date_default_timezone_set('Europe/Paris');
    echo date('h:i:s'). '<br>'; //('G:h')
    
    
        $date = intval (date('G'));
        date_default_timezone_set('Europe/Paris');
        echo $date ." ";
            if($date >= 04 && $date < 11){
            echo 'Bonjour';
            }
            else if($date >= 11 && $date < 14){
            echo 'Bon Appétit';
            }
            else if($date >= 14 && $date < 16){
            echo 'Bon après-midi';
            }
            else if($date >= 16 && $date < 21){
                echo 'Bonne soirée';
            }else {echo 'Bonne nuit';
            }
        
    ?>
//     <?php
//       function est_multiple($nombre, $multiple){
//         if($nombre % $multiple == 0)
//             return true;
//         else
//             return false;
//     }
    
//         var_dump(est_multiple(1955, 5));
    
//         for ($i = 0; $i % 5; $i++){
//             if($nombre % 5 == 0)
// 				echo "true";
// 			}
// 			else{
// 			    echo "false";
// 			}
		
// 	?>
<?php
	$year1 = 1952;
	$year2 = 2030;
	$array = [];
	   
	for ($i = $year1; $i <= $year2 ; $i++){
	   if($i % 5 == 0){
	   array_push($array, $i);
	  }
}
var_dump($array);
    
rsort($array); 
        
echo '<select>';
foreach($array as $valeurarray){
echo "<option>$valeurarray</option>";
}
echo '<select>';
?>

</body>
</html>