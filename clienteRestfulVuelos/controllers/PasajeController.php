<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/PasajeView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/PasajeService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Pasaje.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/templates/mensajeCheck.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/templates/mensajeError.php';

/**
 * Clase PasajePasajero
 */
class PasajeController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $view;
    private $service;

    /**
     * Constructor de la clase ProductoController
     */
    public function __construct() {
        $this->service = new PasajeService();
        $this->view = new PasajeView();
        include_once $_SERVER['DOCUMENT_ROOT'] . '/clienteRestfulVuelos/view/templates/headerStyle.php';
    }

    /**
     * MostrarVuelos()
     * Funcion en el controlador, que sirve para intermediar para
     * mostrar los productos
     */
    public function mostrarPasajes($id=null) {
        
        $pasajeArr=$this->service->getPasajes();
        $this->view->mostrarPasajes();
        foreach ($pasajeArr as $obj) {
            $pasaje=estructurarObjeto($obj, 'Pasaje');
            if($id== $pasaje->getIdPasaje()){
                $this->view->getAtributosModificar($pasaje);
            }else{
                $this->view->getAtributos($pasaje);
            }
            $this->view->mostrarModal($pasaje->getIdPasaje());
        }
        $this->view->terminarPasajes();
    }
    public function modificarAtributos(){
        $this->mostrarPasajes($_POST['id']);
    }
    public function editarPasaje(){
        $this->service->modificarPasajes();
        $this->mostrarPasajes();
    }
    public function eliminarPasaje(){
        $this->service->eliminarPasaje($_POST['id']);
        $this->mostrarPasajes();
    }
}
