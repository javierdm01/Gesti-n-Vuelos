<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/_servWeb/restfulVuelos/bd/BD.php';
class PasajeroModel
{

    private $table;
    private $conexion;
    private $bd;
    
    public function __construct()
    {
        $this->table = "pasajero";
        $this->bd = new BD();
    }

    // Recibe el array de los post
   
    public function obtenerPasajeros($id)
    {
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "select * from $this->table where pasajerocod= $id";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
     public function getPasajeros()
    {
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "select * from $this->table";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            // Retorna el array de registros
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    

   
}

