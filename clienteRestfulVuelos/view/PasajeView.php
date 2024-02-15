<?php

class PasajeView{
    /*
     * Funcion Para Mostrar el Numero de Pasajero
     * 
     * @param Number
     */
    function mostrarNPasajeros($datos){
        echo '<td >'.$datos.'</td></tr>';
                
    }
    /*
     * Funcion Para Mostrar Tabla y cabecera
     * 
     * 
     */
    function mostrarTabla(){
        echo ' <h2 class="mb-5">Pasajes</h2>
                <!-- Mostrar Pasajes -->
                <table class="table">
                <thead>
                    <tr class="table-dark">
                      <th scope="col">Id Pasaje</th>
                      <th scope="col">Cod Pasajero</th>
                      <th scope="col">Nombre Pasajero</th>
                      <th scope="col">Pais Pasajero</th>
                      <th scope="col">Asiento</th>
                      <th scope="col">Clase</th>
                      <th scope="col">PVP</th>
                    </tr>
                  </thead>
                  <tbody>';
                
    }
    /*
     * Funcion Para Mostrar el pasaje
     * 
     * @param object class
     */
    function mostrarPasaje($pasaje){
        echo '<tr>
                <td>'.$pasaje->getIdpasaje().'</td>'
            .   '<td >'.$pasaje->getPasajerocod().'</td>';
    }
    /*
     * Funcion Para terminar de mostrar el pasaje
     * 
     * @param object class
     */
    function terminarPasaje($pasaje){
        echo '<td>'.$pasaje->getNumasiento().'</td>'
            .   '<td >'.$pasaje->getClase().'</td>'
            .   '<td >'.$pasaje->getPVP().'</td></tr>';
    }
    /*
     * Funcion Para Mostrar la terminacion de la tabla
     * 
     */
    function terminarTabla(){
        echo '</tbody></table>';
    }
    /*
     * Funcion Para Mostrar que no hay pasajes
     * 
     * @param Number
     */
    function noPasaje(){
        echo '<h2 class="mt-5 text-center">NO HAY PASAJES PARA ESTE VUELO</h2>';
    }
    /*
     * Funcion Para Mostrar el boton para volver atras
     * 
     * 
     */
    function botonVolver(){
        echo '<a href="./index.php?controller=VueloAeropuertoPasaje&action=verBusquedadVuelo" class="btn btn-primary ms-4 mt-4">Volver</a>';
    }
    /*
     * Funcion Para Mostrar de pasajes
     * 
     * @param Number
     */
    function mostrarPasajes(){
       echo ' <h2 class="mb-5">Pasajes</h2>
                <!-- Mostrar Pasajes -->
                <table class="table">
                <thead>
                    <tr class="table-dark">
                      <th scope="col">Id Pasaje</th>
                      <th scope="col">Cod Pasajero</th>
                      <th scope="col">Identificador Vuelo</th>
                      <th scope="col">Asiento</th>
                      <th scope="col">Clase</th>
                      <th scope="col">PVP</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>';
                  
    }
    function getAtributos($pasaje){
        echo '<tr><td>'.$pasaje->getIdPasaje().'</td>
                        <td>'.$pasaje->getPasajerocod().'</td>
                        <td>'.$pasaje->getIdentificador().'</td>
                        <td>'.$pasaje->getNumasiento().'</td>
                        <td>'.$pasaje->getClase().'</td>
                        <td>'.$pasaje->getPvp().'</td>'
                .'<td><form action="./index.php?controller=Pasaje&action=modificarAtributos" method="POST">'
                . '<input type="hidden" name="id" value="'.$pasaje->getIdPasaje().'" ><input type="submit" value="Editar" class="btn btn-secondary" >'
                . '</form></td>'
                . '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$pasaje->getIdPasaje().'">
                    Eliminar
                  </button></td>'
                . '</tr>';
    }
    function terminarPasajes(){
        echo '     
                </tbody>
            </table>';
    }
    function mostrarModal($cod){
        echo '<div class="modal fade" id="'.$cod.'" tabindex="-1" aria-labelledby="'.$cod.'" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" >Eliminar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <p>¿Estas seguro que quieres eliminar este producto?</p>
                    </div>
                    <div class="modal-footer">
                  <form action="./index.php?controller=Pasaje&action=eliminarPasaje" method="POST">
                    <input type="hidden" name="id" value="'.$cod.'" >
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                </div>
                </div>
              </div>
          </div>
          </td>';
    }
    function getAtributosModificar($pasaje){
        echo '<tr>'
        . '<form method="POST" action="./index.php?controller=Pasaje&action=editarPasaje">'
            . '<input type="hidden" name="_method" value="PUT">'
            . '<td>'.$pasaje->getIdPasaje().'<input type="hidden" name="id_pasaje" value="'.$pasaje->getIdPasaje().'"></td>
            <td><input class="w-50" type="number" name="pasajero_cod" value="'.$pasaje->getPasajerocod().'"></td>
            <td><input class="w-75" type="text" name="identificador" value="'.$pasaje->getIdentificador().'"></td>
            <td><input class="w-50" type="number" name="num_asiento" value="'.$pasaje->getNumasiento().'"></td>
            <td><input class="w-75" type="text" name="clase" value="'.$pasaje->getClase().'"></td>
            <td><input class="w-50" type="number" name="pvp" value="'.$pasaje->getPvp().'"></td>'
                .'<td><input type="submit" class="btn btn-primary" value="Modificar Pasaje"> '
                . '</tr></form>';
    
    }
    function mostrarInsertarPasaje(){
        echo '<div class=" col-lg-6 mx-auto"><h2 class="text-center">Insertar Pasaje</h2>'
        .'<form method="POST" action="./index.php?controller=PasajePasajeroVuelo&action=comprobarInserccion"> <label for="pasajero">Selecciona Pasajero:  </label>';
        
    }
    function mostrarIdVuelo(){
        echo '<label for="vuelo">Selecciona Identificador de vuelo: </label>';
    }
    function terminarInsertarPasaje() {
        echo '<label for="asiento">Número de asiento: </label>'
        . '<input type="number" required name="asiento"><br>
            <label for="clase">Marca la clase: </label>

            <input type="radio" id="turista" name="clase" value="TURISTA">
            <label for="turista">Turista</label>

            <input type="radio" id="primera" name="clase" value="PRIMERA">
            <label for="primera">Primera</label>

            <input type="radio" id="business" name="clase" value="BUSINESS">
            <label for="business">Business</label><br>
            <label for="PVP">PVP </label>
            <input type="number" required id="pvp" name="pvp"><br>
            <input type="submit" class="btn btn-primary ms-5" value="Insertar Pasaje">
'
        . '</form></div>';
    }
    function inicioSelect($id) {
        echo '<select name="'.$id.'">';
    }
    function imprimirSelect($param) {
        echo '<option value="'.$param->getPasajerocod().'">'.$param->getPasajerocod().' '.$param->getNombre().'</option>';
    }
    function finSelect() {
        echo '</select><br>';
    }
}
