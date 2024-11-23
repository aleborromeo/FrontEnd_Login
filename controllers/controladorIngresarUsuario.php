<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaIngresarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_urlBase('index.php'));
    exit();
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmpdateuser = $_POST['dateusername'];
    $tmpdatepassword = $_POST['datepassword'];
    $tmpdateperfil = $_POST['dateperfil'];

    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->insertarUsuario($tmpdateuser, $tmpdatepassword, $tmpdateperfil);
        $mensaje = '<div class="mensaje-exito">Usuario registrado correctamente.</div>';
        echo "<script>
                setTimeout(function() {
                    window.location.href = '" . get_controllers('controladorUsuario.php') . "';
                }, 3000); 
              </script>";
    } catch (PDOException $e) {
        $mensaje = '<div class="mensaje-error">Error al registrar usuario: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    
}

mostrarFormularioIngreso($mensaje);
?>
