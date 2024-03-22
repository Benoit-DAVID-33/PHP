<?php
    ini_set('display_errors', 'on');
    // Déclaration de notre classe
    class Voiture{
        /*
        Accessibilité des attributs : 
            public : Accessibles de partout
            privés : Accessibles uniquement depuis les méthodes de la classe
            protégés : Accessibles depuis les méthodes de la classe et ses héritières
        */
        
        public $immatriculation;
        private $carburant;
        private $vitesse;
        private $vitesseMaximale;
        private $couleur;
        private $marque;
        private $modele;
        
        
        /* Definition du constructeur */
        public function __construct($paramCouleur, $paramCarburant, $paramMarque, $paramModele){
            $this->setCarburant($paramCarburant);
            $this->setMarque($paramMarque);
            $this->setModele($paramModele);
            $this->setCouleur($paramCouleur);
        }
        
        
        /* un accesseur à la propriété carburant */
        public function getCarburant(){
            return $this->carburant;
        }
        
        // Accesseur pour la vitesse
        public function getVitesse(){
            return $this->vitesse;
        }
        
        // public function getRalentir(){
        //     return $this->ralentir;
        // }
        
        public function getCouleur(){
            return $this->couleur;
        }
        
        public function getMarque(){
            return $this->marque;
        }
        
        public function getModele(){
            return $this->modele;
        }
        
        
        /* un mutateur à la propriété carburant */
        public function setCarburant($paramCarburant){
            if ($paramCarburant == 'Gazoil'
                || $paramCarburant == 'Super'
                || $paramCarburant == 'GPL'){
                $this->carburant = $paramCarburant;
            }else{
                //*print('Erreur de carburant : RDV chez le garagiste !');
                //*die();
                //Déclencher une exception qui arrête l'éxécution
                //Si elle n'est pas catchée
                throw new Exception('Erreur de carburant : RDV chez le garagiste !', 666);
            }
        }
        
        /* un mutateur à la propriété couleur */
        public function setCouleur($paramCouleur){
            if ($paramCouleur == 'Rouge'
                || $paramCouleur == 'Blanche'
                || $paramCouleur == 'Grise'){
                $this->couleur = $paramCouleur;
            }else{
                //*print('Erreur de carburant : RDV chez le garagiste !');
                //*die();
                //Déclencher une exception qui arrête l'éxécution
                //Si elle n'est pas catchée
                throw new Exception('Erreur de couleur : RDV chez le garagiste !', 666);
            }
        }
        
        // mutateur pour la marque
        public function setMarque($paramMarque){
            $this->marque = $paramMarque;
        }
        
        // mutateur pour la modele
        public function setModele($paramModele){
            $this->modele = $paramModele;
        }
        
        
        
        // mutateur pour la vitesse
        public function setVitesse($paramVitesse){
            $this->vitesse = $paramVitesse;
        }
        
        //Mutateur pour la vitesse maximale
        public function setVitesseMaximale($paramVitesseMax){
            $this->vitesseMaximale = $paramVitesseMax;
        }
        
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
            if ($this->vitesse > $this->vitesseMaximale){
                $this->vitesse = $this->vitesseMaximale;
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
    }             
    
    

    