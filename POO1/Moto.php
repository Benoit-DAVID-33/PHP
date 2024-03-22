<?php 
    require_once "Vehicule.php";
    class Moto extends Vehicule{
        
        private $kilometrage;
        private $vitesse;
        private $vitesseMax;
        private $carburant;
        
        // constructeur
        public function __construct($paramCouleur, $paramCarburant, $paramMarque, $paramModele, $paramRoues, $paramKilometrage, $paramVitesse, $paramVitesseMax){
           parent::__construct($couleur, $marque, $modele, $nbRoues);
            $this->carburant = $carburant;
            $this->kilometrage = $kilometrage;
            $this->vitesse = $vitesse;
            $this->vitesseMax = $vitesseMax;
        }
        
        //Accesseur
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
        
        public function sedeplacer(){
        print("Je suis une moto et je me déplace sur'{$this->getRoues()} roues");
        //print ("Je suis une voiture et je me déplace sur ".$this->getNbRoues()." roues");
    }
}    