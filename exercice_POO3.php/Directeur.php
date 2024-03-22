<?php
    require_once "Personnel.php";
        class Directeur extends Personnel{
            private  $dateDePriseDePoste;
        
            public function __construct($paramNom, $paramPrenom, $paramDateDePriseDePoste){
		        parent::__construct($paramNom, $paramPrenom);
		        $this->dateDePriseDePoste = $paramDateDePriseDePoste;
	        }
	        
	        public function getDateDePriseDePoste(){
		        return $this->dateDePriseDePoste;
	        }
	        public function setDateDePriseDePoste($paramDateDePriseDePoste){
		        $this-> dateDePriseDePoste= $paramDateDePriseDePoste;
	        }
	        
	        public function calculAnciennete(): int{
	            $anneeActuelle = Date('Y');
	            $anneePriseDePoste = date_create_from_format('Y-m-d', $this->dateDePriseDePoste)->format('Y');
	            return $anneeActuelle - $anneePriseDePoste;
	            
	        }
	        
	        public function __toString(): string{
		        //return 'Je m\'appelle'.$this->getNom().' '.$this->getPrenom().', je suis directeur depuis'.$this->getDateArrivee();
                return "Je m'appelle {$this->getNom()} {$this->getPrenom()}, je suis directeur depuis {$this->calculAnciennete()}.";
	        }
    
    }