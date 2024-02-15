<?php
class BD {
    private $pdo;
    public function __construct() {
        include $_SERVER['DOCUMENT_ROOT']. '/_servWeb/restfulVuelos/config/config.php';
        try {
            // Crea una instancia de PDO para conectarse a la base de datos
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            throw new Exception('Error en la conexión a la base de datos');
        }
    }
    public function getPDO() {
        return $this->pdo;
    }

# Desconectar la base de datos

    public function closeConexion() {
        $this->conexion = null;
    }

# Devolver mensaje de error, por si hay error.

    public function getMensajeError() {
        return $this->mensajeerror;
    }
    

}
