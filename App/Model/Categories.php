<?php
namespace App\Model;
use App\Utils\BddConnect;
class Categories extends BddConnect{
    private int $id;
    private string $nom;

    public function getId():int{
        return $this->id;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function setId(int $id):self{
        $this->id = $id;
        return $this;
    }
    public function setNom(string $nom):self{
        $this->nom = $nom;
        return $this;
    }
}
