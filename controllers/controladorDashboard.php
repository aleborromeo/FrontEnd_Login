<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}

$opcion = $_GET["opcion"] ?? 'Inicio';

function get_dashboard_content($opcion) {
    $contenedor = "";
    $titulo = "";
    switch ($opcion) {
        case 'Inicio':
            $titulo = "Bienvenido al Sistema";
            return "<h3>{$titulo}</h3>";
            break;

        case 'Ver':
            $titulo = "Ver";
            $contenedor = get_controllers("controladorUsuario.php");
            break;

        case 'Ingresar':
            $titulo = "Ingresar";
            $contenedor = get_controllers("controladorIngresarUsuario.php");
            break;

        case 'Modificar':
            $titulo = "Modificar";
            $contenedor = get_controllers("controladorModificarUsuario.php");
            break;

        case 'Eliminar':
            $titulo = "Eliminar";
            $contenedor = get_controllers("controladorEliminarUsuario.php");
            break;

        default:
            http_response_code(400);
            return "<h1>Error: Opción no válida</h1>";
    }

    ob_start();
    include get_controllers_disk(basename($contenedor)); 
    ob_get_clean();

    return "<h3>{$titulo}</h3><p><iframe src='{$contenedor}' width='100%' height='500px' frameborder='0'></iframe></p>";
}

$contenido = get_dashboard_content($opcion);
include get_views_disk("vistaDashboard.php");
?>
