<?php 
require_once "LigneFacture.php";

class Facture{
	public static $nbFactures = 0;

	private string $codeFacture;
	private DateTime $dateFacture;
	private $lignes = array();

	public function __construct(DateTime $paramDate, $paramLignes){
		$this->codeFacture = $this->geneCodeFacture($paramDate);
		$this->dateFacture = $paramDate;
		$this->lignes = $paramLignes;
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
		return $this->lignes;
	}

	public function setLignes($paramLignes = array()): void{
		$this->lignes = $paramLignes;
	}

	public function getLigne(int $paramIndice): LigneFacture {
		return $this->lignes[$paramIndice];
	}

	public function setLigne(LigneFacture $paramLigne, int $paramIndice = null): void {
		if (is_null($paramIndice)){
			$this->lignes[] = $paramLigne;
		}else{
			$this->lignes[$paramIndice] = $paramLigne;
		}
	}

	private function geneCodeFacture(DateTime $paramDate): string{
		// Appel au nbFactures : variable de classe (variable déclarée avec static) 
		Facture::$nbFactures++;
		// La fonction str_pad permet de compléter avec des 0 le numéro de facture sur 3 digit 
		return "F{$paramDate->format('Y')}-{$paramDate->format('m')}-".str_pad(Facture::$nbFactures, 3, '0', STR_PAD_LEFT);
	}

	public function getMontant(): float{
		$montant = 0;
		foreach ($this->lignes as $ligne){
			$montant += $ligne->getMontant();
		}
		return $montant;
	}

	public function __toString(): string {
		return "{$this->codeFacture} : du {$this->dateFacture->format('d/m/Y')} pour un montant de {$this->getMontant()} € HT";
	}
}