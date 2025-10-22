<?php

class itemView {

    function showItems($items, $categories) {
        require 'templates/itemList.phtml';
    }

    function showItemDetail($item) {
        require 'templates/itemDetail.phtml';
    }

    function showAdminPanel($items, $categories) {
        require 'templates/itemAdmin.phtml';
    }

    function showEditForm($item, $categories) {
        require 'templates/editItem.phtml';
    }

    function redirect($url) {
        header("Location: " . BASE_URL . $url);
        die();
    }
}