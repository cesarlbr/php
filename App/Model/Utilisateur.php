<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Roles;
class Utilisateur extends BddConnect{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $mail;
    private string $mdp;
    private string $dateNaissance;
    private bool $activeUtilisateur;
    private Roles $role;
    public function __construct(){
        $this->role = new Roles();
    }
    public function getId():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function getPrenom():string{
        return $this->prenom;
    }
    public function getMail():string{
        return $this->mail;
    }
    public function getMdp():string{
        return $this->mdp;
    }
    public function getDateNaissance():string{
        return $this->dateNaissance;
    }
    public function getActiveUtilisateur():bool{
        return $this->activeUtilisateur;
    }
    public function getRole():Roles{
        return $this->role;
    }
    
    public function setId(int $id):self{
        $this->id = $id;
        return $this;
    }
    public function setNom(string $nom):self{
        $this->nom = $nom;
        return $this;
    }
    public function setPrenom(string $prenom):self{
        $this->prenom = $prenom;
        return $this;
    }
    public function setMail(string $mail):self{
        $this->mail = $mail;
        return $this;
    }
    public function setMdp(string $mdp):self{
        $this->mdp = $mdp;
        return $this;
    }
    public function setdateNaissance(string $date):self{
        $this->dateNaissance = $date;
        return $this;
    }
    public function setActiveUtilisateur(bool $active):self{
        $this->activeUtilisateur = $active;
        return $this;
    }
    public function setRole(Roles $roles):self{
        $this->role = $roles;
        return $this;
    }
}
