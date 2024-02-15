<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/PasajeView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/PasajeroView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/PasajeService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/PasajeroService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Pasaje.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Pasajero.php';

/**
 * Clase PasajePasajero
 */
class PasajePasajeroController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $pasajeroService;
    private $pasajeroView;
    private $pasajeView;
    private $pasajeService;

    /**
     * Constructor de la clase ProductoController
     */
    public function __construct() {
        $this->pasajeroService = new PasajeroService();
        $this->pasajeroView = new PasajeroView();
        $this->pasajeView = new PasajeView();
        $this->pasajeService = new PasajeService();
        include_once $_SERVER['DOCUMENT_ROOT'] . '/clienteRestfulVuelos/view/templates/headerStyle.php';
    }

    /**
     * MostrarVuelos()
     * Funcion en el controlador, que sirve para intermediar para
     * mostrar los productos
     */
    public function mostrarDatos() {
        
        $pasajeArr=$this->pasajeService->obtenerPasaje($_GET['id']);
        if($pasajeArr!='SIN DATOS'){
            $this->pasajeView->mostrarTabla();
            foreach ($pasajeArr as $obj) {
                $pasaje=estructurarObjeto($obj, 'Pasaje');
                $this->pasajeView->mostrarPasaje($pasaje);
                $objPas=$this->pasajeroService->obtenerPasajero($pasaje->getPasajerocod());
                $pasajero=estructurarObjeto($objPas[0], 'Pasajero');
                $this->pasajeroView->mostrarDatosPasajero($pasajero);
                $this->pasajeView->terminarPasaje($pasaje);
            }
            $this->pasajeView->terminarTabla();
        }else{
            $this->pasajeView->noPasaje();
        }
        $this->pasajeView->botonVolver();
        
    }
}
