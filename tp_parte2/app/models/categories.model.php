<?php
require_once './app/models/model.php';

class CategoriesModel extends Model {

    /* Devuelve la lista de todas las categorías */
    public function getAllCategories() {
        $query = $this->db->prepare("SELECT * FROM genero");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /* Obtiene los ítems (películas) de una categoría por su ID */
    public function getItemsByCategoryId($categoryId) {
        $query = $this->db->prepare('
        SELECT p.*, g.nombre AS genero_nombre 
        FROM pelicula p
        JOIN genero g ON p.id_genero = g.id
        WHERE p.id_genero = ?');
        $query->execute([$categoryId]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /* Inserta una categoría */
    public function insertCategories($genre, $description,$image) {
        $query = $this->db->prepare("INSERT INTO genero (nombre, descripcion,image) VALUES (?, ?, ?)");
        $query->execute([$genre, $description,$image]);
        return $this->db->lastInsertId();
    }
    
    /* Elimina una categoría por ID */
    public function deleteCategoriesById($id) {
        $query = $this->db->prepare('DELETE FROM genero WHERE id = ?');
        $query->execute([$id]);
    }

    /* Actualiza una categoría */
    public function updateCategory($id, $nombre, $descripcion,$image) {
        $query = $this->db->prepare('UPDATE genero SET nombre = ?, descripcion = ?, image = ? WHERE id = ?');
        $query->execute([$nombre, $descripcion, $id]);
    }

    /* Obtiene una categoría por ID */
    public function getCategoryById($id) {
        $query = $this->db->prepare('SELECT * FROM genero WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
