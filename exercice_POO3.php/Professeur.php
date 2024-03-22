<?php
    require_once "Personnel.php";
        class Professeur extends Personnel{
            private  $anciennete, $matieres;
        
            public function __construct($paramNom, $paramPrenom, $paramAnciennete = 0, $paramMatieres = array()){
		        parent::__construct($paramNom, $paramPrenom);
		        $this->anciennete = $paramAnciennete;
		        
		        if (!is_array($paramMatieres)){
		            $this->matieres[] = $paramMatieres;
		        }else{
		            $this->matieres = $paramMatieres;
	        } }  
	    
	        public function getAnciennete(){
		        return $this->anciennete;
	        }
	        public function setAnciennete($paramAnciennete){
		        $this->anciennete = $paramAnciennete;
	        }
	        
	        public function getMatieres(){
		        return $this->matieres;
	        }
	        public function setMatieres($paramMatieres){
	            if (!is_array($paramMatieres)){
		            $this->matieres[] = $paramMatieres;
		        }else{
		        $this->matieres = $paramMatieres;
	        }}
	        
	        public function setMatiere($paramMatiere, $indice = null){
	            if (is_null($indice)){
	                $this->matieres[] = $paramMatiere;
	                //array_push($this->matiere, $paramMatiere);
	            }else{
	                $this->matieres[$indice] = $paramMatiere;
	            }
	        }
	        
	        public function getMatiere($indice){
	            return $this->matieres($indice);
	            
	        }
	        
	        private function getListeMatieres(): string{
	            $listeMatiere = join(',', $this->matieres);
	            return $listeMatiere;
	        }
        
            public function __toString(): string{
		        //return 'Je m\'appelle'.$this->getNom().' '.$this->getPrenom().', j\'enseigne'.$this->getMatieres();
		        //return "Je m'appelle {$this->getNom()} {$this->getPrenom()}, j'enseigne {$this->getListeMatieres()}.";
				return parent::__toString().", j'enseigne {$this->getListeMatieres()}.";
	}
    
    
}