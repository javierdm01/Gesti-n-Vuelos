<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/VueloView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/AeropuertoView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/PasajeView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/VueloService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/PasajeService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/AeropuertoService.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Vuelo.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/services/Aeropuerto.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/libraries/functions.php';

/**
 * Clase VueloController
 */
class VueloAeropuertoPasajeController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $vueloView;
    private $aeropuertoView;
    private $pasajeView;
    private $vueloService;
    private $aeropuertoService;
    private $pasajeService;
    /**
     * Constructor de la clase ProductoController
     */
    public function __construct() {
        $this->vueloView = new VueloView();
        $this->vueloService = new VueloService();
        $this->aeropuertoView = new AeropuertoView();
        $this->aeropuertoService = new AeropuertoService();
        $this->pasajeView = new PasajeView();
        $this->pasajeService = new PasajeService();
        include_once $_SERVER['DOCUMENT_ROOT'].'/clienteRestfulVuelos/view/templates/headerStyle.php';
    }
    
    /**
     * MostrarVuelos()
     * Funcion en el controlador, que sirve para intermediar para
     * mostrar los productos
     */
    public function mostrarVuelos(){
        $vuelos=$this->vueloService->obtenerVuelos();
       
        $this->vueloView->mostrarTabla();
        if($vuelos!=''){
            foreach ($vuelos as $obj) {
                $vuelo=estructurarObjeto($obj, 'Vuelo');
                $this->vueloView->mostrarVuelos($vuelo);
                $arrOrigen=$this->aeropuertoService->obtenerAeropuerto($vuelo->getAeropuertoOrigen());
                $aeropuertoOrigen=estructurarObjeto($arrOrigen, 'Aeropuerto');
                $this->aeropuertoView->mostrarAeropuerto($aeropuertoOrigen);
                $this->vueloView->mostrarDestino($vuelo);
                $arrDestino=$this->aeropuertoService->obtenerAeropuerto($vuelo->getAeropuertoDestino());
                $aeropuertoDestino=estructurarObjeto($arrDestino, 'Aeropuerto');
                $this->aeropuertoView->mostrarAeropuerto($aeropuertoDestino);
                $pasaje=$this->pasajeService->obtenerPasaje($vuelo->getIdentificador());
                if($pasaje!='SIN DATOS'){
                    $nPasajes=count($pasaje);
                }else{
                    $nPasajes='0';
                }


                $this->vueloView->mostrarDatoVuelos($vuelo);
                $this->pasajeView->mostrarNPasajeros($nPasajes);
            
            }
        }
        $this->vueloView->mostrarFinVuelos();
    }
    public function verBusquedadVuelo(){
        $vuelos=$this->vueloService->obtenerVuelos();
        
        $this->vueloView->mostrarFomularioBusquedad();
        foreach ($vuelos as $obj) {
            $vuelo=estructurarObjeto($obj, 'Vuelo');
            $this->vueloView->mostrarOption($vuelo);
        }
        $this->vueloView->finFormularioBusquedad();
    }
    public function mostrarDatos(){
        $this->verBusquedadVuelo();
        
        $obj=$this->vueloService->obtenerUnVuelo($_GET['id']);
        $vuelos=estructurarObjeto($obj, 'Vuelo');
        $this->vueloView->mostrarTabla();
        $this->vueloView->mostrarVuelos($vuelos);
        $arrOrigen=$this->aeropuertoService->obtenerAeropuerto($vuelos->getAeropuertoOrigen());
        $aeropuertoOrigen=estructurarObjeto($arrOrigen, 'Aeropuerto');
        $this->aeropuertoView->mostrarAeropuerto($aeropuertoOrigen);
        $this->vueloView->mostrarDestino($vuelos);
        $arrDestino=$this->aeropuertoService->obtenerAeropuerto($vuelos->getAeropuertoDestino());
        $aeropuertoDestino=estructurarObjeto($arrDestino, 'Aeropuerto');
        $this->aeropuertoView->mostrarAeropuerto($aeropuertoDestino);
        $pasaje=$this->pasajeService->obtenerPasaje($vuelos->getIdentificador());
        if($pasaje!='SIN DATOS'){
            $nPasajes=count($pasaje);
        }else{
            $nPasajes='0';
        }


        $this->vueloView->mostrarDatoVuelos($vuelos);
        $this->pasajeView->mostrarNPasajeros($nPasajes);
            
        $this->vueloView->mostrarFinVuelos();
    }
    


    
    
    
    
}