<?php
    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

    if (!isset($_SESSION["txtusername"])) {
        header('Location: ' . get_urlBase('index.php'));
        exit();
    }

    $conexion = new conexion($host, $namedb, $userdb, $passworddb);
    $pdo = $conexion->obtenerconexion();

    if ($pdo) {
        $query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");

        if ($query) {
            echo "<h2>Usuarios Registrados en el Sistema</h2><br>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Perfil</th>
                    </tr>";

            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>" . htmlspecialchars($fila['id']) . "</td>
                        <td>" . htmlspecialchars($fila['username']) . "</td>
                        <td>" . htmlspecialchars($fila['password']) . "</td>
                        <td>" . htmlspecialchars($fila['perfil']) . "</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "Hubo un problema al ejecutar la consulta SQL.";
        }
    } else {
        echo "No se pudo establecer la conexión con la base de datos.";
    }
?>

<link rel="stylesheet" href="<?php echo get_UrlBase('css/style-verdatos.css')?>">
