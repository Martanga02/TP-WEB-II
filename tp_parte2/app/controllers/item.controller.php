<?php
require_once './app/models/items.model.php';
require_once './app/models/categories.model.php';
require_once './app/views/items.view.php';
require_once './app/helpers/auth.helper.php';

class ItemController {
    private $model;
    private $categoryModel;
    private $view;
    private $authHelper;

    public function __construct() {
        // Modelos y helpers
        $this->model = new ItemsModel();           // Modelo de películas
        $this->categoryModel = new CategoriesModel(); // Modelo de géneros
        $this->view = new ItemView();              // Vista
        $this->authHelper = new AuthHelper();      // Helper de sesión/autenticación
    }

    // --- LISTAR ---
    public function showItems() {
        $items = $this->model->getAllItems();

        $categories = [];
        if (isset($_SESSION['IS_LOGGED'])) {
            $categories = $this->categoryModel->getAllCategories();
        }

        $this->view->showItems($items, $categories);
    }

    // --- DETALLE ---
    public function showItemDetail($id) {
        $item = $this->model->getItemById($id);
        if ($item) {
            $this->view->showItemDetail($item);
        } else {
            echo('404 Page not found');
        }
    }

    // --- PANEL ADMIN ---
    public function showAdminItems() {
        $this->authHelper->checkLoggedIn();
        $items = $this->model->getAllItems();
        $categories = $this->categoryModel->getAllCategories();
        $this->view->showAdminPanel($items, $categories);
    }

    // --- AGREGAR ---
    public function addItem() {
        $this->authHelper->checkLoggedIn();

        $nombre = $_POST['nombre'];
        $estudio = $_POST['estudio'];
        $id_genero = $_POST['id_genero'];

        $this->model->insertItem($nombre, $estudio, $id_genero);

        $this->view->redirect('peliculas');
    }

    // --- ELIMINAR ---
    public function deleteItem($id) {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteItemById($id);
        $this->view->redirect('peliculas');
    }

    // --- EDITAR FORMULARIO ---
    public function showEditItemForm($id) {
        $this->authHelper->checkLoggedIn();

        $item = $this->model->getItemById($id);
        $categories = $this->categoryModel->getAllCategories();

        if ($item) {
            $this->view->showEditForm($item, $categories);
        } else {
            $this->view->redirect('peliculas');
        }
    }

    // --- ACTUALIZAR ---
    public function updateItem($id) {
        $this->authHelper->checkLoggedIn();

        $nombre = $_POST['nombre'];
        $estudio = $_POST['estudio'];
        $id_genero = $_POST['id_genero'];

        $this->model->updateItem($id, $nombre, $estudio, $id_genero);

        $this->view->redirect('peliculas');
    }
}
