<?php

    class Vuelo{
        
    private $identificador;
    private $aeropuertoorigen;
    private $aeropuertodestino;
    private $tipovuelo;
    private $fechavuelo;
    private $descuento;

    public function __construct() {

    }
    
    
    
    public function getIdentificador() {
        return $this->identificador;
    }

    public function getAeropuertoorigen() {
        return $this->aeropuertoorigen;
    }

    public function getAeropuertodestino() {
        return $this->aeropuertodestino;
    }

    public function getTipovuelo() {
        return $this->tipovuelo;
    }

    public function getFechavuelo() {
        return $this->fechavuelo;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    public function setAeropuertoorigen($aeropuertoorigen): void {
        $this->aeropuertoorigen = $aeropuertoorigen;
    }

    public function setAeropuertodestino($aeropuertodestino): void {
        $this->aeropuertodestino = $aeropuertodestino;
    }

    public function setTipovuelo($tipovuelo): void {
        $this->tipovuelo = $tipovuelo;
    }

    public function setFechavuelo($fechavuelo): void {
        $this->fechavuelo = $fechavuelo;
    }

    public function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }



        


        
        
}
