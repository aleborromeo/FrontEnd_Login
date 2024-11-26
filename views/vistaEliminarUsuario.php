<?php

    function mostrarFormularioEliminar($mensaje = '')
    {
        ?>
        <section class="contenedor">
            <?php if (!empty($mensaje)) : ?>
                <!-- Mensaje de alerta -->
                <div class="alerta mostrar">
                    <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de eliminación -->
            <form action="" method="POST" autocomplete="off">
                <label for="delete_id">ID del usuario a eliminar:</label>
                <input type="number" id="delete_id" name="delete_id" min="1" required>
                <br>
                <button type="submit">Eliminar</button>
            </form>
        </section>
<?php
    }
?>

<link rel="stylesheet" href="<?php echo htmlspecialchars(get_UrlBase('css/style-eliminardatos.css'), ENT_QUOTES, 'UTF-8'); ?>">
<script src="<?php echo htmlspecialchars(get_js('tiempoMensaje.js'), ENT_QUOTES, 'UTF-8'); ?>"></script>
