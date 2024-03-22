<?php 
class Produit{

	private string $reference, $designation;
	private float $prixUnitaireHT;

	public function __construct(string $paramReference, string $paramDesignation, float $paramPrixUnitaireHT){
		$this->reference = $paramReference;
		$this->designation = $paramDesignation;
		$this->prixUnitaireHT = $paramPrixUnitaireHT;
	}

	public function getReference(): string{
		return $this->reference;
	}

	public function setReference(string $paramReference): void{
		$this->reference = $paramReference;
	}

	public function getDesignation(): string{
		return $this->designation;
	}

	public function setDesignation(string $paramDesignation): void{
		$this->designation = $paramDesignation;
	}

	public function getPrixUnitaireHT(): float{
		return $this->prixUnitaireHT;
	}

	public function setPrixUnitaireHT(float $paramPrixUnitaireHT): void{
		$this->prixUnitaireHT = $paramPrixUnitaireHT;
	}

	public function __toString(): string{
		return "{$this->reference} : {$this->designation} : {$this->prixUnitaireHT} € HT";
	}
}