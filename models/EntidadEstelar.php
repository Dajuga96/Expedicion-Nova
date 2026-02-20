<?php

abstract class EntidadEstelar {
    protected $id;
    protected $nombre;
    protected $planetaOrigen;
    protected $estabilidad;

    public function __construct($id, $nombre, $planetaOrigen, $estabilidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->planetaOrigen = $planetaOrigen;
        $this->estabilidad = $estabilidad;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPlanetaOrigen() {
        return $this->planetaOrigen;
    }

    public function getEstabilidad() {
        return $this->estabilidad;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPlanetaOrigen($planetaOrigen) {
        $this->planetaOrigen = $planetaOrigen;
    }

    public function setEstabilidad($estabilidad) {
        $this->estabilidad = $estabilidad;
    }

    abstract public function reaccionar();
}







?>