<?php 
require_once "Animal.php";
 class Marsupilami extends Animal{
	private $couleurPoils;
	
	public function __construct($paramNom, $paramDateArrivee, $paramCouleur){
		parent::__construct($paramNom, $paramDateArrivee);
		$this->couleurPoils = $paramCouleur;
	}

	public function getCouleurPoils(){
		return $this->couleurPoils;
	}

	public function setCouleurPoils($paramCouleur){
		$this->couleurPoils = $paramCouleur;
	}
	
	public function seDeplacer_V2(){
		return 'Je suis un Marsupilami et je bondis.';
	}
 }