<?php 
require_once "Animal.php";
 class Autruche extends Animal{
	private $couleurPlumes;
 
	
	public function __construct($paramNom, $paramDateArrivee, $paramCouleur){
		parent::__construct($paramNom, $paramDateArrivee);
		$this->couleurPlumes = $paramCouleur;
	}

	public function getCouleurPlumes(){
		return $this->couleurPlumes;
	}

	public function setCouleurPlumes($paramCouleur){
		$this->couleurPlumes = $paramCouleur;
	}
	
	public function seDeplacer_V2(){
		return 'Je suis une Autruche et je vole.';
	}
 }