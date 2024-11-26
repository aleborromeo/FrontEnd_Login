<?php
    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaEliminarUsuario.php';

    function verificarAutenticacion()
    {
        if (!isset($_SESSION["txtusername"])) {
            header('Location: ' . get_urlBase('index.php'));
            exit();
        }
    }
    
    function validarId($id)
    {
        return filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    }

    function manejarEliminacionUsuario($id)
    {
        try {
            $modeloUsuario = new modeloUsuario();
            $resultado = $modeloUsuario->eliminarUsuario($id);
            return $resultado
                ? 'Usuario eliminado correctamente.'
                : 'No se encontró un usuario con el ID especificado.';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    verificarAutenticacion();

    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        $delete_id = validarId($_POST['delete_id']);
        $mensaje = $delete_id !== false
            ? manejarEliminacionUsuario($delete_id)
            : 'ID inválido.';
    }

    mostrarFormularioEliminar($mensaje);
?>
