<?php

class TaskView {

    function showCategories($categories) {
        $count = count($categories);
        require 'templates/taskList.phtml';
    }

    function showEditForm($category) {
        require 'templates/editCategory.phtml';
    }
}
