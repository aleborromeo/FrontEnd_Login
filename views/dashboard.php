<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
    
    session_start();

    if (!isset($_SESSION["txtusername"])) {
        header('Location:  '.get_UrlBase('index.php'));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="icon" href="<?php echo get_UrlBase("pictures/store.svg")?>" type="image/svg+xml">
    <link rel="stylesheet" href="<?php echo get_UrlBase("css/style-dashboard.css")?>">
</head>
<body>
    <div class="loader-container" id="loader">
        <div class="loader"></div>
    </div>

    <div class="menu"> <img src="<?php echo get_UrlBase("pictures/store-2.svg")?>" alt="Store" class="menu-store" width="100px">
        <h3>MENU</h3>
        <ul>
            <li> <a href="?opcion=Inicio" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Inicio' ? 'active' : ''; ?>"> <img src="<?php echo get_UrlBase("pictures/home.svg")?>" alt="Inicio"width="50px">Inicio</a> </li>
            <li> <a href="?opcion=Ver" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Ver' ? 'active' : ''; ?>"> <img src="<?php echo get_UrlBase("pictures/search.svg")?>" alt="Ver" width="50px">Ver</a> </li>
            <li> <a href="?opcion=Ingresar" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Ingresar' ? 'active' : ''; ?>"> <img src="<?php echo get_UrlBase("pictures/add.svg")?>" alt="Ingresar" width="40px">Ingresar</a> </li>
            <li> <a href="?opcion=Modificar" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Modificar' ? 'active' : ''; ?>"> <img src="<?php echo get_UrlBase("pictures/edit.svg")?>" alt="Modificar" width="40px">Modificar</a> </li>
            <li> <a href="?opcion=Eliminar" class="<?php echo isset($_GET['opcion']) && $_GET['opcion'] == 'Eliminar' ? 'active' : ''; ?>"> <img src="<?php echo get_UrlBase("pictures/delete.svg")?>" alt="Eliminar" width="40px">Eliminar</a> </li>
            <li> <a href="<?php echo get_controllers('logout.php') ?>"> <img src="<?php echo get_UrlBase("pictures/logout.svg")?>" alt="Ver" width="40px">Salir</a> </li>
        </ul>
    </div>

    <div class="contenido"> 
        <div class="cuadro-titulo"></div>
        <?php
            if (isset($_GET["opcion"])) {
                $opcion = $_GET["opcion"];

                switch ($opcion) {
                    case 'Inicio':
                        echo "<h3>Bienvenido al Sistema</h3>";
                        break;
                    case 'Ver':
                        echo "<h3>Ver</h3>";
                        echo "<p> <iframe src='" .get_controllers("controladorUsuario.php") . "'> </iframe> </p>";
                        break;
                    case 'Ingresar':
                        echo "<h3>Ingresar</h3>";
                        echo "<p> <iframe src ='".get_controllers("controladorIngresarUsuario.php") ."'> </iframe> </p>";
                        break;
                    case 'Modificar':
                        echo "<h3>Modificar</h3>";
                        echo "<p> <iframe src ='".get_controllers("controladorModificarUsuario.php") ."'> </iframe> </p>";
                        break;
                    case 'Eliminar':
                        echo "<h3>Eliminar</h3>";
                        echo "<p> <iframe src ='".get_controllers("controladorEliminarUsuario.php") ."'> </iframe> </p>";
                        break;
                    }
            }
        ?>
    </div>  

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo get_UrlBase("js/loader.js")?>"></script>

</body>
</html>