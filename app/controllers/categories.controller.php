<?php
require_once './app/models/categories.model.php';
require_once './app/views/categories.view.php';
require_once './app/helpers/auth.helper.php';

class TaskController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        $this->authHelper = new AuthHelper();
    }

    public function showCategories() {
        // lista pública (si la querés pública, no checkLoggedIn acá)
        $categories = $this->model->getAllCategories();
        $this->view->showCategories($categories);
    }

    public function addCategories() {
        $this->authHelper->checkLoggedIn(); // protege
        // validar entrada...
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $this->model->insertCategories($nombre, $descripcion);
        header("Location: " . BASE_URL . 'list');
    }

    public function deleteCategories($id) {
        $this->authHelper->checkLoggedIn(); // protege
        $this->model->deleteCategoriesById($id);
        header("Location: " . BASE_URL . 'list');
    }

    public function showEditCategoryForm($id) {
        $this->authHelper->checkLoggedIn(); // protege
        $category = $this->model->getCategoryById($id);
        $this->view->showEditForm($category);
    }

    public function updateCategory($id) {
        $this->authHelper->checkLoggedIn(); // protege
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $this->model->updateCategory($id, $nombre, $descripcion);
        header("Location: " . BASE_URL . 'list');
    }
}
