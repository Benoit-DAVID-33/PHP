<?php
    
    class Vehicule{
        
        private $couleur, $marque, $modele, $nbRoues;
        
        // Constructeur
        public function __construct($paramCouleur, $paramMarque, $paramModele, $paramNbRoues){
            $this->couleur = $paramCouleur;
            $this->marque = $paramMarque;
            $this->modele = $paramModele;
            $this->nbRoues = $paramNbRoues;
        }
        
        // Accesseurs / Mutateurs
        public function getCouleur(){
            return $this->couleur;
        }
        
        public function setCouleur($paramCouleur){
            $this->couleur = $paramCouleur;
        }
        
        public function getMarque(){
            return $this->marque;
        }
        
        public function setMarque($paramMarque){
            $this->marque = $paramMarque;
        }
        
        public function getModele(){
            return $this->modele;
        }
        
        public function setModele($paramModele){
            $this->modele = $paramModele;
        }
        
        public function getNbRoues(){
            return $this->nbRoues;
        }
        
        public function setNbRoues($paramNbRoues){
            $this->nbRoues = $paramNbRoues;
        }
        
        
        // Methode
        public function seDeplacer(){
            print("Je suis un véhicule et je me déplace sur {$this->nbRoues} roues");
        }
    }