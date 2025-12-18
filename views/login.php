<?php

include 'config/secure-session.php';

if (isset($_SESSION['usuario_logueado'])) {  // si el usuario estuviera ya logeado, lo derivamos al inicio interno
    header("Location: dashboard.php");    // nosotros haremos comprobación de token
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Form</title>
    <link rel="shortcut icon" href="public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="d-flex flex-column justify-content-center align-items-center">

    <!-- Fondo Animado -->
    <div class="background-animated"></div>

    
    <!-- Contenedor -->
    <div class="wrapper row w-50">

        <!-- Imagen Izq. Dragon -->
        <div class="left col-lg-6 col-md-12">
        </div>

        <form action="index.php?action=authenticate" class="log-in d-flex justify-content-center align-items-center col-lg-6 col-md-12"
            method="post" autocomplete="off" id="accessForm">

            <!-- CABECERA (logo, nombre organizacion) -->
            <img src="public/img/ccg_logo.png" alt="ccg_logo" width="80" style="margin: 0; padding: 0;" />
            <h4>We are <span>CCG</span></h4>
            <p>Welcome back, agent. Please, enter your credentials below:</p>


            <?php

            // se muestra el alert solo si la variable de sesion
            // ERROR esta establecida, es decir, inicializada
            if (isset($_SESSION['error'])) {

                echo '<div class="alert w-75"
                        style="background-color: rgba(211, 123, 164, 1);
                        border: solid 1px rgb(97, 16, 43);
                        color: rgb(97, 16, 43);"
                        role="alert">';
                echo $_SESSION['error'];
                echo '</div>';
                unset($_SESSION['error']);
                
            }

            ?>

            <!-- Campo de ID Agente -->
            <div class="floating-label mb-3">

                <input placeholder="Agent ID" type="text" name="agentId" id="agentId" autocomplete="off">
                <label for="agentId">Agent ID:</label>
                <div class="form-text text-danger" id="agentIdHelp"></div>

                <div class="icon">
                    <xml version="1.0" encoding="UTF-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-person"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        <rect class="st0" width="100" height="100" />
                    </svg>
                    
                </div>
            </div>

            <!-- Campo de Contraseña -->
            <div class="floating-label mb-5">

                <input placeholder="Password" type="password" name="passwd" id="passwd" autocomplete="off">
                <label for="passwd">Password:</label>
                <div class="form-text text-danger" id="passwdHelp"></div>

                <div class="icon">
                    <xml version="1.0" encoding="UTF-8">
                    <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg">
                        <style type="text/css">
                            .st0 {
                                fill: none;
                            }

                            .st1 {
                                stroke: #ffffff;
                            }
                        </style>
                        <rect class="st0" width="24" height="24" />
                        <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z" />
                        <path class="st1"
                            d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z" />
                        <path class="st1"
                            d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z" />
                    </svg>
                </div>

            </div>

            <div>
                <input type="hidden" name="csrf_token" id="csrf_token" value='<?php echo $_SESSION["csrf_token"] ?>' />
            </div>

            <div>
                <button type="submit" class="mb-2" name="login">Log in</button>
            </div>

        </form>
        
    </div>

    <script src="public/js/validation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

</body>

</html>