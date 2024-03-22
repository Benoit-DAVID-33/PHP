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
/*
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
					XXX = un numéro séquentiel 


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

require_once "Produit.php";
require_once "LigneFacture.php";
require_once "Facture.php";
require_once "Client.php";

$pdt1 = new Produit('PDT00001', 'Un produit quelconque', 125.25);

$pdt2 = new Produit('PDT00002', 'Un autre produit', 252.85);

print($pdt1);


$ligne1 = new LigneFacture(12, $pdt1);

$ligne2 = new LigneFacture(24, $pdt2);

print('<pre>');
print_r($ligne1);
print('</pre>');
//print($ligne1->getProduit()->getDesignation());

/*
$ligne3 = new LigneFacture(12, new Produit('PDT0004', 'Un autre produit encore', 400));
print($ligne3->getProduit()->getReference());*/

print($ligne1.'<br>');
print($ligne2.'<br>');

//print('<font style="color: red; font-weight: bold">'.Facture::$nbFactures.'</font>');
$facture1 = new Facture(new DateTime('now'), array($ligne1, $ligne2));

print($facture1.'<br>');

//print('<font style="color: red; font-weight: bold">'.Facture::$nbFactures.'</font>');

$tabFacture = array(
	new Facture(new DateTime('now'), array($ligne1, $ligne2)),
	new Facture(new DateTime('now'), array($ligne1, $ligne2)),
	new Facture(new DateTime('now'), array($ligne1, $ligne2)),
	new Facture(new DateTime('now'), array($ligne1, $ligne2))
);
//print('<font style="color: red; font-weight: bold">'.Facture::$nbFactures.'</font>');
/*print('<pre>');
print_r($tabFacture);
print('</pre>');*/

$client1 = new Client('DUCK', 'Donald');
$client1->setFactures($tabFacture);

$client1->setFacture($facture1);


print("Client: ".$client1.'<br>');
print('CA: '.$client1->getCA().' € HT');
print('Liste des factures :<br>');
foreach ($client1->getFactures() as $goldorak){
	print($goldorak.'<br>');
}


?>
</body>
</html>
