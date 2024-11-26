<?php
    function mostrarFormularioEditar($user_data = null, $mensaje = '')
    {
        ?>
        <div class="contenedor">
            <?php if ($mensaje) : ?>
                <div class="mensaje-alerta mostrar">
                    <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <?php if ($user_data) : ?>
                <form action="" method="POST" autocomplete="off">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_data['id'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" 
                        value="<?php echo htmlspecialchars($user_data['username'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    <br>

                    <label for="password">Contraseña:</label>
                    <input type="text" id="password" name="password" 
                        value="<?php echo htmlspecialchars($user_data['password'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    <br>

                    <label for="perfil">Perfil:</label>
                    <input type="text" id="perfil" name="perfil" 
                        value="<?php echo htmlspecialchars($user_data['perfil'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    <br>

                    <button type="submit">Guardar Cambios</button>
                </form>
            <?php else : ?>
                <p>Selecciona un usuario para editar.</p>
            <?php endif; ?>
        </div>
        <?php
    }

    function mostrarListaUsuarios($usuarios)
    {
        ?>
        <h2>Lista de Usuarios</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($usuario['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($usuario['perfil'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><a href="?edit_id=<?php echo htmlspecialchars($usuario['id'], ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }

?>

<link rel="stylesheet" href="<?php echo htmlspecialchars(get_UrlBase('css/style-modificardatos.css'), ENT_QUOTES, 'UTF-8'); ?>">
