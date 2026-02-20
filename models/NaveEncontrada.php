<?php 

    class NaveEncontrada extends EntidadEstelar {
        private $tipoNave;
        private $capacidadCarga;
        private $saludCasco;
        private $estado;

        public function __construct($id, $nombre, $planetaOrigen, $estabilidad, $tipoNave, $capacidadCarga, $saludCasco, $estado) {
            parent::__construct($id, $nombre, $planetaOrigen, $estabilidad);
            $this->tipoNave = $tipoNave;
            $this->capacidadCarga = $capacidadCarga;
            $this->saludCasco = $saludCasco;
            $this->estado = $estado;
        }

        public function getTipoNave() {
            return $this->tipoNave;
        }

        public function getCapacidadCarga() {
            return $this->capacidadCarga;
        }

        public function getSaludCasco() {
            return $this->saludCasco;
        }

        public function setTipoNave($tipoNave) {
            $this->tipoNave = $tipoNave;
        }

        public function setCapacidadCarga($capacidadCarga) {
            $this->capacidadCarga = $capacidadCarga;
        }

        public function setSaludCasco($saludCasco) {
            $this->saludCasco = $saludCasco;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function reaccionar () {
            return "La nave " . $this->getNombre() . " está en estado " . $this->getEstado();
        }
     }

?>