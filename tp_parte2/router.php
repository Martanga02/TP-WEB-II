<?php
require_once './app/controllers/categories.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// tabla de ruteo
// tabla de ruteo
switch ($params[0]) {
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
    case 'list':
        $taskController = new TaskController();
        $taskController->showCategories();
        break;

    case 'add':
        $taskController = new TaskController();
        $taskController->addCategories();
        break;

    case 'delete':
        $taskController = new TaskController();
        $id = $params[1];
        $taskController->deleteCategories($id);
        break;
    // Mostrar formulario de edición
    case 'editCategory':
        $taskController = new TaskController();
        $id = $params[1];
        $taskController->showEditCategoryForm($id);
        break;

    // Procesar actualización
    case 'updateCategory':
        $taskController = new TaskController();
        $id = $params[1];
        $taskController->updateCategory($id);
        break;

    default:
        echo('404 Page not found');
        break;
}

