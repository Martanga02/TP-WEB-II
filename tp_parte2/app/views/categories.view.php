<?php

class CategoriesView {

    function showCategories($categories) {
        $count = count($categories);
        require 'templates/categoryList.phtml';
    }

    function showEditForm($category) {
        require 'templates/editCategory.phtml';
    }

    function showCategoryItems($category, $items) {
        require 'templates/categoryItems.phtml';
    }

    public function showError($message) {
        require 'templates/error.phtml';
        exit; // para que no siga ejecutándose el controller
    }
    
}

