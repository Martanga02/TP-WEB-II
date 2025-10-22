<?php
require_once './app/models/categories.model.php';
require_once './app/views/categories.view.php';
require_once './app/helpers/auth.helper.php';

class CategoriesController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new CategoriesModel(); // antes TaskModel
        $this->view = new CategoriesView();   // antes TaskView
        $this->authHelper = new AuthHelper();
    }

    // --- VER PELÍCULAS DE UNA CATEGORÍA ---
    public function showCategoryItems($id) {
        $category = $this->model->getCategoryById($id);
        if ($category) {
            $items = $this->model->getItemsByCategoryId($id);
            $this->view->showCategoryItems($category, $items);
        } else {
            header("Location: " . BASE_URL . 'list');
        }
    }


    // --- LISTAR ---
    public function showCategories() {
        // lista pública
        $categories = $this->model->getAllCategories();
        $this->view->showCategories($categories);
    }

   // --- AGREGAR ---
    public function addCategories() {
        $this->authHelper->checkLoggedIn(); // protege

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $imagen = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png'])) {
                $imagen = $_FILES['image'];
            } else {
                $this->view->showError("Formato de imagen no permitido.");
                return;
            }
        }

        $this->model->insertCategories($nombre, $descripcion, $imagen);

        header("Location: " . BASE_URL . 'list');
    }


    // --- ELIMINAR ---
    public function deleteCategories($id) {
        $this->authHelper->checkLoggedIn(); // protege
        $this->model->deleteCategoriesById($id);
        header("Location: " . BASE_URL . 'list');
    }

    // --- FORMULARIO DE EDICIÓN ---
    public function showEditCategoryForm($id) {
        $this->authHelper->checkLoggedIn(); // protege
        $category = $this->model->getCategoryById($id);
        if ($category) {
            $this->view->showEditForm($category);
        } else {
            header("Location: " . BASE_URL . 'list');
        }
    }

    // --- ACTUALIZAR ---
    public function updateCategory($id) {
        $this->authHelper->checkLoggedIn(); // protege

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $imagen = null;

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png'])) {
                $imagen = $_FILES['imagen'];
            } else {
                $this->view->showError("Formato de imagen no permitido.");
                return;
            }
        }

        $this->model->updateCategory($id, $nombre, $descripcion, $imagen);

        header("Location: " . BASE_URL . 'list');
    }
}
