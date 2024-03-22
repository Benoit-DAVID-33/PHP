<?php
require_once "Facture.php";
    class Client{
        private string $nom, $prenom;
        private $factures =array();
        
        public function __construct(string $ParamNom, string $paramPrenom, $paramFacture = array()){
    		$this->nom = $paramNom;
    		$this->prenom = $paramPrenom;
    		$this->factures = $paramFactures;
        	
        }
            public function getNom(){
		        return $this->nom;
	        }
	        public function setNom(string $paramNom): void{
		        $this->nom= $paramNom;
	        }
	        
	        public function getPrenom(): string{
		        return $this->prenom;
	        }
	        public function setPrenom(string $paramPrenom){
		        $this->nom= $paramPrenom;
	        }
	        
	        public function getFactures(): array{
		        return $this->factures;
	        }
	        public function setFacture($paramFactures = array()): void{
		        $this->facture= $paramFactures;
	        }
	        
	        public function getFacture(int $paramIndice): Facture {
	        	return $this->factures($paraIndice);
	        }
        }
    