<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaEliminarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_urlBase('index.php'));
    exit();
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = filter_var($_POST['delete_id'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    
    if ($delete_id !== false) {
        try {
            $modeloUsuario = new modeloUsuario();
            $resultado = $modeloUsuario->eliminarUsuario($delete_id);
            
            if ($resultado) {
                $mensaje = 'Usuario eliminado correctamente.';
            } else {
                $mensaje = 'No se encontró un usuario con el ID especificado.';
            }
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
    } else {
        $mensaje = 'ID inválido.';
    }
}

mostrarFormularioEliminar($mensaje);

?>
