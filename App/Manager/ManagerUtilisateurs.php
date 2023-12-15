<?php
namespace App\Manager;
use App\Manager\ManagerInterface;
use App\Model\Utilisateur;

class ManagerUtilisateurs extends Utilisateur implements ManagerInterface{
    public function create(){
        $nom = $this->getNom();
        $prenom = $this->getPrenom();
        $mail = $this->getMail();
        $mdp = $this->getMdp();
        $birth = $this->getDateNaissance();
        $role = $this->getRole()->getId();
        try {
            $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom,prenom,mail,mdp,date_naissance,id_role)VALUE(?,?,?,?,?,?)');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->bindParam(2,$prenom,\PDO::PARAM_STR);
            $req->bindParam(3,$mail,\PDO::PARAM_STR);
            $req->bindParam(4,$mdp,\PDO::PARAM_STR);
            $req->bindParam(5,$birth,\PDO::PARAM_STR);
            $req->bindParam(6,$role,\PDO::PARAM_INT);
            
            $req->execute();
            // return $req->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
    public function find(int $id):array{
        try {
            $req = $this->connexion()->prepare('SELECT id,nom FROM roles WHERE id = ?');
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
            $req = $this->connexion()->prepare('SELECT id,nom FROM roles');
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
            $req = $this->connexion()->prepare('UPDATE roles SET nom = ? WHERE id = ?');
            $req->bindParam(1,$nom,\PDO::PARAM_STR);
            $req->bindParam(2,$id,\PDO::PARAM_INT);
            $req->execute();
        } 
        catch (\Throwable $th) {
            die($th->getCode());
        }
    }
    public function delete($id):int{
        try {
            $req = $this->connexion()->prepare('DELETE FROM roles WHERE id = ?');
            $req->bindParam(1,$id,\PDO::PARAM_INT);
            return $req->execute();
            
        }
        catch (\Throwable $th) {
            echo $th->getCode();
            die($th->getCode());
        }
    }

}