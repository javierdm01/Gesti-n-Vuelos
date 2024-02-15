<?php

class AeropuertoService{
    function obtenerAeropuerto($id) {
    $idMod= str_replace(' ', '%20', $id);
    $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Aeropuerto.php/?id=".$idMod;
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
}