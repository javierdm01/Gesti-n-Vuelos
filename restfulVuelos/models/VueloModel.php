<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/_servWeb/restfulVuelos/bd/BD.php';
class VueloModel
{   
    private $table;
    private $conexion;
    private $bd;
    
    public function __construct()
    {
        $this->table = "vuelo";
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
            $sentencia->bindParam(1, $post['identificador']);
            $sentencia->bindParam(2, $post['aeropuertoorigen']);
            $sentencia->bindParam(3, $post['aeropuertodestino']);
            $sentencia->bindParam(4, $post['tipovuelo']);
            $sentencia->bindParam(5, $post['fechavuelo']);
            $sentencia->bindParam(6, $post['descuento']);
            $num = $sentencia->execute();
            return "Registro insertado: " . $post['identificador']; 
        } catch (PDOException $e) {
            return "Error al grabar.<br>". $e->getMessage();
        }
    }

    public function actualiza($post)
    {
        $this->conexion= $this->bd->getPDO();
        try {
            $sql = "update $this->table set aeropuertoorigen=?, aeropuertodestino=?, tipovuelo=?, fechavuelo=?, descuento=? where identificador=?";
            $sentencia = $this->conexion->prepare($sql);
            // extraemos los parámetros de la variable $post
            // suponemos que se llaman igual
            $sentencia->bindParam(6, $post['identificador']);
            $sentencia->bindParam(1, $post['aeropuertoorigen']);
            $sentencia->bindParam(2, $post['aeropuertodestino']);
            $sentencia->bindParam(3, $post['tipovuelo']);
            $sentencia->bindParam(4, $post['fechavuelo']);
            $sentencia->bindParam(5, $post['descuento']);
            $num = $sentencia->execute();
            if ($sentencia->rowCount() == 0)
                return "Registro NO actualizado, o no existe o no hay cambios: " . $post['identificador'];
            else
                return "Registro actualizado: " . $post['identificador'];
        } catch (PDOException $e) {
            return "Error al actualizar.<br>". $e->getMessage();
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
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
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
            $sql = "SELECT identificador, aeropuertoorigen, aeropuertodestino, tipovuelo, fechavuelo, descuento FROM $this->table";
            $statement = $this->conexion->query($sql);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $registros = $statement->fetchAll();
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
            $sql = "delete from $this->table where identificador= ? ";
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

