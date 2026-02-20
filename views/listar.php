<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor Estelar MVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">

</head>
<body>

    <h1 class="titulo-estelar">Expedición Nova</h1>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error"><?= $_SESSION['error'] ?></div>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <nav class="nav-filtros">
        <a href="index.php?accion=index">Todos los registros</a>
        <a href="index.php?accion=index&tipo=CriaturaEstelar">Criaturas Estelares</a>
        <a href="index.php?accion=index&tipo=MineralCuantico">Minerales Cuánticos</a>
        <a href="index.php?accion=index&tipo=NaveEncontrada">Naves Encontradas</a>
    </nav>


    <form method="POST" action="../AP67/index.php?accion=crear">
         <input type="text" name="id" placeholder="ID">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="planetaOrigen" placeholder="Planeta Origen">
        <input type="number" name="estabilidad" min="1" max="10" placeholder="Estabilidad (1-10)">

    <select name="tipoEntidad" onchange="mostrarFormulario(this.value)" class="selector-tipo">
        <option value="">Selecciona el tipo de entidad</option>
        <option value="CriaturaEstelar">Criatura Estelar</option>
        <option value="MineralCuantico">Mineral Cuántico</option>
        <option value="NaveEncontrada">Nave Encontrada</option>
    </select>

    <div id="CriaturaEstelar" style="display:none">
        <select name="especie">
            <option value="">Selecciona la especie</option>
            <option value="humano">Humano</option>
            <option value="vanduul">Vanduul</option>
            <option value="tevarin">Tevarin</option>
            <option value="banu">Banu</option>
        </select>
        <input type="number" name="nivelAgresividad" min="1" max="10" placeholder="Nivel de Agresividad">
    </div>

    <div id="MineralCuantico" style="display:none">
        <input type="number" name="dureza" min="1" max="10" placeholder="Dureza (1-10)">
        <input type="number" name="scu" placeholder="SCU">
        <input type="number" name="pureza" min="1" max="10" placeholder="Pureza (1-10)">
    </div>

    <div id="NaveEncontrada" style="display:none">
        <select name="tipoNave">
            <option value="">Selecciona el tipo de nave</option>
            <option value="Carguero">Carguero</option>
            <option value="Explorador">Explorador</option>
            <option value="Caza">Caza</option>
        </select>
        <input type="number" name="capacidadCarga" placeholder="Capacidad de Carga">
        <input type="number" name="saludCasco" min="0" max="100" placeholder="Salud del Casco (0-100)">
        <select name="estado">
            <option value="">Selecciona el estado de la nave</option>
            <option value="Operativa">Operativa</option>
            <option value="Dañada">Dañada</option>
            <option value="Destruida">Destruida</option>
        </select>
    </div>
    
        <button type="submit" class="boton-crear">Registrar Entidad</button>
    </form>

    <h2>Entidades</h2>

    
    <?php if ($tipo == '' || $tipo == 'CriaturaEstelar'): ?>
    <h3>Criaturas Estelares</h3>

    <table border="1" class="tabla-criaturas">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Planeta Origen</th>
            <th>Estabilidad</th>
            <th>Especie</th>
            <th>Nivel de Agresividad</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($entidades as $entidad): ?>
        <?php if (get_class($entidad) == 'CriaturaEstelar'): ?>
        <tr>
            <td><?= $entidad->getId() ?></td>
            <td><?= $entidad->getNombre() ?></td>
            <td><?= $entidad->getPlanetaOrigen() ?></td>
            <td><?= $entidad->getEstabilidad() ?></td>
            <td><?= $entidad->getEspecie() ?></td>
            <td><?= $entidad->getNivelAgresividad() ?></td>
            <td>
                <a href="/AP67/index.php?accion=mostrarFormEditar&id=<?= $entidad->getId() ?>">Editar</a>
                <a href="/AP67/index.php?accion=eliminar&id=<?= $entidad->getId() ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>

    </table>
    <?php endif; ?>


    <?php if ($tipo == '' || $tipo == 'MineralCuantico'): ?>
    <h3>Minerales Cuánticos</h3>

    <table border="1" class="tabla-minerales">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Planeta Origen</th>
            <th>Estabilidad</th>
            <th>Dureza</th>
            <th>SCU</th>
            <th>Pureza</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($entidades as $entidad): ?>
        <?php if (get_class($entidad) == 'MineralCuantico'): ?>
        <tr>
            <td><?= $entidad->getId() ?></td>
            <td><?= $entidad->getNombre() ?></td>
            <td><?= $entidad->getPlanetaOrigen() ?></td>
            <td><?= $entidad->getEstabilidad() ?></td>
            <td><?= $entidad->getDureza() ?></td>
            <td><?= $entidad->getScu() ?></td>
            <td><?= $entidad->getPureza() ?></td>
            <td>
                <a href="/AP67/index.php?accion=mostrarFormEditar&id=<?= $entidad->getId() ?>">Editar</a>
                <a href="/AP67/index.php?accion=eliminar&id=<?= $entidad->getId() ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>

    </table>    
    <?php endif; ?>

    <?php if ($tipo == '' || $tipo == 'NaveEncontrada'): ?>
    <h3>Naves Encontradas</h3>

    <table border="1" class="tabla-naves">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Planeta Origen</th>
            <th>Estabilidad</th>
            <th>Tipo de Nave</th>
            <th>Capacidad de Carga</th>
            <th>Salud del Casco</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($entidades as $entidad): ?>
        <?php if (get_class($entidad) == 'NaveEncontrada'): ?>
        <tr>
            <td><?= $entidad->getId() ?></td>
            <td><?= $entidad->getNombre() ?></td>
            <td><?= $entidad->getPlanetaOrigen() ?></td>
            <td><?= $entidad->getEstabilidad() ?></td>
            <td><?= $entidad->getTipoNave() ?></td>
            <td><?= $entidad->getCapacidadCarga() ?></td>
            <td><?= $entidad->getSaludCasco() ?></td>
            <td><?= $entidad->getEstado() ?></td>
            <td>
                <a href="/AP67/index.php?accion=mostrarFormEditar&id=<?= $entidad->getId() ?>" class="btn-editar">Editar</a>
                <a href="/AP67/index.php?accion=eliminar&id=<?= $entidad->getId() ?>" onclick="return confirm('¿Seguro?')" class="btn-eliminar">Eliminar</a>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <?php if ($totalPaginas > 1): ?>
        <div class="paginacion">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($i == $pagina): ?>
                        <span class="activo"><?= $i ?></span>
                    <?php else: ?>
                        <a href="index.php?accion=index&pagina=<?= $i ?>&tipo=<?= $tipo ?>"><?= $i ?></a>
               <?php endif; ?>
            <?php endfor; ?>
       </div>
    <?php endif; ?>



    <script>

        function mostrarFormulario(tipo) {

            document.getElementById('CriaturaEstelar').style.display = 'none';
            document.getElementById('MineralCuantico').style.display = 'none';
            document.getElementById('NaveEncontrada').style.display = 'none';
            
            if (tipo) document.getElementById(tipo).style.display = 'block';
        }

    </script>

</body>    
</html>