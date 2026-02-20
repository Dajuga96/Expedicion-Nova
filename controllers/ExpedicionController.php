<?php


class ExpedicionController {

    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }


    public function index() {

        $todos = $this->gestor->listarEntidades();

        $tipo = $_GET['tipo'] ?? '';

        if ($tipo != '') {
            $todos = array_filter($todos, function($entidad) use ($tipo) {
                return get_class($entidad) == $tipo;
            });
            $todos = array_values($todos);
        }

        $porPagina = 3;
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $inicio = ($pagina - 1) * $porPagina;

        $totalEntidades = count($todos);
        $totalPaginas = ceil($totalEntidades / $porPagina);

        $entidades = array_slice($todos, $inicio, $porPagina);

        require 'views/listar.php'; 
    }

    public function crear () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tipoEntidad = $_POST['tipoEntidad'];

            if ($tipoEntidad == 'CriaturaEstelar'){
                $nombre = $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad = $_POST['estabilidad'];
                if ($estabilidad < 1 || $estabilidad > 10) {
                    $_SESSION['error'] = "La estabilidad debe estar entre 1 y 10";
                    header('Location: index.php');
                    exit();
                }
                $especie = $_POST['especie'];
                $nivelAgresividad = $_POST['nivelAgresividad'];
                if ($nivelAgresividad < 1 || $nivelAgresividad > 10) {
                    $_SESSION['error'] = "El nivel de agresividad debe estar entre 1 y 10";
                    header('Location: index.php');
                    exit();
                }
                $entidad = new CriaturaEstelar($id, $nombre, $planetaOrigen, $estabilidad, $especie, $nivelAgresividad);
            } elseif ($tipoEntidad == 'MineralCuantico') {
                $nombre = $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad = $_POST['estabilidad'];
                if ($estabilidad < 1 || $estabilidad > 10) {
                    $_SESSION['error'] = "La estabilidad debe estar entre 1 y 10";
                    header('Location: index.php');
                    exit();
                }
                $dureza = $_POST['dureza'];
                if ($dureza < 1 || $dureza > 10) {
                    $_SESSION['error'] = "La dureza debe estar entre 1 y 10";
                    header('Location: index.php');
                    exit();
                }
                $scu = $_POST['scu'];
                $pureza = $_POST['pureza'];
                if ($pureza < 1 || $pureza > 10) {
                    $_SESSION['error'] = "La pureza debe estar entre 1 y 10";
                    header('Location: index.php');
                    exit();
                }
                $entidad = new MineralCuantico($id, $nombre, $planetaOrigen, $estabilidad, $dureza, $scu, $pureza);
            } elseif ($tipoEntidad == 'NaveEncontrada') {
                $nombre = $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad = $_POST['estabilidad'];
                if ($estabilidad < 1 || $estabilidad > 10) {
                    $_SESSION['error'] = "La estabilidad debe estar entre 1 y 10";
                    header('Location: index.php');
                    exit();
                }
                $tipoNave = $_POST['tipoNave'];
                $capacidadCarga = $_POST['capacidadCarga'];
                $saludCasco = $_POST['saludCasco'];
                if ($saludCasco < 0 || $saludCasco > 100) {
                    $_SESSION['error'] = "La salud del casco debe estar entre 0 y 100";
                    header('Location: index.php');
                    exit();
                }
                $estado = $_POST['estado'];
                $entidad = new NaveEncontrada($id, $nombre, $planetaOrigen, $estabilidad, $tipoNave, $capacidadCarga, $saludCasco, $estado);
            }
            $this->gestor->agregarEntidad($entidad);
            header('Location: index.php');
            exit();
        }
    }
    
    public function editar () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tipoEntidad = $_POST['tipoEntidad'];

            if ($tipoEntidad == 'CriaturaEstelar'){
                $nombre = $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad = $_POST['estabilidad'];
                $especie = $_POST['especie'];
                $nivelAgresividad = $_POST['nivelAgresividad'];
                $this->gestor->actualizarCriatura($id, $nombre, $planetaOrigen, $estabilidad, $especie, $nivelAgresividad);
            } elseif ($tipoEntidad == 'MineralCuantico') {
                $nombre = $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad = $_POST['estabilidad'];
                $dureza = $_POST['dureza'];
                $scu = $_POST['scu'];
                $pureza = $_POST['pureza'];
                $this->gestor->actualizarMineral($id, $nombre, $planetaOrigen, $estabilidad, $dureza, $scu, $pureza);
            } elseif ($tipoEntidad == 'NaveEncontrada') {
                $nombre = $_POST['nombre'];
                $planetaOrigen = $_POST['planetaOrigen'];
                $estabilidad = $_POST['estabilidad'];
                $tipoNave = $_POST['tipoNave'];
                $capacidadCarga = $_POST['capacidadCarga'];
                $saludCasco = $_POST['saludCasco'];
                $estado = $_POST['estado'];
                $this->gestor->actualizarNave($id, $nombre, $planetaOrigen, $estabilidad, $tipoNave, $capacidadCarga, $saludCasco, $estado);
            }
            header('Location: index.php');
            exit();
        }
    } 

     public function mostrarFormEditar() {
        $id = $_GET['id'];
        $entidad = $this->gestor->buscarEntidad($id);
        require 'views/formEditar.php';
    }


    public function eliminar () {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->gestor->eliminarEntidad($id);
        }
        header('Location: index.php');
        exit();
    }



}


?>