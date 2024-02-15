<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/VueloView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/PasajeroView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/PasajeView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/VueloService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/PasajeService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/PasajeroService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Pasajero.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/libraries/functions.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/templates/mensajeError.php';

/**
 * Clase VueloController
 */
class PasajePasajeroVueloController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $vueloView;
    private $pasajeroView;
    private $pasajeView;
    private $vueloService;
    private $pasajeroService;
    private $pasajeService;
    /**
     * Constructor de la clase ProductoController
     */
    public function __construct() {
        $this->vueloView = new VueloView();
        $this->vueloService = new VueloService();
        $this->pasajeroView = new PasajeroView();
        $this->pasajeroService = new PasajeroService();
        $this->pasajeView = new PasajeView();
        $this->pasajeService = new PasajeService();
        include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/templates/headerStyle.php';
    }
    
    /**
     * MostrarVuelos()
     * Funcion en el controlador, que sirve para intermediar para
     * mostrar los productos
     */
    
    public function mostrarInsertarPasaje(){
        $this->pasajeView->mostrarInsertarPasaje();
        $passObj=$this->pasajeroService->getPasajeros();
        //SELECT PASAJERO
        $this->pasajeView->inicioSelect('pasajero');
        foreach ($passObj as $pasj) {
            $pasajeros= estructurarObjeto($pasj, "Pasajero");
            $this->pasajeroView->imprimirSelectPasajeros($pasajeros);
        }
        $this->pasajeView->finSelect();
        //SELECT VUELO
        $this->pasajeView->mostrarIdVuelo();
        $vuelo=$this->vueloService->obtenerVuelos();
        $this->pasajeView->inicioSelect('vuelo');
        foreach ($vuelo as $vol) {
            $vuelos= estructurarObjeto($vol, "Vuelo");
            $this->vueloView->mostrarOption($vuelos);
        }
        $this->pasajeView->finSelect();
        
        $this->pasajeView->terminarInsertarPasaje();
    }
    public function comprobarInserccion(){
        $vueloPasajero=$this->pasajeService->comprobarVueloPasajero($_POST['pasajero'], $_POST['vuelo']);
        if($vueloPasajero== 'SIN DATOS'){
            $asiento=$this->pasajeService->comprobarAsiento($_POST['asiento'], $_POST['vuelo']);
            if($asiento== 'SIN DATOS'){
                $this->pasajeService->insertarPasaje();
            }else{
                mensajeError('El asiento para este vuelo está ocupado.');
            }
        }else{
            mensajeError('El pasajero ya tiene asignado este vuelo');
        }
        $this->mostrarInsertarPasaje();
    }
    


    
    
    
    
}