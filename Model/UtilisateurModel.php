<?php
class UtilisateurModel
{
    private ?int $idUtilisateur = null;
    private ?string $Prenom = null;
    private ?string $Nom = null;
    private ?string $MDP = null;
    private ?string $Email = null;
    private ?string $Role = null;
    public function __construct($id = null, $p, $n, $mdp, $e, $r)
    {
        $this->idUtilisateur= $id;
        $this->Prenom = $p;
        $this->Nom= $n;
        $this->MDP = $mdp;
        $this->Email = $e;
        $this->Role = $r;
    }

   
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getNom()
    {
        return $this->Nom;
    }


    public function setNom($Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }

 
    public function getPrenom()
    {
        return $this->Prenom;
    }

 
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;

        return $this;
    }

 
    public function getMDP()
    {
        return $this->MDP;
    }

    public function setMDP($MDP)
    {
        $this->MDP = $MDP;

        return $this;
    }

    public function getEmail()
    {
        return $this->Email;
    }


    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    public function getRole()
    {
        return $this->Role;
    }

    public function setRole($Role)
    {
        $this->Role = $Role;

        return $this;
    } 
}