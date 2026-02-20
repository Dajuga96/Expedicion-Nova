<?php
    spl_autoload_register(function($clase) {
        $rutas = [
            'models/' . $clase . '.php',
            'controllers/' . $clase . '.php',
        ];

        foreach ($rutas as $ruta) {
            if (file_exists($ruta)) {
                require_once $ruta;
            }
        }
});