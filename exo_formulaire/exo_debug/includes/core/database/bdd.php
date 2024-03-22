<?php
	// Etape 1 : la connexion
	$server = 'db.3wa.io';
	$port = '3306';
	$dbname = 'michelgillet_mycontacts';
	$username = 'michelgillet';
	$password = '1f8954c8a41113c75884ee98f76d3c4d';

	// Construction de la chaîne de connexion : Data Source Name
	$dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";

	try{
		$conn = new PDO($dsn, $username, $password);
	}catch(PDOException $ex){
		print('Pas possible de se connecter !!!');
		die();
	}
	/**
	 * @descrption nombre de contacts dans la table
	 */
	function getContactCount(){
		return getTableRowCount('contact');
	}

	/**
	 * @throws Exception
	 */
	function getTableRowCount($nomTable = ''){
		global $conn;
		if (trim($nomTable) == ''){
			throw new Exception("Erreur de table", 666);
		}else{
			$retVal = 0;
			switch ($nomTable){
				case 'contact':{
					$retVal = $conn->query("SELECT COUNT(id) FROM personne")->fetchColumn(0);
					break;
				}
				case 'cpville':{
					$retval = $conn->query("SELECT COUNT(id) FROM $nomTable")->fetchColumn(0);
					break;
				}
				default:{
					try{
						$retval = $conn->query("SELECT COUNT(id) FROM $nomTable")->fetchColumn(0);
					}catch (PDOException $ex){
						throw new Exception("Erreur : ".$ex->getMessage(), 666);
					}
				}
			}
			return $retVal;
		}
	}