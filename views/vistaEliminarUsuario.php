<?php
function mostrarFormularioEliminar($mensaje = '') {
?>
    <div class="contenedor">
        <!-- Mostrar mensaje si existe -->
        <?php if (!empty($mensaje)) : ?>
            <div class="alerta mostrar">
                <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="" method="POST" autocomplete="off">
            <label for="delete_id">ID del usuario a eliminar:</label>
            <input type="number" id="delete_id" name="delete_id" min="1" required>
            <br>
            <button type="submit">Eliminar</button>
        </form>
    </div>
<?php
}
?>

<link rel="stylesheet" href="<?php echo get_UrlBase('css/style-eliminardatos.css'); ?>">
<script src="<?php echo get_js('tiempoMensaje.js'); ?>"></script>
