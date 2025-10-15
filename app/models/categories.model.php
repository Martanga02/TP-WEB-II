<?php

class TaskModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=peliculas_db;charset=utf8', 'root', '');
    }

    /*Devuelve la lista de todas las categorias.*/
    public function getAllCategories() {
        $query = $this->db->prepare("SELECT * FROM genero");
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $tasks;
    }

    /*Inserta las categorias */
    public function insertCategories($genre, $description) {
        $query = $this->db->prepare("INSERT INTO genero (nombre, descripcion) VALUES (?, ?)");
        $query->execute([$genre, $description]);

        return $this->db->lastInsertId();
    }


    /*Elimina las categorias */
    function deleteCategoriesById($id) {
        $query = $this->db->prepare('DELETE FROM genero WHERE id = ?');
        $query->execute([$id]);
    }

    /*Edita las categorias */

    public function updateCategory($id, $nombre, $descripcion) {
        $query = $this->db->prepare('UPDATE genero SET nombre = ?, descripcion = ? WHERE id = ?');
        $query->execute([$nombre, $descripcion, $id]);
    }

    public function getCategoryById($id) {
        $query = $this->db->prepare('SELECT * FROM genero WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    
}
