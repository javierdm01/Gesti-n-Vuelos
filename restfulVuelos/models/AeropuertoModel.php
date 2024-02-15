<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/_servWeb/restfulVuelos/bd/BD.php';
class AeropuertoModel
{

    private $table;
    private $conexion;
    private $bd;
    
    public function __construct()
    {
        $this->table = "aeropuerto";
        $this->bd = new BD();
    }



    // Devuelve un array departamento
    public function getUnVuelo($nudep)
    {   
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "SELECT * FROM $this->table WHERE codaeropuerto=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nudep);
            $sentencia->execute();
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            }
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    public function getAll()
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

