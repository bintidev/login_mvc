<?php

require_once 'config/secure-session.php';
require_once 'controllers/AuthController.php';  // el controlador de autentificación y
require_once 'models/Usuario.php';                 // el modelo de usuarios son cargados al empezar
													// ambos son declaraciones de clases -> orientación a objetos pura

$controller = new AuthController();  // se crea una instancia de controlador de usuario (que incluye conexión, tabla, y operatoria con usuarios)

											// Simple enrutamiento basado en la URL. Se concentra aquí todo el redireccionamiento
if (!isset($_REQUEST['action'])) {             // la primera vez, entramos para hacer login y no hay en la URL action definida
    $controller->login();
} else {
    switch ($_REQUEST['action']) {             // más adelante, podemos venir desde el interior con una action particular en la url
        case 'login':
            $controller->login();              // si la action fuera login
            break;
        case 'authenticate':
            $controller->authenticate();      // si hay que autenticar
            break;
        case 'dashboard':
            $controller->dashboard();         // si vamos a la página interna de inicio de la aplicación
            break;
        case 'logout':
            $controller->logout();            // si cerramos la sesión
            break;
        default:
            $controller->login();
            break;
    }
}

