<?php
/*
    Petit exercice de bon matin 
    
    Le but est de construire les objets qui permettront de gérer un garage 
    
    Vous devrez donc créer : 
    
    3 classes : Moto, Camion, Tank
    Chaque classe doit avoir les propriétés privés suivantes :
        Marque, Modele, Couleur, Nombre de roues, Kilométrage,
        Vitesse, Vitesse maxi, carburant
        
    Chaque classe doit proposer les accesseurs / mutateurs et constructeurs
    nécessaires pour chaque attribut
    Le constructeur doit rendre obligatoire chaque attribut
    
    Chaque classe doit proposer une méthode "sedeplacer" qui
    affiche : 
        Je suis {type vehicule}, je me déplace sur {nbroues} roues
        
*/

    class Moto{
        private $marque;
        private $modele;
        private $couleur;
        private $roues;
        private $kilometrage;
        private $vitesse;
        private $vitesseMax;
        private $carburant;
        
        // constructeur
        public function __construct($paramCouleur, $paramCarburant, $paramMarque, $paramModele, $paramRoues, $paramKilometrage, $paramVitesse, $paramVitesseMax){
            $this->setCarburant($paramCarburant);
            $this->setMarque($paramMarque);
            $this->setModele($paramModele);
            $this->setCouleur($paramCouleur);
            $this->setRoues($paramRoues);
            $this->setKilometrage($paramKilometrage);
            $this->setVitesse($paramVitesse);
            $this->setVitesseMax($paramVitesseMax);
        }
        
        //Accesseur
        public function getMarque(){
            return $this->marque;
        }
        
        public function getModele(){
            return $this->modele;
        }
        
        public function getCouleur(){
            return $this->couleur;
        }
        
        public function getRoues(){
            return $this->roues;
        }
        
        public function getKilometrage(){
            return $this->kilometrage;
        }
        
        public function getVitesse(){
            return $this->vitesse;
        }
        
        public function getVitesseMax(){
            return $this->vitesseMax;
        }
        
        public function getCarburant(){
            return $this->carburant;
        }
        
        //mutateur
        public function setMarque($paramMarque){
            if ($paramMarque == 'BMW'
                || $paramMarque == 'Yamaha'
                || $paramMarque == 'Honda'){
                $this->marque = $paramMarque;
            }else{
                
                throw new Exception('Erreur de marque : RDV chez le concessionnaire !', 666);
            }
        }
        
        public function setModele($paramModele){
            if ($paramModele == 'XSR'
                || $paramModele == 'Roadster'
                || $paramModelee == 'CB500X'){
                $this->modele = $paramModele;
            }else{
                
                throw new Exception('Erreur de modele: RDV chez le concessionnaire !', 666);
            }
        }
        
        public function setCouleur($paramCouleur){
            if ($paramCouleur == 'Rouge'
                || $paramCouleur == 'Blanche'
                || $paramCouleur == 'Noir'){
                $this->couleur = $paramCouleur;
            }else{
                
                throw new Exception('Erreur de couleur: RDV chez le carrossier !', 666);
            }
        }
        
        public function setRoues($paramRoues){
            if ($paramRoues == 2
                || $paramRoues == 3
                || $paramRoues == 4){
                $this->roues = $paramRoues;
            }else{
                
                throw new Exception('Erreur de roues: RDV chez le vendeur de roues! !', 666);
            }
        }
        
        public function setKilometrage($paramKilometrage){
            if ($paramKilometrage == 150000
                || $paramKilometrage == 80000
                || $paramKilometrage == 4){
                $this->kilometrage = $paramKilometrage;
            }else{
                
                throw new Exception('Erreur de kilometrage: RDV chez le kilometreur !', 666);
            }
        }
        
        // public function setVitesse($paramVitesse){
        //     if ($paramVitesse == 50
        //         || $paramVitesse == 75
        //         || $paramVitesse == 90){
        //         $this->vitesse = $paramVitesse;
        //     }else{
                
        //         throw new Exception('Erreur de vitesse: RDV chez le vitesseur !', 666);
        //     }
        // }
        
        // public function setVitesseMax($paramVitesseMax){
        //     if ($paramVitesseMax == 50
        //         || $paramVitesseMax == 75
        //         || $paramVitesseMax == 90){
        //         $this->vitesse = $paramVitesseMax;
        //     }else{
                
        //         throw new Exception('Erreur de vitesse max: RDV chez le vitesse maxeur !', 666);
        //     }
        // }
        
        //méthodes
        public function accelerer($paramValeur = null){
            if (is_null($paramValeur)){
                $this->vitesse *= 1.05;
            }else{
                if ($paramValeur > 20){
                    $paramValeur = 20;
                }
                $this->vitesse += $paramValeur;
            }
            if ($this->vitesse > $this->vitesseMax){
                $this->vitesse = $this->vitesseMax;
            }
        }
        
        public function ralentir($paramValeur = 5){
            if ($paramValeur > 32){
                $paramValeur = 32;
            }
            $this->vitesse -= $paramValeur;
           
              if ($this->vitesse < 0){
                 $this->setVitesse(0);
              }
        }
        
        
        
        public function setCarburant($paramCarburant){
            if ($paramCarburant == 'Gazoil'
                || $paramCarburant == "Super"
                || $paramCarburant == 'GPL'){
                $this->carburant = $paramCarburant;
            }else{
                
                throw new Exception('Erreur de carburant: RDV à la pompe !', 666);
            }
        }
        
    }
        
        
        
        
        class Camion{
        private $marque;
        private $modele;
        private $couleur;
        private $roues;
        private $kilometrage;
        private $vitesse;
        private $vitesseMax;
        private $carburant;
        
        // constructeur
        public function __construct($paramCouleur, $paramCarburant, $paramMarque, $paramModele, $paramRoues, $paramKilometrage, $paramVitesse, $paramVitesseMax){
            $this->setCarburant($paramCarburant);
            $this->setMarque($paramMarque);
            $this->setModele($paramModele);
            $this->setCouleur($paramCouleur);
            $this->setRoues($paramRoues);
            $this->setKilometrage($paramKilometrage);
            $this->setVitesse($paramVitesse);
            $this->setVitesseMax($paramVitesseMax);
        }
        
        //Accesseur
        public function getMarque(){
            return $this->marque;
        }
        
        public function getModele(){
            return $this->modele;
        }
        
        public function getCouleur(){
            return $this->couleur;
        }
        
        public function getRoues(){
            return $this->roues;
        }
        
        public function getKilometrage(){
            return $this->kilometrage;
        }
        
        public function getVitesse(){
            return $this->vitesse;
        }
        
        public function getVitesseMax(){
            return $this->vitesseMax;
        }
        
        public function getCarburant(){
            return $this->carburant;
        }
        
        //mutateur
        public function setMarque($paramMarque){
            if ($paramMarque == 'Renault'
                || $paramMarque == 'Iveco'
                || $paramMarque == 'Volvo'){
                $this->marque = $paramMarque;
            }else{
                
                throw new Exception('Erreur de marque : RDV chez le concessionnaire !', 666);
            }
        }
        
        public function setModele($paramModele){
            if ($paramModele == 'F16'
                || $paramModele == 'Kerax'
                || $paramModelee == 'Trakker 450'){
                $this->modele = $paramModele;
            }else{
                
                throw new Exception('Erreur de modele: RDV chez le concessionnaire !', 666);
            }
        }
        
        public function setCouleur($paramCouleur){
            if ($paramCouleur == 'Rouge'
                || $paramCouleur == 'Blanche'
                || $paramCouleur == 'Noir'){
                $this->couleur = $paramCouleur;
            }else{
                
                throw new Exception('Erreur de couleur: RDV chez le carrossier !', 666);
            }
        }
        
        public function setRoues($paramRoues){
            if ($paramRoues == 4
                || $paramRoues == 6
                || $paramRoues == 8){
                $this->roues = $paramRoues;
            }else{
                
                throw new Exception('Erreur de roues: RDV chez le vendeur de roues! !', 666);
            }
        }
        
        public function setKilometrage($paramKilometrage){
            if ($paramKilometrage == 300000
                || $paramKilometrage == 150000
                || $paramKilometrage == 220000){
                $this->kilometrage = $paramKilometrage;
            }else{
                
                throw new Exception('Erreur de kilometrage: RDV chez le kilometreur !', 666);
            }
        }
        
        // public function setVitesse($paramVitesse){
        //     if ($paramVitesse == 50
        //         || $paramVitesse == 75
        //         || $paramVitesse == 90){
        //         $this->vitesse = $paramVitesse;
        //     }else{
                
        //         throw new Exception('Erreur de vitesse: RDV chez le vitesseur !', 666);
        //     }
        // }
        
        // public function setVitesseMax($paramVitesseMax){
        //     if ($paramVitesseMax == 50
        //         || $paramVitesseMax == 75
        //         || $paramVitesseMax == 90){
        //         $this->vitesse = $paramVitesseMax;
        //     }else{
                
        //         throw new Exception('Erreur de vitesse max: RDV chez le vitesse maxeur !', 666);
        //     }
        // }
        
        //méthodes
        public function accelerer($paramValeur = null){
            if (is_null($paramValeur)){
                $this->vitesse *= 1.05;
            }else{
                if ($paramValeur > 20){
                    $paramValeur = 20;
                }
                $this->vitesse += $paramValeur;
            }
            if ($this->vitesse > $this->vitesseMax){
                $this->vitesse = $this->vitesseMax;
            }
        }
        
        public function ralentir($paramValeur = 5){
            if ($paramValeur > 32){
                $paramValeur = 32;
            }
            $this->vitesse -= $paramValeur;
           
              if ($this->vitesse < 0){
                 $this->setVitesse(0);
              }
        }
        
        
        
        public function setCarburant($paramCarburant){
            if ($paramCarburant == 'Gazoil'
                || $paramCarburant == "Super"
                || $paramCarburant == 'GPL'){
                $this->carburant = $paramCarburant;
            }else{
                
                throw new Exception('Erreur de carburant: RDV à la pompe !', 666);
            }
        }
    }
    
     
        class Tank{
        private $marque;
        private $modele;
        private $couleur;
        private $roues;
        private $kilometrage;
        private $vitesse;
        private $vitesseMax;
        private $carburant;
        
        // constructeur
        public function __construct($paramCouleur, $paramCarburant, $paramMarque, $paramModele, $paramRoues, $paramKilometrage, $paramVitesse, $paramVitesseMax){
            $this->setCarburant($paramCarburant);
            $this->setMarque($paramMarque);
            $this->setModele($paramModele);
            $this->setCouleur($paramCouleur);
            $this->setRoues($paramRoues);
            $this->setKilometrage($paramKilometrage);
            $this->setVitesse($paramVitesse);
            $this->setVitesseMax($paramVitesseMax);
        }
        
        //Accesseur
        public function getMarque(){
            return $this->marque;
        }
        
        public function getModele(){
            return $this->modele;
        }
        
        public function getCouleur(){
            return $this->couleur;
        }
        
        public function getRoues(){
            return $this->roues;
        }
        
        public function getKilometrage(){
            return $this->kilometrage;
        }
        
        public function getVitesse(){
            return $this->vitesse;
        }
        
        public function getVitesseMax(){
            return $this->vitesseMax;
        }
        
        public function getCarburant(){
            return $this->carburant;
        }
        
        //mutateur
        public function setMarque($paramMarque){
            if ($paramMarque == 'KMW'
                || $paramMarque == 'General Dynamics Land Systems'
                || $paramMarque == 'GIAT Industries'){
                $this->marque = $paramMarque;
            }else{
                
                throw new Exception('Erreur de marque : RDV chez le concessionnaire !', 666);
            }
        }
        
        public function setModele($paramModele){
            if ($paramModele == 'Leopard 2A7+'
                || $paramModele == 'Abrams M1A2'
                || $paramModelee == 'Leclerc'){
                $this->modele = $paramModele;
            }else{
                
                throw new Exception('Erreur de modele: RDV chez le concessionnaire !', 666);
            }
        }
        
        public function setCouleur($paramCouleur){
            if ($paramCouleur == 'Rouge'
                || $paramCouleur == 'Blanche'
                || $paramCouleur == 'Noir'){
                $this->couleur = $paramCouleur;
            }else{
                
                throw new Exception('Erreur de couleur: RDV chez le carrossier !', 666);
            }
        }
        
        public function setRoues($paramRoues){
            if ($paramRoues == 8
                || $paramRoues == 10
                || $paramRoues == 12){
                $this->roues = $paramRoues;
            }else{
                
                throw new Exception('Erreur de roues: RDV chez le vendeur de roues! !', 666);
            }
        }
        
        public function setKilometrage($paramKilometrage){
            if ($paramKilometrage == 300000
                || $paramKilometrage == 150000
                || $paramKilometrage == 220000){
                $this->kilometrage = $paramKilometrage;
            }else{
                
                throw new Exception('Erreur de kilometrage: RDV chez le kilometreur !', 666);
            }
        }
        
        // public function setVitesse($paramVitesse){
        //     if ($paramVitesse == 50
        //         || $paramVitesse == 75
        //         || $paramVitesse == 90){
        //         $this->vitesse = $paramVitesse;
        //     }else{
                
        //         throw new Exception('Erreur de vitesse: RDV chez le vitesseur !', 666);
        //     }
        // }
        
        // public function setVitesseMax($paramVitesseMax){
        //     if ($paramVitesseMax == 50
        //         || $paramVitesseMax == 75
        //         || $paramVitesseMax == 90){
        //         $this->vitesse = $paramVitesseMax;
        //     }else{
                
        //         throw new Exception('Erreur de vitesse max: RDV chez le vitesse maxeur !', 666);
        //     }
        // }
        
        //méthodes
        public function accelerer($paramValeur = null){
            if (is_null($paramValeur)){
                $this->vitesse *= 1.05;
            }else{
                if ($paramValeur > 20){
                    $paramValeur = 20;
                }
                $this->vitesse += $paramValeur;
            }
            if ($this->vitesse > $this->vitesseMax){
                $this->vitesse = $this->vitesseMax;
            }
        }
        
        public function ralentir($paramValeur = 5){
            if ($paramValeur > 32){
                $paramValeur = 32;
            }
            $this->vitesse -= $paramValeur;
           
              if ($this->vitesse < 0){
                 $this->setVitesse(0);
              }
        }
        
        
        
        public function setCarburant($paramCarburant){
            if ($paramCarburant == 'Gazoil'
                || $paramCarburant == "Super"
                || $paramCarburant == 'GPL'){
                $this->carburant = $paramCarburant;
            }else{
                
                throw new Exception('Erreur de carburant: RDV à la pompe !', 666);
            }
        }
    }
    
    
    
    
    
    
    
    
    
    