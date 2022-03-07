<?php

class Employe{
    private $Id;
    private $Nom;
    private $Matricule;
    private $Prenom;
    private $Date_de_naissance;
    private $Departement;
    private $Salaire;
    private $Fonction;
    private $Photo;

    
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

    public function getdate_de_naissance() {
        return $this->Date_de_naissance;
    }
    public function setdate_de_naissance($Date_de_naissance) {
        $this->Date_de_naissance = $Date_de_naissance;
    }
    public function getdepartement() {
        return $this->Departement;
    }
    public function setdepartement($Departement) {
        $this->Departement = $Departement;
    }
    public function getsalaire() {
        return $this->Salaire;
    }
    public function setsalaire($Salaire) {
        $this->Salaire = $Salaire;
    }
    public function getfonction() {
        return $this->Fonction;
    }
    public function setfonction($Fonction) {
        $this->Fonction = $Fonction;
    }
    public function getphoto() {
        return $this->Photo;
    }
    public function setphoto($Photo) {
        $this->Photo = $Photo;
    }
    public function getmatricule() {
        return $this->Matricule;
    }
    public function setmatricule($Matricule) {
        $this->Matricule = $Matricule;
    }
    
    public function getpassword() {
        return $this->Password;
    }
    public function setpassword($Password) {
        $this->Password = $Password;
    }


}
     
?>