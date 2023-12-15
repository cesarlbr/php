<?php
    //require_once './env.php';
    //import de l'autoloader des classes
    require_once './autoload.php';
    use App\Controller\HomeController;
    use App\Controller\RolesController;
    use App\Controller\CategoriesController;
    use App\Controller\UtilisateurController;
    $rolesController = new RolesController();
    $categoriesController = new CategoriesController();
    $homeController = new HomeController();
    $utilisateurController = new UtilisateurController();
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    $id = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/openclassroom/':
            $homeController->getHome();
            break;
        case '/openclassroom/api/roles/add':
            $rolesController->addRoles();
            break;
        case '/openclassroom/api/roles/':
            $rolesController->findRolesById();
            break;
        case '/openclassroom/api/roles/all':
            $rolesController->findAllRoles();
            break;
        case '/openclassroom/api/roles/update':
            $rolesController->updateRoles();
            break;
        case '/openclassroom/api/roles/delete/':
            $rolesController->deleteRoles();
            break;
        case '/openclassroom/api/categories/add':
            $categoriesController->addCategories();
            break;
        case '/openclassroom/api/categories/':
            $categoriesController->findCategoriesById();
            break;
        case '/openclassroom/api/categories/all':
            $categoriesController->findAllCategories();
            break;
        case '/openclassroom/api/categories/update':
            $categoriesController->updateCategories();
            break;
        case '/openclassroom/api/categories/delete/':
            $categoriesController->deleteCategories();
            break;
        case '/openclassroom/api/utilisateur/add':
            $utilisateurController->addUtilisateur();
            break;
            
        default:
            $homeController->get404();
            break;
    }
?>
