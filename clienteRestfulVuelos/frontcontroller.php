<?php
include_once $_SERVER['DOCUMENT_ROOT'].'\clienteRestfulVuelos\controllers\VueloAeropuertoPasajeController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'\clienteRestfulVuelos\controllers\PasajePasajeroController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'\clienteRestfulVuelos\controllers\PasajeController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'\clienteRestfulVuelos\controllers\PasajePasajeroVueloController.php';

define('ACCION_DEFECTO', 'mostrarVuelos');
define('CONTROLADOR_DEFECTO', 'VueloAeropuertoPasaje');



function lanzarAccion($controllerObj){
    
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    } 
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
        
    }
}

function cargarAccion($controllerObj, $action){
    $accion=$action;
    $controllerObj->$accion();
}

function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        die ("controlador no válido");
    }
}

if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
