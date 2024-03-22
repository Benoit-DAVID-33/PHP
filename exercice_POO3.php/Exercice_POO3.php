<?php
/*
	Petit exercice pour une journée pleine de pratique ;-) 

	Nous allons simuler une ecole :-) 

	Créez un nouveau dossier (Hé oui encore un ;-)) dans lequel 
	vous allez créer un fichier index.php 
	ainsi que classe : 

	Etudiant : nom, prenom, date de naissance, commentaire
	
	Professeur : nom, prenom, anciennete, matieres (tableau)

	Surveillant : nom, prenom, anciennete
	
	Directeur : nom, prenom, date de prise de poste

	Ecole : nom, Professeurs (tableau), Etudiants (tableau), Directeur

	Personnel : classe abstraite contenant les éléments communs
	à Professeur, Surveillant et Directeur

	Personne : classe abstraite principale
	contenant les attributs, accesseurs, mutateurs et constructeurs
	communs ainsi qu'une méthode __toString qui devra être surchargée dans chaque classe
	enfant pour que chaque personne puisse se présenter :

		pour un étudiant : Je m'appelle {nom prénom}, j'ai {age}.
		pour un prof : Je m'appelle {nom, prenom}, j'enseigne {matieres}
		pour un directeur : Je m'appelle {nom, prenom}, je suis directeur depuis {annees anciennete}
		Surveillant : Je m'appelle {nom, prenom} depuis {anciennete} mois

	L'école doit présenter les méthodes nécessaires pour :
		- lire et enregistrer le directeur
		- lire les etudiants et directeurs
		- ajouter un etudiant
		- ajouter un professeur

	Bonus :
		l'école doit avoir une méthode permettant de transformer un professeur
		en directeur ;-)
	


*/