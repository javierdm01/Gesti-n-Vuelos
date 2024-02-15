<?php
class PasajeroView{
    public function mostrarDatosPasajero($pasajero){
        echo '<td >'.$pasajero->getNombre().'</td><td >'.$pasajero->getPais().'</td>';
    }
    function imprimirSelectPasajeros($pasajero) {
        echo '<option value="'.$pasajero->getPasajerocod().'">'.$pasajero->getPasajerocod().' '.$pasajero->getNombre().'</option>';
    }
}