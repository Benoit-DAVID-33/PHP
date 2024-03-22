<?php
require_once "Animal.php";
class Serpent extends Animal{
	private $couleurEcailles;
	
	public function __construct($paramNom, $paramDateArrivee, $paramCouleur){
		parent::__construct($paramNom, $paramDateArrivee);
		$this->couleurEcailles = $paramCouleur;
	}

	public function getCouleurEcailles(){
		return $this->couleurEcailles;
	}

	public function setCouleurEcailles($paramCouleur){
		$this->couleurEcailles = $paramCouleur;
	}
		public function seDeplacer_V2(){
		return 'Je suis un Serpent et je rampe.';
	}
}