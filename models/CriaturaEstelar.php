<?php


    class CriaturaEstelar extends EntidadEstelar {

        private $especie;
        private $nivelAgresividad;

        public function __construct($id, $nombre, $planetaOrigen, $estabilidad, $especie, $nivelAgresividad) {
            parent::__construct($id, $nombre, $planetaOrigen, $estabilidad);
            $this->especie = $especie;
            $this->nivelAgresividad = $nivelAgresividad;
        }

        public function getEspecie() {
            return $this->especie;
        }

        public function getNivelAgresividad() {
            return $this->nivelAgresividad;
        }

        public function setEspecie($especie) {
            $this->especie = $especie;
        }

        public function setNivelAgresividad($nivelAgresividad) {
            $this->nivelAgresividad = $nivelAgresividad;
        }

        public function reaccionar () {
            return "Emite señales de comunicación de la especie " . $this->getEspecie() . " no identificadas";
        }
    }

?>