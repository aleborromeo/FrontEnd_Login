<?php  
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['txtusername'])) {
        echo json_encode(['success' => true, 'redirect' => get_controllers('controladorDashboard.php')]);
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $v_username = trim($_POST["txtusername"] ?? '');
        $v_password = trim($_POST["txtpassword"] ?? '');
        
        // Validación básica de entrada
        if (!$v_username || !$v_password) {
            echo json_encode(['success' => false, 'message' => 'Por favor, completa ambos campos.']);
            exit;
        }

        $modeloUsuario = new modeloUsuario();
        $user = $modeloUsuario->validarCredenciales($v_username);

        if ($user === false) {
            echo json_encode(['success' => false, 'redirect' => get_views('claveequivocada.php')]);
            exit;
        }

        if ($v_password === $user['password']) {
            $_SESSION["txtusername"] = $v_username;
            echo json_encode(['success' => true, 'redirect' => get_controllers('controladorDashboard.php')]);
        } else {
            echo json_encode(['success' => false, 'redirect' => get_views('claveequivocada.php')]);
        }
        exit;
    }

    include get_views_disk('vistaLogin.php');
?>
