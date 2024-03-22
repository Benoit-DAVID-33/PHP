<?php
require_once "LigneFacture.php";

    class Facture{
         private string $code;
         private DateTime $dateFacture;
         private $lignes =array();
         
         public function __construct(DateTime $paramDate, $paramLignes){
         	$this->codeFacture = $this->geneCodeFacture($paramDate);
         	$this->dateFactrue = $paramDate;
         	$this->Lignes = $paramLignes;
        	}
            
	        public function getCodeFacture(): string{
		        return $this->codeFacture;
	        }
	        public function setCodeFacture(string $paramCode): void{
		        $this->codeFacture = $paramCode;
	        }
	        
	        public function getDateFacture(): DateTime{
		        return $this->dateFacture;
	        }
	        public function setDateFacture(DateTime $paramDateFacture){
		        $this->dateFacture = $paramDateFacture;
	        }
	        
	        public function getLignes(): array{
	        	return $this->Lignes;
	        }
	        
	        public function setLigne($paramLignes = array()): void{
	        	$this->lignes = paramLignes;
	        }
	        
	        public function getLigne()
	        
	        
    
        
}