<?php
require_once './app/models/model.php';

class ItemsModel extends Model {

    public function getAllItems() {
        $query = $this->db->prepare("
            SELECT pelicula.*, genero.nombre AS genero_nombre
            FROM pelicula
            JOIN genero ON pelicula.id_genero = genero.id
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getItemById($id) {
        $query = $this->db->prepare("
            SELECT pelicula.*, genero.nombre AS genero_nombre
            FROM pelicula
            JOIN genero ON pelicula.id_genero = genero.id
            WHERE pelicula.id_pelicula = ?
        ");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertItem($nombre, $estudio, $id_genero) {
        $query = $this->db->prepare("
            INSERT INTO pelicula (nombre, estudio, id_genero)
            VALUES (?, ?, ?)
        ");
        $query->execute([$nombre, $estudio, $id_genero]);
        return $this->db->lastInsertId();
    }

    public function deleteItemById($id) {
        $query = $this->db->prepare('DELETE FROM pelicula WHERE id_pelicula = ?');
        $query->execute([$id]);
    }

    public function updateItem($id, $nombre, $estudio, $id_genero) {
        $query = $this->db->prepare("
            UPDATE pelicula
            SET nombre = ?, estudio = ?, id_genero = ?
            WHERE id_pelicula = ?
        ");
        $query->execute([$nombre, $estudio, $id_genero, $id]);
    }
}
