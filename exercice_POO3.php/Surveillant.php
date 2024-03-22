<?php
    require_once "Personnel.php";
        class Surveillant extends Personnel{
            private  $anciennete;
        
            public function __construct( $paramNom, $paramPrenom, $paramAnciennete){
		        parent::__construct($paramNom, $paramPrenom);
		        $this->anciennete = $paramAnciennete;
	        }

	        public function getAnciennete(){
		        return $this->anciennete;
	        }
	        public function setAnciennete($paramAnciennete){
		        $this->anciennete = $paramAnciennete;
	        }
	        
            public function __toString(){
		        //return 'Je m\'appelle '.$this->getNom().' '.$this->getPrenom().' depuis'.$this->getDateArrivee();
		        return "Je m'appelle {$this->getNom()} {$this->getPrenom()} depuis {$this->anciennete}.";
	        }
    
    
}