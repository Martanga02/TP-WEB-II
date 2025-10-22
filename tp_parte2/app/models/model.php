<?php
require_once './app/config/config.php';

class Model {
    protected $db;

    public function __construct() {
        try {
            // Conexión a la base de datos usando las constantes del config.php
            $this->db = new PDO(
                "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8",
                MYSQL_USER,
                MYSQL_PASS
            );

            // Configura PDO para mostrar errores (útil durante desarrollo)
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Ejecuta el auto-deploy (crea tablas si no existen)
            $this->deploy();

        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    /**
     * Crea las tablas automáticamente si la base de datos está vacía.
     * Este paso es opcional, pero útil para inicializar entornos nuevos.
     */
    private function deploy() {
        try {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();

            if (count($tables) == 0) {
                $sql = <<<END
                CREATE TABLE genero (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(100) NOT NULL
                );

                CREATE TABLE pelicula (
                    id_pelicula INT AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(100) NOT NULL,
                    estudio VARCHAR(100) NOT NULL,
                    id_genero INT NOT NULL,
                    FOREIGN KEY (id_genero) REFERENCES genero(id)
                );

                CREATE TABLE usuario (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL
                );

                INSERT INTO genero (nombre) VALUES 
                ('Acción'), 
                ('Drama'), 
                ('Comedia');
                END;

                $this->db->exec($sql);
            }
        } catch (PDOException $e) {
            // Si falla el deploy, solo se muestra en entorno local
            error_log("Error en deploy automático: " . $e->getMessage());
        }
    }
}
