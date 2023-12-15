<?php
namespace App\Controller;
use App\Manager\ManagerCategories;
class CategoriesController extends ManagerCategories{
    public function addCategories(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $json = file_get_contents("php://input");
        $code = 200;
        $message = "";
        if($json){
            $data = json_decode($json, true);
            $this->setNom($data["nom"]);
            $this->create();
            $message = ['ok'=>'Le Categorie a ete ajoute en BDD' ];
        }
        else{
            $code = 400;
            $message = ["error"=>"le Json est invalide"];
        }
        http_response_code($code);
        echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
    }
    public function findCategoriesById(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $code = 200;
        $message = "";
        if(isset($_GET["id"]) AND !empty($_GET["id"])){
            $data = $this->find($_GET["id"]);
            if($data){
                $message = $data;
            }
            else{
                $message = ['error'=>'La categorie n\'existe pas en BDD'];
                $code = 400;
            }
        }
        else{
            $message = ['error'=>'param id vide'];
            $code = 400;
        }
        http_response_code($code);
        echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
    }
    public function findAllCategories(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $code = 200;
        $message = "";
        $data = $this->findAll();
        if($data){
            $message = $data;
/*             var_dump($message);
            die; */
        }
        else{
            $message = ['error'=>'La categorie n\'existe pas en BDD'];
            $code = 400;
        }
        http_response_code($code);
        echo json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function updateCategories(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $json = file_get_contents("php://input");
        $code = 200;
        $message = "";
        if($json){
            $data = json_decode($json, true);
            $id = $data["id"];
            $this->setNom($data["nom"]);
            $this->update($id);
            $message = ['ok'=>'La categorie a ete mis a jour en BDD' ];
        }
        else{
            $code = 400;
            $message = ["error"=>"le Json est invalide"];
        }
        http_response_code($code);
        echo mb_convert_encoding(json_encode($message), "UTF-8", mb_list_encodings());
    }

    public function deleteCategories(){
        header('Access-Control-Allow-Origin: *, Content-Type : application/json');
        $code = 200;
        $message = "";
        if(isset($_GET["id"]) AND !empty($_GET["id"])){
            $data = $this->delete($_GET["id"]);
            if($data){
                $message = ['ok'=>'supprimer'];
            }
            else{
                $message = ['error'=>'id inexistant'];
                $code = 400;
            }
        }
        else{
            $message = ['error'=>'param id vide'];
            $code = 400;
        }
        http_response_code($code);
        echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
    }
}
?>