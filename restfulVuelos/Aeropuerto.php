<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/_servWeb/restfulVuelos/bd/BD.php');
require_once ('./models/AeropuertoModel.php');
$dep = new AeropuertoModel();

@header("Content-type: application/json");

// Consultar GET
// devuelve o 1 o todos, dependiendo si recibe o no parámetro
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $res = $dep->getUnVuelo($_GET['id']);
        echo json_encode($res);
        exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");


