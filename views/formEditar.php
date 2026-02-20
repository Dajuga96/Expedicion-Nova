<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Entidad - Expedición Nova</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>  

    <h1 class="titulo-estelar">Editar Entidad</h1>

    <?php $tipo = get_class($entidad); ?>

    <form method="POST" action="/Expedicion Nova/index.php?accion=editar" class="form-inline">
        
        <input type="hidden" name="id" value="<?= $entidad->getId() ?>">
        <input type="hidden" name="tipoEntidad" value="<?= $tipo ?>">
        <input type="text" name="nombre" value="<?= $entidad->getNombre() ?>">
        <input type="text" name="planetaOrigen" value="<?= $entidad->getPlanetaOrigen() ?>">
        <input type="number" name="estabilidad" min="1" max="10" value="<?= $entidad->getEstabilidad() ?>">



        <?php if ($tipo == 'CriaturaEstelar'): ?>
            <select name="especie">
                <option value="humano" <?= $entidad->getEspecie() == 'humano' ? 'selected' : '' ?>>Humano</option>
                <option value="vanduul" <?= $entidad->getEspecie() == 'vanduul' ? 'selected' : '' ?>>Vanduul</option>
                <option value="tevarin" <?= $entidad->getEspecie() == 'tevarin' ? 'selected' : '' ?>>Tevarin</option>
                <option value="banu" <?= $entidad->getEspecie() == 'banu' ? 'selected' : '' ?>>Banu</option>
            </select>
            <input type="number" name="nivelAgresividad" min="1" max="10" value="<?= $entidad->getNivelAgresividad() ?>">    
        <?php elseif ($tipo == 'MineralCuantico'): ?>
            <input type="number" name="dureza" min="1" max="10" value="<?= $entidad->getDureza() ?>">
            <input type="number" name="scu" value="<?= $entidad->getScu() ?>">
            <input type="number" name="pureza" min="1" max="10" value="<?= $entidad->getPureza() ?>">
        <?php elseif ($tipo == 'NaveEncontrada'): ?>
            <select name="tipoNave">
                <option value="Carguero" <?= $entidad->getTipoNave() == 'Carguero' ? 'selected' : '' ?>>Carguero</option>
                <option value="Explorador" <?= $entidad->getTipoNave() == 'Explorador' ? 'selected' : '' ?>>Explorador</option>
                <option value="Caza" <?= $entidad->getTipoNave() == 'Caza' ? 'selected' : '' ?>>Caza</option>
            </select>
            <input type="number" name="capacidadCarga" value="<?= $entidad->getCapacidadCarga() ?>">
            <input type="number" name="saludCasco" min="0" max="100" value="<?= $entidad->getSaludCasco() ?>">
            <select name="estado">
                <option value="Operativa" <?= $entidad->getEstado() == 'Operativa' ? 'selected' : '' ?>>Operativa</option>
                <option value="Dañada" <?= $entidad->getEstado() == 'Dañada' ? 'selected' : '' ?>>Dañada</option>
                <option value="Destruida" <?= $entidad->getEstado() == 'Destruida' ? 'selected' : '' ?>>Destruida</option>
            </select>
        <?php endif; ?>

        <button type="submit">Guardar cambios</button>
    </form>

</body>
</html>