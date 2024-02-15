<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Vuelo.php';
class VueloView{
    function mostrarTabla(){
        echo ' <h2 class="mb-5">Todos los vuelos</h2>
                <!-- Mostrar Vuelos -->
                <table class="table">
                <thead>
                    <tr class="table-dark">
                      <th scope="col">Identificador</th>
                      <th scope="col">Aeropuerto Origen</th>
                      <th scope="col">Nombre Aeropuerto Origen($)</th>
                      <th scope="col">Pais Origen</th>
                      <th scope="col">Aeropuerto Destino</th>
                      <th scope="col">Nombre Aeropuerto Destino</th>
                      <th scope="col">Pais Destino</th>
                      <th scope="col">Tipo Vuelo</th>
                      <th scope="col">Nº Pasajeros</th>
                    </tr>
                  </thead>
                  <tbody>';
                
    }
    function mostrarVuelos($vuelos){
        echo '<tr>
                <td>'.$vuelos->getIdentificador().'</td>'
            . '<td >'.$vuelos->getAeropuertoOrigen().'</td>';
    }
    
    function mostrarDestino($vuelos){
        echo '<td>'.$vuelos->getAeropuertoDestino().'</td>';
    }
    function mostrarDatoVuelos($vuelos){
        echo '<td>'.$vuelos->getTipoVuelo().'</td>';
    }
    function mostrarFinVuelos(){
        echo '</tbody></table>';
    }
    function mostrarFomularioBusquedad(){
        echo '<form class="text-center" method="GET"><select name="id">';
    }
    function mostrarOption($vuelo){
        echo '<option value="'.$vuelo->getIdentificador().'">'.$vuelo->getIdentificador().' - '.$vuelo->getAeropuertoorigen().' - '.$vuelo->getAeropuertodestino().'</option>';
    }
    function finFormularioBusquedad(){
        echo '</select>'
        . '<input type="hidden" name="action" value="mostrarDatos">'  
        . '<button type="submit" name="controller" value="VueloAeropuertoPasaje">Ver Vuelo</button>'
        . '<button type="submit" name="controller" value="PasajePasajero">Ver Pasaje</button>';
    }
    
}
