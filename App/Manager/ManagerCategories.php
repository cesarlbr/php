<?php
namespace App\Manager;
use App\Manager\ManagerInterface;
use App\Model\Categories;

class ManagerCategories extends Categories implements ManagerInterface{
    public function create(){
        $nom = $this->getNom();
        try {
            $req = $this->connexion()->prepare('INSERT INTO categorie(nom)VALUE(?)');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->execute();
            
        } catch (\Throwable $th) {
            die($th->getCode());
        }
    }
    public function find(int $id):array{
        try {
            $req = $this->connexion()->prepare('SELECT id,nom FROM categorie WHERE id = ?');
            $req->bindParam(1,$id,\PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_OBJ);
        } 
        catch (\Throwable $th) {
            die($th->getCode());
        }
    }
    public function findAll():array{
        try {
            $req = $this->connexion()->prepare('SELECT id,nom FROM categorie');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_ASSOC);
        } 
        catch (\Throwable $th) {
            die($th->getCode());
        }
    }
    public function update(int $id):void{
        $nom = $this->getNom();
        try {
            $req = $this->connexion()->prepare('UPDATE categorie SET nom = ? WHERE id = ?');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->bindParam(2,$id,\PDO::PARAM_INT);
            $req->execute();
        } 
        catch (\Throwable $th) {
            die($th->getCode());
        }
    }
    public function delete($id){
        try {
            $req = $this->connexion()->prepare('DELETE FROM categorie WHERE id = ?');
            $req->bindParam(1,$id,\PDO::PARAM_INT);
            $req->execute();
            
        }
        catch (\Throwable $th) {
            die($th->getCode());
        }
    }

    
}