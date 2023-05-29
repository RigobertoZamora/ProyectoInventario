<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo administrador</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../JS/funciones.js"></script>
</head>

<body>
  <!--No entiendo porqué no adopta el estilo que debe de ser-->
  <div id="CreditsBtn">
    <ul>
      <li>
        <a href="#" onclick="window.history.back();"> <span></span> 🡨 Regresar</a>
      </li>
    </ul>
  </div>

  <!--Adaptar este formulario al estilo del principal-->
  <div id="formulario" class="login-box">
    <p id="CreditsText">Ingresa los datos del nuevo administrador</p>

    <form method="post" action="ingresaNA.php" name="formularioNA">
      <div class="user-box">
        <input type="text" id="ncompletona" name="ncompletona" class="input" placeholder="Ingresa el Nombre Completo" />
      </div>
      <br /><br />
      <div class="user-box">
        <input type="text" id="correona" name="correona" class="input" placeholder="Ingresa el Correo" />
      </div>
      <br /><br />
      <div class="user-box">
        <input type="password" id="passwordna" name="passwordna" class="input" placeholder="Ingresa la Contraseña" />
      </div>
      
      <a onclick="validarNA();">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Registrar Nuevo Administrador
      </a>
    </form>
  </div>
</body>

</html>