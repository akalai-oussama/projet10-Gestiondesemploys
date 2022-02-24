<?php

class Employe{
    private $Id;
    private $Nom;
    private $Prenom;
    private $Date_de_naissance;

    
    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getNom() {
        return $this->Nom;
    }
    public function setNom($nom) {
        $this->Nom = $nom;
    }

    public function getPrenom() {
        return $this->Prenom;
    }
    public function setPrenom($prenom) {
        $this->Prenom = $prenom;
    }

    public function getDate_de_naissance() {
        return $this->Date_de_naissance;
    }
    public function setDate_de_naissance($Date_de_naissance) {
        $this->Date_de_naissance = $Date_de_naissance;
    }

}
     
?>