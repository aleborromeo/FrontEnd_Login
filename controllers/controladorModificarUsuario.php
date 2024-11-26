<?php
    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaModificarUsuario.php';

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

    function obtenerUsuario($modeloUsuario, $id)
    {
        try {
            return $modeloUsuario->obtenerUsuarioPorId($id);
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    function actualizarUsuario($modeloUsuario, $datosUsuario)
    {
        try {
            $resultado = $modeloUsuario->modificarUsuario(
                $datosUsuario['id'], 
                $datosUsuario['username'], 
                $datosUsuario['password'], 
                $datosUsuario['perfil']
            );
            return $resultado
                ? 'Usuario actualizado correctamente.'
                : 'No se realizaron cambios.';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function listarUsuarios($modeloUsuario)
    {
        try {
            return $modeloUsuario->listarUsuarios();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    verificarAutenticacion();

    $modeloUsuario = new modeloUsuario();
    $mensaje = '';
    $user_data = null;
    $usuarios = [];

    if (isset($_GET['edit_id'])) {
        $id_to_edit = validarId($_GET['edit_id']);
        if ($id_to_edit !== false) {
            $user_data = obtenerUsuario($modeloUsuario, $id_to_edit);
            if (isset($user_data['error'])) {
                $mensaje = $user_data['error'];
                $user_data = null;
            } elseif (!$user_data) {
                $mensaje = 'El usuario con ese ID no existe.';
            }
        } else {
            $mensaje = 'ID inválido.';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $mensaje = actualizarUsuario($modeloUsuario, [
            'id' => $_POST['id'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'perfil' => $_POST['perfil']
        ]);
        $user_data = obtenerUsuario($modeloUsuario, $_POST['id']);
    }

    $usuarios = listarUsuarios($modeloUsuario);
    if (isset($usuarios['error'])) {
        $mensaje = $usuarios['error'];
        $usuarios = [];
    }

    mostrarFormularioEditar($user_data, $mensaje);
    mostrarListaUsuarios($usuarios);
?>
