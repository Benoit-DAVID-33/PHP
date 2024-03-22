<?php
require_once "Animal.php";
class Dauphin extends Animal{
	private $couleurPeau;
	
	public function __construct($paramNom, $paramDateArrivee, $paramCouleur){
		parent::__construct($paramNom, $paramDateArrivee);
		$this->couleurPeau = $paramCouleur;
	}

	public function getCouleurPeau(){
		return $this->couleurPeau;
	}

	public function setCouleurPeau($paramCouleur){
		$this->couleurPeau = $paramCouleur;
	}

	public function seDeplacer_V2(){
		return 'Je suis un Dauphin et je nage.';
	}
}