<?php
require_once "Facture.php";

class Client{
	private string $nom, $prenom;
	private $factures = array();

	public function __construct(string $paramNom, string $paramPrenom, $paramFactures = array()){
		$this->nom = $paramNom;
		$this->prenom = $paramPrenom;
		$this->factures = $paramFactures;
	}

	public function getNom(): string{
		return $this->nom;
	}

	public function setNom(string $paramNom): void{
		$this->nom = $paramNom;
	}

	public function getPrenom(): string{
		return $this->prenom;
	}

	public function setPrenom(string $paramPrenom){
		$this->prenom = $paramPrenom;
	}

	public function getFactures(): array{
		return $this->factures;
	}

	public function setFactures($paramFactures = array()): void{
		$this->factures = $paramFactures;
	}

	public function getFacture(int $paramIndice): Facture {
		return $this->factures[$paramIndice];
	}

	public function setFacture(Facture $paramFacture, int $paramIndice = null): void {
		if (is_null($paramIndice)){
			$this->factures[] = $paramFacture;
		}else{
			$this->factures[$paramIndice] = $paramFacture;
		}
	}

	public function getCA(): float{
		$ca = 0;
		foreach ($this->factures as $facture){
			$ca += $facture->getMontant();
		}
		return $ca;
	}

	public function __toString(): string{
		return "{$this->nom} {$this->prenom}";
	}
}