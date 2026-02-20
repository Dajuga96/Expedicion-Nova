<?php

class MineralCuantico extends EntidadEstelar {

    private $dureza;
    private $scu;
    private $pureza;

    public function __construct($id, $nombre, $planetaOrigen, $estabilidad, $dureza, $scu, $pureza) {
        parent::__construct($id, $nombre, $planetaOrigen, $estabilidad);
        $this->dureza = $dureza;
        $this->scu = $scu;
        $this->pureza = $pureza;
    }

    public function getDureza() {
        return $this->dureza;
    }

    public function getScu() {
        return $this->scu;
    }

    public function getPureza() {
        return $this->pureza;
    }

    public function setDureza($dureza) {
        $this->dureza = $dureza;
    }

    public function setScu($scu) {
        $this->scu = $scu;
    }

    public function setPureza($pureza) {
        $this->pureza = $pureza;
    }

    public function reaccionar() {
        return "El Quantainium irradia energía cuántica inestable";
    }
}

?>