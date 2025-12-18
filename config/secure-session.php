<?php

//require_once 'controllers/AuthController.php';

// Iniciar sesión
// los parametros comentados son propias
// de la fase de produccion
session_set_cookie_params([
    'lifetime' => 1200,                       // esto limita el tiempo de las cookies (opcional)
    'path' => '/',                            // indica desde que directorio está habilitada. Así, toda la web
    //'domain' => 'tu-dominio.com',           // indica desde que dominio se puede acceder a ella únicamente
    //'secure' => isset($_SERVER['HTTPS']),   //*** solo acceso vía https (para el despliegue, no en desarrollos)
    'httponly' => true,                       //*** para que no sea accesible desde JavaScript, solo desde PHP
    'samesite' => 'Strict',                   // evita ataques CSRF. Otros valores son Lax o none (ver más abajo)
]);

// 2. Define el intervalo en segundos (por ejemplo, 1200 segundos = 20 minutos)
$regenerate_interval = 1200;

// 3. Almacena el tiempo de la última regeneración si no existe
if (!isset($_SESSION['last_regeneration'])) {
    $_SESSION['last_regeneration'] = time();
}

// 4. Verifica y regenera si es necesario
if (time() - $_SESSION['last_regeneration'] >= $regenerate_interval) {
	// Regenera el ID de sesión y elimina los datos de la sesión antigua
	session_regenerate_id(true);
	// Actualiza el timestamp para el próximo intervalo
	$_SESSION['last_regeneration'] = time();
}

// tiempo máximo de vida de la sesión
$session_lifetime = 7200;  // 2 horas en segundos

if (isset($_SESSION['last_regeneration']) && (time() - $_SESSION['last_regeneration'] > $session_lifetime)) {
    // Comprueba que el tiempo transcurrido no supera el del tiempo de vida de la sesión
    // Si lo supera, desactiva la sesión
    session_unset();
    // Y la destruye
    session_destroy();
    header('Location: index.php?action=login');
    exit();
}


// generamos la primera vez un token que garantiza
// haber ingresado correctamente. impide la suplantacion
if (empty($_SESSION['csrf_token'])) {
	// Creación de un CSRF Token
    // genera un string aleatorio de 64 bytes y luego
    // se aplica un hashing
	$csrf_token = bin2hex(openssl_random_pseudo_bytes(64));

	// Resguardo del CSRF Token en una sesión
    // extremadamente dificil de suplantar o imitar
	$_SESSION['csrf_token'] = $csrf_token;

}