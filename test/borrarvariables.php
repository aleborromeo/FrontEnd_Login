<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

Se borraron todas las variables

<a href="http://127.0.0.1/login_MC/vervariables.php">Ver variables</a>
<a href="http://127.0.0.1/login_MC/test.php">Volver a grabar las variabless</a>

</body>
</html>