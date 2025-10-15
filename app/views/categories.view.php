<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class TaskView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showCategories($categories) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($categories)); 
        $this->smarty->assign('categories', $categories);

        // mostrar el tpl
        $this->smarty->display('taskList.tpl');
    }

    function showEditForm($category) {
        $this->smarty->assign('category', $category);
        $this->smarty->display('editCategory.tpl');
    }
    
}