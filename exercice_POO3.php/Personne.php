<?php
     class Personne{
        private $nom, $prenom;
        public function __construct( $paramNom, $paramPrenom){
            $this->nom = $paramNom;
            $this->prenom = $paramPrenom;
        }
        
        public function getNom(){
            return $this->nom;
        }
        
        public function setNom($paramNom){
            $this->nom = $paramNom;
        }
        
        public function getPrenom(){
            return $this->prenom;
        }
        
        public function setPrenom($paramPrenom){
            $this->prenom = $paramPrenom;
        }

        public function __toString(): string{
             return "Je m'appelle {$this->getNom()} {$this->getPrenom()}";
         }
         
     }    

        
        
        
       
    