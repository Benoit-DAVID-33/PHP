<?php
    class Produit{
    	private string $reference, $designation;
    	private float $prixUnitaireHt;
    	
        public function __construct($paramReference, $paramDesignation, $paramPrixUnitaireHt){
                $this->reference = $paramReference;
                $this->designation = $paramDesignation;
                $this->prixUnitaireHt = $paramPrixUnitaireHt;
        		}
        		
                public function getReference(){
		            return $this->reference;
	            }
	            public function setReference($paramReference){
		            $this->reference= $paramReference;
	            }
	            
	            public function getDesignation(){
		            return $this->designation;
	            }
	            public function setDesignation($paramDesignation){
		            $this->designation= $paramDesignation;
	            }
	            
	            public function getPrixUnitaireHt(){
		            return $this->prixUnitaireHt;
	            }
	            public function setPrixUnitaireHt($paramPrixUnitaireHt){
		            $this->prixUnitaireHt= $paramPrixUnitaireHt;
	            }
	            
	            public function __toString(): string{
	            	return "{$this->reference} : {$this->designation} : {$this->prixUnitaireHt} "
	            }
    }