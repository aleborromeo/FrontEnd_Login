<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Las variables ya han sido almacenadas.";
?>

<br>
<a href="http://127.0.0.1/login_MC/vervariables.php">Ir a ver las variables</a>

</body>
</html>