<?php
function mostrarFormularioEditar($user_data = null, $mensaje = '') {
?>
    <div class="contenedor">
        <?php if ($mensaje) : ?>
            <div class="mensaje-alerta mostrar">
                <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <?php if ($user_data) : ?>
            <form action="" method="POST" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">

                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" value="<?php echo $user_data['username']; ?>" required>
                <br>

                <label for="password">Contraseña:</label>
                <input type="text" id="password" name="password" value="<?php echo $user_data['password']; ?>" required>
                <br>

                <label for="perfil">Perfil:</label>
                <input type="text" id="perfil" name="perfil" value="<?php echo $user_data['perfil']; ?>" required>
                <br>

                <button type="submit">Guardar Cambios</button>
            </form>
        <?php else : ?>
            <p>Selecciona un usuario para editar.</p>
        <?php endif; ?>
    </div>
<?php
}
?>

<?php 
function mostrarListaUsuarios($usuarios) {
?>
    <h2>Lista de Usuarios</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Perfil</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
                <td><a href="?edit_id=<?php echo $usuario['id']; ?>">Editar</a></td>
            </tr>
        <?php 
        }
        ?>
    </table>
    <?php
    }
    ?>


<link rel="stylesheet" href="<?php echo get_UrlBase('css/style-modificardatos.css'); ?>">