<?php
require_once "Directeur.php";

class Ecole{
	private string $nom;
	private Directeur|NULL $directeur;
	private $professeurs = array(), $etudiants = array();

	public function __construct(string $paramNom, ?Directeur $paramDirecteur = null, $paramProfesseurs = array(), $paramEtudiants= array()){
		$this->nom = $paramNom;

		$this->directeur = $paramDirecteur;
		$this->setProfesseurs($paramProfesseurs);
		$this->setEtudiants($paramEtudiants);
	}

	public function getNom(): string{
		return $this->nom;
	}

	public function setNom(string $paramNom): void{
		$this->nom = $paramNom;
	}

	public function getDirecteur(): Directeur{
		return $this->directeur;
	}
	public function setDirecteur(Directeur $paramDirecteur): void{
		$this->directeur = $paramDirecteur;
	}

	public function getEtudiants(): array{
		return $this->etudiants;
	}
	public function setEtudiants($paramEtudiants = array()): void{
		$this->etudiants = $paramEtudiants;
	}

	public function getProfesseurs(): array{
		return $this->professeurs;
	}

	public function setProfesseurs($paramProfesseurs = array()): void{
		$this->professeurs = $paramProfesseurs;
	}

	public function getEtudiant(int $indice): Etudiant{
		return $this->etudiants[$indice];
	}

	public function setEtudiant(Etudiant $paramEtudiant, int $indice = null){
		if (is_null($indice)){
			$this->etudiants[] = $paramEtudiant;
		}else{
			$this->etudiants[$indice] = $paramEtudiant;
		}
	}

	public function getProfesseur(int $indice): Professeur{
		return $this->professeurs[$indice];
	}

	public function setProfesseur(Professeur $paramProfesseur, int $indice = null){
		if (is_null($indice)){
			$this->professeurs[] = $paramProfesseur;
		}else{
			$this->professeurs[$indice] = $paramProfesseur;
		}
	}

	public function getNbProfs(): int{
		return count($this->professeurs);
	}

	public function getNbEtudiants(): int{
		return count($this->etudiants);
	}

	public function __toString(): string{
		return "Ecole: {$this->nom}<br>
			Mon Directeur : {$this->directeur->getNom()} {$this->directeur->getPrenom()} <br>
			J'ai {$this->getNbProfs()} professeurs<br>
			J'ai {$this->getNbEtudiants()} étudiants<br>";
	}
}