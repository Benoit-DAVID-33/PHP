<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    
        require_once "Etudiant.php";
        require_once "Directeur.php";
        require_once "Ecole.php";
        require_once "Surveillant.php";
        require_once "Professeur.php";
        require_once "Personnel.php";
        require_once "Personne.php";
    
    
        $uneEtudiante = new Etudiant('DUKE', 'Daisy', '1985-12-15');
        $unEtudiant = new Etudiant('Obiwan', 'Keno', '0000-12-25', 'blablabla');
    
        
        print('<br>');
        print_r($uneEtudiante);
        print_r($unEtudiant);
        print('<br>');
        
        $unProfesseur = new Professeur('Martu', 'Gilou', '22', ['français', 'math', 'tourneur fraiseur']);

        $unProfesseur->setMatieres(array('chasse', 'pêche', 'metallurgie', 'tir au pigeon'));
        $unProfesseur->setMatieres('crochet', 1);
        print('<br>');
        print_r($unProfesseur);
        print('<br>');
        
        $unSurveillant = new Surveillant('Cass', 'Kouil', '3');
        
        print('<br>');
        print_r($unSurveillant);
        print('<br>');
        
        $unDirecteur = new Directeur('Dir', 'Lo', '1998-08-11');
        
        print('<br>');
        print_r($unDirecteur);
        print('<br>');
        
       // $uneEcole = new Ecole('Jacque Martin 1er', ['Martu', 'Tourette', 'Ponce', 'Martinez'], ['Obiwan', 'Horteau', 'Chanclair', 'Obvious', 'Gazoil'], 'Dir');
    
        //$uneEcole->setDirecteur($unDirecteur);
        
        // $tab = array('Janvier', 'Février', 'Mars');
        // print(join(',', $tab));
        
        // $phrase = "Ceci est une chaine de caractères";
        // $tab = explode(' ', $phrase);
        // var_dump($tab);
        
        //print($uneEcole);
        print($unDirecteur);
        print($uneEtudiante);
        print($unEtudiant);
        print($unProfesseur);
        
        // Doit afficher : ecole : "...", mon directeur : "..."
        
        
        $monEcole = new Ecole('AVASchool');

		$unNouveauDirecteur = new Directeur('MUSK', 'Elon', '2005-05-12');
		$monEcole->setDirecteur($unNouveauDirecteur);

		$unAutreProf = new Professeur('BROWN', 'Emmet', 999, array('Physique Quantique', 'Convection Temporelle'));
		$monEcole->setProfesseurs(array($unProfesseur, $unAutreProf));
		$monEcole->setEtudiants(array($uneEtudiante, $unEtudiant)); 
        
        print($monEcole);
        
        /*
            doit afficher :
                Ecole : ....
                mon directeur : nom prenom
                j'ai nombreprof professeurs
                j'ai nombreetudiants etudiants
        */
    ?>
</body>
</html>