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
		// Etape 1 : la connexion
		$server = 'localhost';
		$port = '3306';
		$dbname = 'mycontacts';
		$username = 'root';
		$password = '@dmDev@tom';
		
		// Construction de la chaîne de connexion : Data Source Name 
		$dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";

		try{
			$conn = new PDO($dsn, $username, $password);
		}catch(PDOException $ex){
			print('Pas possible de se connecter !!!');
			die();
		}

		// Etape 2 : Exécution de la requête 
		print('Je suis bien connecté !');
		$SQLResult = $conn->query("SELECT * FROM personne");

		// Etape 3 : Exploitation des résultats 
		print('<pre>');
		print_r($SQLResult->fetchAll(PDO::FETCH_ASSOC));
		print('</pre>');

		// Etape 4 : Libération des ressources
		$SQLResult->closeCursor();
	?>
</body>
</html>


<!--
	Petit exercice pour finir la journée :-) 

	Créez un fichier "visu.php" qui permettra d'afficher les informations 
	d'un contact sous la forme d'une fiche par exemple : 

			Civilite : ....
			Nom : ....
			Prénom : ...
			Age : ....
			Adresse complète :
				...
				...
				.... ....

	Petite difficulté : 
		Trouvez le moyen de faire en sorte que le tableau que nous avons créé auparavant
		dispose, pour chaque personne listée, d'un lien amenant sur le fichier visu.php
		permettant ainsi de n'afficher que les informations de la personne choisie 

-->