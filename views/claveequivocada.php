<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clave Equivocada</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase("css/style-claveequivocada.css") ?>">
    <link rel="icon" href="<?php echo get_UrlBase("pictures/warning.svg") ?>" type="image/svg+xml">
</head>
<body>
  <div class="loader-container" id="loader">
      <div class="loader"></div>
    </div>


  <div class="pictures">
      <div class="picture-flower-2">
        <img src="<?php echo get_UrlBase("pictures/flower-2.svg")?>" alt="Flower 2" height="70" width="70">
      </div>
      <div class="picture-circle-3">
        <img src="<?php echo get_UrlBase("pictures/circulo-3.svg")?>" alt="Circulo 3" height="50" width="50">
      </div>
      <div class="picture-radar">
        <img src="<?php echo get_UrlBase("pictures/radar.svg")?>" alt="Radar" height="70" width="70">
      </div>
      <div class="picture-circle-2">
        <img src="<?php echo get_UrlBase("pictures/circulo-2.svg")?>" alt="Circulo 2" height="70" width="70">
      </div>
      <div class="picture-cloud">
        <img src="<?php echo get_UrlBase("pictures/cloud.svg")?>" alt="Cloud" height="110" width="110">
      </div>
      <div class="picture-flower-1">
        <img src="<?php echo get_UrlBase("pictures/flower-1.svg")?>" alt="Flower 1" height="190" width="190">
      </div>
      <div class="picture-line-up">
        <img src="<?php echo get_UrlBase("pictures/lines.svg")?>" alt="Line" height="40" width="900">
      </div>
      <div class="picture-line-down">
        <img src="<?php echo get_UrlBase("pictures/lines.svg")?>" alt="Line" height="40" width="900">
      </div>
      <div class="picture-circle-4">
        <img src="<?php echo get_UrlBase("pictures/circulo-4.svg")?>" alt="Circle 4" height="70" width="70">
      </div>
      <div class="picture-radar-1">
        <img src="<?php echo get_UrlBase("pictures/radar-1.svg")?>" alt="Radar 1" height="80" width="80">
      </div>
      <div class="picture-rectangule">
        <img src="<?php echo get_UrlBase("pictures/mini-rectangules.svg")?>" alt="Rectangule" height="400" width="400">
      </div>
      <div class="picture-rectangule-1">
        <img src="<?php echo get_UrlBase("pictures/rectangulo.svg")?>" alt="Rectangule 1" height="60" width="60">
      </div>
        <div class="circles-lines">
          <img src="<?php echo get_UrlBase("pictures/circle-lines.svg")?>" alt="Circle Lines" height="300" width="300">
        </div>
        <div class="picture-rectangule-2">
          <img src="<?php echo get_UrlBase("pictures/mini-rectangules.svg")?>" alt="Mini Rectangule" height="200" width="290">
        </div>
        <div class="picture-circule-1">
          <img src="<?php echo get_UrlBase("pictures/circulo-1.svg")?>" alt="Circule" height="60" width="60">
        </div>
      </div>

    <div class="container"> 
        <h1 class="wrong-key"> Clave equivocada, vuelva a ingresar </h1>
        <button class="logout" onclick="window.location.href='<?php echo get_UrlBase('index.php') ?>'"> Volver al login </button>

        <div class="picture-warning">
        <img src="<?php echo get_UrlBase("pictures/warning.svg")?>" alt="Warning" height="220" width="220">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo get_UrlBase("js/loader.js")?>"></script>
    
</body>
</html>