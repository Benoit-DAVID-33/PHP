<?php
require_once "Produit.php";

class LigneFacture{
	private int $quantite;
	private Produit $produit;

	public function __construct(int $paramQuantite, Produit $paramProduit){
		$this->quantite = $paramQuantite;
		$this->produit = $paramProduit;
	}

	public function getQuantite(): int{
		return $this->quantite;
	}

	public function setQuantite(int $paramQuantite): void{
		$this->quantite = $paramQuantite;
	}

	public function getProduit(): Produit{
		return $this->produit;
	}

	public function setProduit(Produit $paramProduit): void{
		$this->produit = $paramProduit;
	}

	public function getMontant(): float{
		return $this->quantite * $this->getProduit()->getPrixUnitaireHT();
	}

	public function __toString(): string{
		return "LFA : {$this->quantite} => {$this->getProduit()} soit : {$this->getMontant()} € HT";
	}
}