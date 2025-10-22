<?php
require_once './app/controllers/categories.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/item.controller.php';

// Definir la URL base
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// Acción por defecto
$action = 'list';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Parsear acción: ej. "delete/3" → ['delete', 3]
$params = explode('/', $action);

// Tabla de ruteo
switch ($params[0]) {

    // --- AUTH ---
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;

    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    // --- CATEGORIES ---


    case 'list':
        $taskController = new CategoriesController();
        $taskController->showCategories();
        break;

    case 'category':   // ruta para ver películas de una categoría
        if (isset($params[1])) {
            $taskController = new CategoriesController();
            $taskController->showCategoryItems($params[1]);
        }
    break;

    case 'add':
        $taskController = new CategoriesController();
        $taskController->addCategories();
        break;

    case 'delete':
        if (isset($params[1])) {
            $taskController = new CategoriesController();
            $taskController->deleteCategories($params[1]);
        }
        break;

    case 'editCategory':
        if (isset($params[1])) {
            $taskController = new CategoriesController();
            $taskController->showEditCategoryForm($params[1]);
        }
        break;

    case 'updateCategory':
        if (isset($params[1])) {
            $taskController = new CategoriesController();
            $taskController->updateCategory($params[1]);
        }
        break;

    // --- ITEMS ---
    case 'peliculas':
        $itemController = new ItemController();
        $itemController->showItems();
        break;

    case 'pelicula':
        if (isset($params[1])) {
            $itemController = new ItemController();
            $itemController->showItemDetail($params[1]);
        }
        break;

    case 'adminItems':
        $itemController = new ItemController();
        $itemController->showAdminItems();
        break;

    case 'addItem':
        $itemController = new ItemController();
        $itemController->addItem();
        break;

    case 'deleteItem':
        if (isset($params[1])) {
            $itemController = new ItemController();
            $itemController->deleteItem($params[1]);
        }
        break;

    case 'editItem':
        if (isset($params[1])) {
            $itemController = new ItemController();
            $itemController->showEditItemForm($params[1]);
        }
        break;

    case 'updateItem':
        if (isset($params[1])) {
            $itemController = new ItemController();
            $itemController->updateItem($params[1]);
        }
        break;

    // --- DEFAULT ---
    default:
        echo('404 Page not found');
        break;
}
