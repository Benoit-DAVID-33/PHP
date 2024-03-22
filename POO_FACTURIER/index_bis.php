<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		require_once "Client.php";
		require_once "Facture.php";
		require_once "LigneFacture.php";
		require_once "Produit.php";
		
		
		
		?>
</body>
</html>

<?php /*
	Consignes :

	Créer les classes décrites dans le schéma fourni.

	Appliquer les règles suivantes :
		Un client possède plusieurs factures 
		Une facture contient plusieurs l=LigneFacture 
		Une LigneFacture est composée d'une quantité et d'un produit 
		Un produit est consituté d'une référence, d'une désignation et d'un prix unitaire HT

		Le montant d'une ligne (retourné par la méthode getMontant()) est le résultat du produit de sa quantité et du prix HT du produit lié
		Le montant d'une facture (retourné par la méthode getMonant()) est le cumule des montants des lignes qui la composent
		Le CA d'un client (retourné par getCA()) est le cumul des montants des factures qu'il possède.

		Le code de la facture est généré dans le constructeur sur le modèle suivant : FAAAA-MMXXX 
				Où : AAAA = année d'émission de la facture 
					MM = mois d'émission de la facture 
					XXX = un numéro séquentiel aléatoire 


		Démontrez l'implémentation correcte de ces règles en créant un client possédant 3 factures dont chacune possède entre 2 et 5 lignes de factures 

		Le résultat doit afficher : 

			Client : {nom prénom}
			CA HT : {CA} €
			Liste des factures : 
				{code} : du {date emission} pour un montant de {montant facture} € HT
				{code} : du {date emission} pour un montant de {montant facture} € HT
				{code} : du {date emission} pour un montant de {montant facture} € HT

		
		Une fois que tout cela est fini et démontré, à vous d'intégrer la notion de TVA en sachant que la TVA s'applique sur les lignes de factures.
		Votre nouvel affichage par la suite doit être : 
			Client : {nom prénom}
			CA HT : {CA} €
			CA TTC : {CA} €
			Liste des factures : 
				{code} : du {date emission} pour un montant de {montant facture} € HT soit {montant facture} € TTC 
				{code} : du {date emission} pour un montant de {montant facture} € HT soit {montant facture} € TTC 
				{code} : du {date emission} pour un montant de {montant facture} € HT soit {montant facture} € TTC 


*/

