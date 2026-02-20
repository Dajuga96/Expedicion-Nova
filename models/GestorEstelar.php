<?php


class GestorEstelar {

    public function __construct() {
        if (!isset($_SESSION['expedicionNova'])) {
         $_SESSION['expedicionNova'] = [];
        }
    }        

    public function agregarEntidad($entidad) {
        $_SESSION['expedicionNova'][] = $entidad;
    }

    public function listarEntidades() {
        return $_SESSION['expedicionNova'];
    }

    public function buscarEntidad($id) {
        foreach ($_SESSION['expedicionNova'] as $entidad) {
            if ($entidad->getId() ==$id) {
                return $entidad;
            }
        }
    }

    public function eliminarEntidad($id) {
        foreach ($_SESSION['expedicionNova'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                unset($_SESSION['expedicionNova'][$i]);
                $_SESSION['expedicionNova'] = array_values($_SESSION['expedicionNova']);
            }
        }
    }

    public function actualizarCriatura ($id, $nombre, $planetaOrigen, $estabilidad, $especie, $nivelAgresividad) {
        foreach ($_SESSION['expedicionNova'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                $_SESSION['expedicionNova'][$i]->setNombre ($nombre);
                $_SESSION['expedicionNova'][$i]->setPlanetaOrigen ($planetaOrigen);
                $_SESSION['expedicionNova'][$i]->setEstabilidad ($estabilidad);
                $_SESSION['expedicionNova'][$i]->setEspecie ($especie);
                $_SESSION['expedicionNova'][$i]->setNivelAgresividad ($nivelAgresividad);       
            }
        }
    }

    public function actualizarMineral ($id, $nombre, $planetaOrigen, $estabilidad, $dureza, $scu, $pureza) {
        foreach ($_SESSION['expedicionNova'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                $_SESSION['expedicionNova'][$i]->setNombre ($nombre);
                $_SESSION['expedicionNova'][$i]->setPlanetaOrigen ($planetaOrigen);
                $_SESSION['expedicionNova'][$i]->setEstabilidad ($estabilidad);
                $_SESSION['expedicionNova'][$i]->setDureza ($dureza);
                $_SESSION['expedicionNova'][$i]->setScu ($scu);
                $_SESSION['expedicionNova'][$i]->setPureza ($pureza);       
            }
        }
    }

    public function actualizarNave ($id, $nombre, $planetaOrigen, $estabilidad, $tipoNave, $capacidadCarga, $saludCasco, $estado) {
        foreach ($_SESSION['expedicionNova'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                $_SESSION['expedicionNova'][$i]->setNombre ($nombre);
                $_SESSION['expedicionNova'][$i]->setPlanetaOrigen ($planetaOrigen);
                $_SESSION['expedicionNova'][$i]->setEstabilidad ($estabilidad);
                $_SESSION['expedicionNova'][$i]->setTipoNave ($tipoNave);
                $_SESSION['expedicionNova'][$i]->setCapacidadCarga ($capacidadCarga);
                $_SESSION['expedicionNova'][$i]->setSaludCasco ($saludCasco);
                $_SESSION['expedicionNova'][$i]->setEstado ($estado);       
            }
        }
    }
}
?>