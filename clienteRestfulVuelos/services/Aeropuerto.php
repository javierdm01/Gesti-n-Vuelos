<?php

    class Aeropuerto{
        
        private $codaeropuerto;
        private $nombre;
        private $ciudad;
        private $pais;
        private $tasa;
        
        
        public function __construct() {
        }

        public function getCodaeropuerto() {
            return $this->codaeropuerto;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getCiudad() {
            return $this->ciudad;
        }

        public function getPais() {
            return $this->pais;
        }

        public function getTasa() {
            return $this->tasa;
        }

        public function setCodaeropuerto($codaeropuerto): void {
            $this->codaeropuerto = $codaeropuerto;
        }

        public function setNombre($nombre): void {
            $this->nombre = $nombre;
        }

        public function setCiudad($ciudad): void {
            $this->ciudad = $ciudad;
        }

        public function setPais($pais): void {
            $this->pais = $pais;
        }

        public function setTasa($tasa): void {
            $this->tasa = $tasa;
        }




        
        
    }