<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="icon" href="<?php echo get_UrlBase("pictures/store.svg") ?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo get_UrlBase("css/style-dashboard.css") ?>">
</head>
<body>
    <div class="loader-container" id="loader">
        <div class="loader"></div>
    </div>

    <div class="menu">
        <img src="<?php echo get_UrlBase("pictures/store-2.svg") ?>" alt="Store" class="menu-store" width="100px">
        <h3>MENU</h3>
        <ul>
            <li>
                <a href="?opcion=Inicio" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Inicio' ? 'active' : ''; ?>">
                    <img src="<?php echo get_UrlBase("pictures/home.svg") ?>" alt="Inicio" width="50px">Inicio
                </a>
            </li>
            <li>
                <a href="?opcion=Ver" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Ver' ? 'active' : ''; ?>">
                    <img src="<?php echo get_UrlBase("pictures/search.svg") ?>" alt="Ver" width="50px">Ver
                </a>
            </li>
            <li>
                <a href="?opcion=Ingresar" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Ingresar' ? 'active' : ''; ?>">
                    <img src="<?php echo get_UrlBase("pictures/add.svg") ?>" alt="Ingresar" width="40px">Ingresar
                </a>
            </li>
            <li>
                <a href="?opcion=Modificar" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Modificar' ? 'active' : ''; ?>">
                    <img src="<?php echo get_UrlBase("pictures/edit.svg") ?>" alt="Modificar" width="40px">Modificar
                </a>
            </li>
            <li>
                <a href="?opcion=Eliminar" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Eliminar' ? 'active' : ''; ?>">
                    <img src="<?php echo get_UrlBase("pictures/delete.svg") ?>" alt="Eliminar" width="40px">Eliminar
                </a>
            </li>
            <li>
                <a href="<?php echo get_controllers('logout.php') ?>">
                    <img src="<?php echo get_UrlBase("pictures/logout.svg") ?>" alt="Salir" width="40px">Salir
                </a>
            </li>
        </ul>
    </div>

    <div class="contenido">
        <div class="cuadro-titulo"></div>
        <?php
        $opcion = $_GET["opcion"] ?? 'Inicio';
        echo get_dashboard_content($opcion);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo get_UrlBase("js/loader.js") ?>"></script>
</body>
</html>

