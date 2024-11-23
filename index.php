<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
  session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_UrlBase("css/style-index.css") ?>">
  <link rel="icon" href="<?php echo get_UrlBase("pictures/user.svg") ?>" type="image/svg+xml">
</head>

<body>

  <div class="loader-container" id="loader">
    <div class="loader"></div>
  </div>

  <?php

    function get_connection() {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "dbsistema";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn -> connect_error);
      }

      return $conn;
    }

    function get_user_credentials($username) {
      require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
      $conn = get_connection();
      $stmt = $conn->prepare("SELECT username, password FROM usuarios WHERE BINARY username = ? LIMIT 1");
      $stmt -> bind_param("s", $username);
      $stmt -> execute();
      $result = $stmt -> get_result();
      $user = $result -> fetch_assoc();
      $stmt -> close();
      $conn -> close();
      return $user;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $v_username = $_POST["txtusername"] ?? '';
      $v_password = $_POST["txtpassword"] ?? '';

      $user = get_user_credentials($v_username);

      if ($user && $v_password === $user['password']) {
          $_SESSION["txtusername"] = $v_username;
          header('Location: '.get_views('dashboard.php?opcion=Inicio'));
          exit;
      } else {
          header('Location: '.get_views('claveequivocada.php'));
          exit;
      }
    }
  ?>


   
  <div class="pictures">
    <div class="picture-flower-2">
      <img src="pictures/flower-2.svg" alt="Flower 2" height="70" width="70">
    </div>
    <div class="picture-circle-3">
      <img src="pictures/circulo-3.svg" alt="Circulo 3" height="50" width="50">
    </div>
    <div class="picture-radar">
      <img src="pictures/radar.svg" alt="Radar" height="70" width="70">
    </div>
    <div class="picture-circle-2">
      <img src="pictures/circulo-2.svg" alt="Circulo 2" height="70" width="70">
    </div>
    <div class="picture-cloud">
      <img src="pictures/cloud.svg" alt="Cloud" height="110" width="110">
    </div>
    <div class="picture-flower-1">
      <img src="pictures/flower-1.svg" alt="Flower 1" height="190" width="190">
    </div>
    <div class="picture-line-up">
      <img src="pictures/lines.svg" alt="Line" height="40" width="900">
    </div>
    <div class="picture-line-down">
      <img src="pictures/lines.svg" alt="Line" height="40" width="900">
    </div>
    <div class="picture-circle-4">
      <img src="pictures/circulo-4.svg" alt="Circle 4" height="70" width="70">
    </div>
    <div class="picture-radar-1">
      <img src="pictures/radar-1.svg" alt="Radar 1" height="80" width="80">
    </div>
    <div class="picture-rectangule">
      <img src="pictures/mini-rectangules.svg" alt="Rectangule" height="400" width="400">
    </div>
    <div class="picture-rectangule-1">
      <img src="pictures/rectangulo.svg" alt="Rectangule 1" height="60" width="60">
  </div>
    <div class="circles-lines">
        <img src="pictures/circle-lines.svg" alt="Circle Lines" height="300" width="300">
    </div>
    <div class="picture-rectangule-2">
      <img src="pictures/mini-rectangules.svg" alt="Mini Rectangule" height="200" width="290">
    </div>
    <div class="picture-circule-1">
      <img src="pictures/circulo-1.svg" alt="Circule" height="60" width="60">
    </div>
  </div>

  <div class="login-container">
    <div class="icon-user">
      <img src="pictures/user.svg" alt="User Icon" height="190" width="190">
    </div>s

    <div class="numbers">
      <div class="number-1">1</div>
      <div class="number-2">2</div>
      <div class="number-3">3</div>
      <div class="number-4">4</div>
      <div class="number-5">4</div>
      <div class="number-6">4</div>
      <div class="number-7">4</div>
      <div class="number-8">4</div>
      <div class="number-9">5</div>
      <div class="number-10">6</div>
      <div class="number-11">6</div>
      <div class="number-12">8</div>
    </div>

    <form action = "" method = "POST" class="login-form" autocomplete="off">
      <h1 class="form-title">Ingreso de<br>Usuarios</h1>

      <div class="form-group form-username">
        <label for="txtusername">Username</label>
        <input type="text" name="txtusername" id="txtusername" placeholder="Ingresa tu usuario" required>
      </div>
  
      <div class="form-group form-password">
        <label for="txtpassword">Password</label>
        <input type="password" name="txtpassword" id="txtpassword" placeholder="Ingresa tu contraseña" required>
      </div>
    
      <div class="button-login">
        <input type="submit" value="Ingresar">
      </div>
    </form>

    <div class="graphic">
      <img src="pictures/grafico-de-linea-1.svg" alt="Graphic 1" height="100" width="100">
    </div>
    <div class="global">
      <img src="pictures/global.svg" alt="Global" height="100" width="100">
    </div>
    <div class="graphic-2">
      <img src="pictures/grafico-de-linea-2.svg" alt="Graphic" height="100" width="100">
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo get_UrlBase("js/loader.js")?>"></script>

</body>
</html>