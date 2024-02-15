<?php

class PasajeService {

    function obtenerPasaje($id) {
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php/?id=" . $id;
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        $json_decode = json_decode($res);
        curl_close($conexion);
        return $json_decode;
    }
    function comprobarAsiento($asiento,$vuelo) {
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php/?asiento=" . $asiento."&vuelo=".$vuelo;
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        $json_decode = json_decode($res);
        curl_close($conexion);
        return $json_decode;
    }
    function comprobarVueloPasajero($pasajero,$vuelo){
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php/?pasajero=" . $pasajero."&vuelo=".$vuelo;
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        $json_decode = json_decode($res);
        curl_close($conexion);
        return $json_decode;
    }
    
    function getPasajes() {
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php";
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        $json_decode = json_decode($res);
        curl_close($conexion);
        return $json_decode;
    }

    function modificarPasajes() {
        $envio = json_encode(array("idpasaje" => $_POST['id_pasaje'], "pasajerocod" => $_POST['pasajero_cod'], "identificador" => $_POST['identificador'], "numasiento" => $_POST['num_asiento']
            , "clase" => $_POST['clase'], "pvp" => $_POST['pvp']));
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            mensajeCheck('Registro actualizado correctamente');
        } else {
            mensajeError('Error al insertar el registro');
        }
        curl_close($conexion);
    }

    function eliminarPasaje($id) {
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php/?id=" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //Campos que van en el envío
        //curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            mensajeCheck('Registro eliminado correctamente');
        } else {
            mensajeError('Error al eliminar el registro');
        }
        curl_close($conexion);
    }
    function insertarPasaje() {
    $envio = json_encode(array( "pasajerocod" => $_POST['pasajero'], "identificador" => $_POST['vuelo'], "numasiento" => $_POST['asiento']
            , "clase" => $_POST['clase'], "pvp" => $_POST['pvp']));
    $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Pasaje.php/";
    $conexion = curl_init();
    curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
    //Cabecera, tipo de datos y longitud de envío
    curl_setopt($conexion, CURLOPT_HTTPHEADER, 
          array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
    //Tipo de petición
    curl_setopt($conexion, CURLOPT_POST, TRUE);
    //Campos que van en el envío
    curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
    //para recibir una respuesta
    curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($conexion);
    if ($res) {
            mensajeCheck('Registro insertado correctamente');
        } else {
            mensajeError('Error al insertar el registro');
        }
    curl_close($conexion);
}
    
}
