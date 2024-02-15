<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Aeropuerto.php';
class AeropuertoView{
    
    function mostrarAeropuerto($aeropuerto){
        
        echo '<td >'.$aeropuerto->getNombre().'</td>'
            . '<td>'.$aeropuerto->getPais().'</td>';
    }
    
}