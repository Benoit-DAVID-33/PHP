<?php
class Cpville{
    private int $id;
    private string $codePostal, $ville;
    
    /**
     * @param $libelleCourt : libellé court affecté à l'attribut $this->libelleCOURT
     * @param $libelleLong : libellé court affecté à l'attribut $this->libellelong
     */ 
    public function __construct(string $codePostal, string $ville){
    $this->codePostal = $codePostal;
    $this->ville = $ville;
    $this->id = 0;
    }
    
    public function getId(): int{
        return $this->id;
    }
    
    public function setId(int $id): void{
        $this->id = $id;
    }
    
    public function getCodePostal(): string{
        return $this->codePostal;
    }
    
    public function setCodePostal(string $codePostal): void{
        $this->codePostal = $codePostal;
    }
    
    public function getVille(): string{
        return $this->ville;
    }
    
    public function setVille(string $ville): void{
        $this->ville = $ville;
    }
}