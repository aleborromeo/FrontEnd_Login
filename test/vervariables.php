<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
    if (isset($_SESSION["favcolor"])){
        echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
        echo "Favorite color is " . $_SESSION["favanimal"] . ".";
    } else {
        echo "No existen variables.";
        echo "<br>";
    }
?>

<br> 
Paginas de ver variables. 
<br>

<a href="http://127.0.0.1/login_MC/vervariables.php">Actualizar página</a>
<a href="http://127.0.0.1/login_MC/borrarvariables.php">Limpia las variables</a>

</body>
</html>