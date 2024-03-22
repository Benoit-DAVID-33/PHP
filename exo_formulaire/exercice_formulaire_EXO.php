<?php
/*
	Exo 1 :

	1 - Créez un fichier formulaire_exo.php contenant la structure standard d'une page HTML
	2 - Insérez dans cette page un formulaire contenant deux input number et un bouon submit
	3 - Créez un fichier traitement_form.php ne contenant QUE du PHP
	4 - Faites en sorte que ce fichier soit appelé à la validation du formulaire 
	5 - Les données du formulaire seront envoyées en POST
	6 - Dans le fichier traitement, faites en sorte d'afficher simultanément le résultat 
	de l'addition, de la soustraction, de la multiplication et de la division des 2 nombres 
	transmis par le formulaire. 
	7 - Attention, si le calcul est impossible, votre traitement doit l'indiquer 

	Exo 2 :
	1 - Dans le formulaire précédent, faites le nécessaire pour que les champs soient obligatoirement
	renseignés avec des valeurs >= 0 uniquement 
	
	Exo 3 : 
	1 - Dans le formulaire précédent, remplacez les 2 champs par une liste déroulante contenant les valeurs
	de 0 à 9
	2 - Créez un autre fichier de traitement qui affichera, en fonction de la valeur transmise,
	la table de multiplication correspondante sous la forme 
	d'un tableau HTML (<table><tr><td>....</td></tr></table>)
 
	Exo 4 : 
	1 - Dans le formulaire précédent, remplacez la liste déroulante par une autre liste déroulante 
	contenant une valeur 'Tout le monde' ainsi que tous les noms et prénoms de tous les
	apprenant de votre promo par ordre alphabétique du nom.
	2 - Créez un autre fichier de traitement qui affiche, en fonction de la valeur transmise :
		- si c'est la valeur de 'Tout le monde', la liste de toutes les personnes de la promo 
		dans un tableau HTML contenant le nom, le prénom et l'age
		- si c'est la valeur correspondant à une personne, 
		affichez uniquement son nom, son prénom et son age
	
	Exo 5 :
	1 - Ajoutez sur le formulaire précédent 2 fois 2 boutons radio respectivement : 
			- Tri alphabétique croissant et Tri alphabétique décroissant
			- Uniquement les noms de longueur paire et Uniquement les noms de longueur impaire
	2 - Ces boutons ne devront être actifs que si la valeur 'Tout le monde' est sélectionnée
	3 - Appliquez dans votre traitement php les conditions sélectionnées 
*/
