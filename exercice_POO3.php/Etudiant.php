<?php
    require_once "Personne.php";
    class Etudiant extends Personne{
        private $dateNaissance, $commentaire;
        
        public function __construct( $paramNom, $paramPrenom, $paramDateDeNaissance, $paramCommentaire = ''){
		        parent::__construct($paramNom, $paramPrenom);
		        $this->dateDeNaissance = $paramDateDeNaissance;
		        $this->commentaire = $paramCommentaire;
	   }

	    public function getDateNaissance(){
		    return $this->dateNaissance;
	    }
	    public function setDateNaissance($paramDateNaissance){
		    $this->nom = $paramDateNaissance;
	    }
	    
	    public function getCommentaire(){
		    return $this->commentaire;
	    }
	    public function setCommentaire($paramCommentaire){
		    $this->nom = $paramCommentaire;
	    }
	    
	    public function getAge(){
	        $dateAujourdhui = date_create(date('Y-m-d'));
	        $dateEtudiant = date_create($this->dateNaissance);
	        $difference = date_diff($dateEtudiant, $dateAujourdhui);
	        return $difference->format('%y');
	    }
    
        public function __toString(): string{
		    //return 'Je m\'appelle '.$this->getNom().' '.$this->getPrenom().' , j\'ai'.$this->getDateNaissance();
		    return "Je m'appelle {$this->getNom()} {$this->getPrenom()}, j'ai {$this->getAge()}.";
    	}
    
    
    }
    