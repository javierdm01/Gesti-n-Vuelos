<?php
class VueloService {
    

    function obtenerVuelos() {
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Vuelo.php";
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido de la respuesta
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        $json_decode = json_decode($res);
        curl_close($conexion);
        return $json_decode;
    }
    function obtenerUnVuelo($id) {
        $urlmiservicio = "http://localhost/_servWeb/restfulVuelos/Vuelo.php/?id=".$id;
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido de la respuesta
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        $json_decode = json_decode($res);
        curl_close($conexion);
        return $json_decode;
    }
}
