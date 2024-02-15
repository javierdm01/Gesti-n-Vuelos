<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/_servWeb/restfulVuelos/bd/BD.php';
class PasajeModel
{

    private $table;
    private $conexion;
    private $bd;
    
    public function __construct()
    {
        $this->table = "pasaje";
        $this->bd = new BD();
    }

    // Recibe el array de los post
    public function guardar($post)
    {
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "insert into $this->table values ( ?,?,?,?,?,?)";
            $sentencia = $this->conexion->prepare($sql);
            // extraemos los parámetros de la variable post
            // suponemos que se llaman igual
            $sentencia->bindParam(1, $post['idpasaje']);
            $sentencia->bindParam(2, $post['pasajerocod']);
            $sentencia->bindParam(3, $post['identificador']);
            $sentencia->bindParam(4, $post['numasiento']);
            $sentencia->bindParam(5, $post['clase']);
            $sentencia->bindParam(6, $post['pvp']);
            $num = $sentencia->execute();
            return "Registro insertado: " . $post['idpasaje']; 
        } catch (PDOException $e) {
            return "Error al grabar.<br>". $e->getMessage();
        }
    }

    public function actualiza($post)
    {
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "update $this->table set pasajerocod=?, identificador=?, numasiento=?, clase=?, pvp=? where idpasaje=?";
            $sentencia = $this->conexion->prepare($sql);
            // extraemos los parámetros de la variable $post
            // suponemos que se llaman igual
            $sentencia->bindParam(6, $post['idpasaje']);
            $sentencia->bindParam(1, $post['pasajerocod']);
            $sentencia->bindParam(2, $post['identificador']);
            $sentencia->bindParam(3, $post['numasiento']);
            $sentencia->bindParam(4, $post['clase']);
            $sentencia->bindParam(5, $post['pvp']);
            $num = $sentencia->execute();
            if ($sentencia->rowCount() == 0)
                return "Registro NO actualizado, o no existe o no hay cambios: " . $post['idpasaje'];
            else
                return "Registro actualizado: " . $post['idpasaje'];
        } catch (PDOException $e) {
            return "Error al actualizar.<br>". $e->getMessage();
        }
    }
    public function comprobarPasajeroVuelo($pasajero,$vuelo){
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "SELECT * FROM $this->table WHERE identificador=? AND pasajerocod= ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $vuelo);
            $sentencia->bindParam(2, $pasajero);
            $sentencia->execute();
            $row = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            }
            return "SIN DATOS";
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
     public function comprobarAsiento($asiento,$vuelo){
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "SELECT * FROM $this->table WHERE identificador=? AND numasiento= ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $vuelo);
            $sentencia->bindParam(2, $asiento);
            $sentencia->execute();
            $row = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            }
            return "SIN DATOS";
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }
    // Devuelve un array departamento
    public function getUnVuelo($nudep)
    {   
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "SELECT * FROM $this->table WHERE identificador=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nudep);
            $sentencia->execute();
            $row = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            }
            return "SIN DATOS";
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

    public function borrar($depno)
    {
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "delete from $this->table where idpasaje= ? ";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $depno);
            $num = $sentencia->execute();
            if ($sentencia->rowCount() == 0)
                return "Registro NO Borrado, no se localiza: " . $depno;
            else
                return "Registro Borrado: " . $depno;
           } catch (PDOException $e) {
            return "ERROR AL BORRAR.<br>" . $e->getMessage();
        }
    }
}

