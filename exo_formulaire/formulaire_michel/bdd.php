<?php
	// Etape 1 : la connexion
	$server = 'db.3wa.io';
	$port = '3306';
	$dbname = 'benoitdavid_mycontacts';
	$username = 'benoitdavid';
	$password = '30dfb694ac16b17e016ad25722364270';
	
	// Construction de la chaîne de connexion : Data Source Name 
	$dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";

	try{
		$conn = new PDO($dsn, $username, $password);
	}catch(PDOException $ex){
		print('Pas possible de se connecter !!!');
		die();
	}