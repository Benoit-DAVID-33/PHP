<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes premiers pas en POO</title>
</head>
<body>
    <?php
        require_once "Voiture.php";
            $maVoiture = new Voiture();
            $maVoiture->immatriculation = '7458 TM 33';
            $maVoiture->setVitesseMaximale(200);
            try{
                $maVoiture->setCarburant('Gazoil');
                $maVoiture->setVitesse(25); 
                $maVoiture->setCouleur('Rouge');
                print('Je roule à '.$maVoiture->getVitesse().' km/h<br>');
                $maVoiture->accelerer(); // ma voiture doit accélérer de 5% de sa vitesse
                print('Je roule à '.$maVoiture->getVitesse().' km/h<br>');
                $maVoiture->accelerer(10); // Ma voiture doit accélerer de 10 km/h
                print('Je roule à '.$maVoiture->getVitesse().' km/h<br>');
                $maVoiture->ralentir(); // Ma voiture ralenti de 5km/h
                print('Je roule à '.$maVoiture->getVitesse().' km/h<br>');
                $maVoiture->ralentir(18); // Ma voitrue ralenti de 18km/h
                print('Je roule à '.$maVoiture->getVitesse().' km/h<br>');
                
                $maVoiture->ralentir(18);
                $maVoiture->ralentir(18);
                print('Je roule à '.$maVoiture->getVitesse().' km/h<br>');
                
                print('Je roule au '.$maVoiture->getCarburant().'<br>');
                
                print('Je roule au '.$maVoiture->getCouleur().'<br>');
            
            
            }catch(Exception $ex){
                print('Il y a une erreur : '.$ex->getMessage());
            }
            
                
                
            $vehicule1 = new Voiture();
    
            $vehicule1->setMarque('BMW');
            $vehicule1->setModele('M3');
            $vehicule1->setCouleur('Rouge');
            $vehicule1->setCarburant('Gazoil');
            print('Je suis une '.$vehicule1->getMarque().' modele '.$vehicule1->getModele().' je roule au '.$vehicule1->getCarburant().'<br>');
                    
            $vehicule2 = new Voiture();
    
            $vehicule2->setMarque('Peugeot');
            $vehicule2->setModele('408');
            $vehicule2->setCouleur('Grise');
            $vehicule2->setCarburant('Super');
            print('Je suis une '.$vehicule2->getMarque().' modele '.$vehicule2->getModele().' je roule au '.$vehicule2->getCarburant().'<br>');     
            
            
            $vehicule3 = new Voiture();
    
            $vehicule3->setMarque('Mercedes');
            $vehicule3->setModele('GLA');
            $vehicule3->setCouleur('Blanche');
            $vehicule3->setCarburant('GPL');
            print('Je suis une '.$vehicule3->getMarque().' modele '.$vehicule3->getModele().' je roule au '.$vehicule3->getCarburant().'<br>');
            
            
            $vehicule4 = new Voiture('Super', 'PIGEOT', '104Z', 'Vert');
            print('Je suis une '.$vehicule4->getCarburant().' modele '.$vehicule4->getMarque().' je roule au '.$vehicule4->getModele().' de couleur '.$vehicule4->getCouleur.'<br>');
            
            // A vous d'adapter pour 
            /*
                
                -Permettre d'appeler une méthode "Ralentir" qui par défaut 
                    ralenti de 5 km/h ou de la valeur fournie en paramètre
                    
                -Ne pas autoriser une vitesse minimale inférieure à 0 
                
                -Ne pas autoriser une accélération de plus de 20 km/h
                -Ne pas autoriser une déccélération de plus de 32km/h
                -Ne pas autoriser une vitesse supérieure à une vitesse maximale 
                    définie en amont
                    
                    
                Petit exercice pour finir la journée 
                    
                    Ajoutez à la classe voiture : 
                        -un attribut privé couleur ne pouvant être que rouge, blanche ou grise
                        -un attribut privé modele
                        -un attribut privé marque
                        
                    chaque attribut doit avec accesseur et un mutateur.
                    
                    Déclarez dans votre programme principal, 3 véhicules
                    de 3 marques / modèles / couleurs différentes
                    et affichez chacune en écrivant :
                    
                    Je suis un voiture {modèle} de marque {marque} et je roule au {carburant}
            */
            
            
            //var_dump($maVoiture);
        
    ?>
</body>
</html>