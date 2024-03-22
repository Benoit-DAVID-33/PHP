<?php
abstract class Animal{
	private $nom, $dateArrivee;
	
	public function __construct($paramNom, $paramDateArrivee){
		$this->nom = $paramNom;
		$this->dateArrivee = $paramDateArrivee;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($paramNom){
		$this->nom = $paramNom;
	}

	public function getDateArrivee(){
		return $this->dateArrivee;
	}

	public function setDateArrivee($paramDateArrivee){
		$this->dateArrivee = $paramDateArrivee;
	}

	public function seDeplacer_V1(){
		if ($this instanceof Autruche){ //get_class($this) == Autruche::class
			return 'Je suis une Autruche et je vole.';
		}else if ($this instanceof Serpent){
			return 'Je suis un Serpent et je rampe.';
		}else if ($this instanceof Kangourou){
			return 'Je suis un Kagourou et je saute.';
		}else{
			return 'Je suis un '.get_class($this).' et je bouge';
		}
	}

	public function __toString(){
		return 'Je suis '.$this->getNom().', arrivé le '.$this->getDateArrivee();
	}

	public abstract function seDeplacer_V2();

	/* Comment faire pour que chaque animal se déplace correctement : 
		Le serpent rampe
		L'autruche vole 
		Le kangourou saute
	*/

	

}