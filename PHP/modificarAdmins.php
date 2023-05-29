<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificando un Administrador</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../JS/funciones.js"></script>
</head>

<body>
  <?php
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
    $comando = "SELECT * FROM admins WHERE nombre='".$_GET['nombre']."'";
    $resultado = mysqli_query($conexion, $comando);
    $validacion = mysqli_fetch_array($resultado);
  ?>
  <div id="CreditsBtn">
      <ul>
        <li>
          <?php
          echo '
          <a href="administradores.php?nombre='.$validacion['nombre'].'"> <span></span> 🡨 Regresar</a>
          ';
          ?>
        </li>
      </ul>
    </div>
  <!------------------------------------------------------------->
  <br><h1>
    <center>Modificación de Administrador</center>
  </h1>
  <?php
  //Paso 1:  creo la conexion
  $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
  //Paso 2: Creo la consulta 
  $querySelect = "SELECT * FROM admins WHERE id=" . $_GET['id'];
  //Paso  3: Ejecuta la consulta
  $resultado = mysqli_query($conexion, $querySelect);
  //Paso 4: Extraigo los datos de la consulta
  $admin = mysqli_fetch_array($resultado);
  ?>
  <div id="formulario" class="login-box">
    <p id="CreditsText">Modifica los datos del Administrador</p>
    <form method="post" action="modificarAdmins2.php" name="formulario">
      <div class="user-box">
        <input class="input" type="hidden" id="id" name="id" value="<?php echo $admin['id']; ?>">
      </div>
      <div class="user-box">
        <input type="text" id="nombre" name="nombre" value="<?php echo $admin['nombre']; ?>" class="input"
          placeholder="Ingresa Tu Nuevo Nombre" />
        <label>Nombre: </label>
      </div>
      <br><br>
      <div class="user-box">
        <input type="text" id="correo" name="correo" value="<?php echo $admin['correo']; ?>" class="input"
          placeholder="Ingresa tu Nuevo Correo Electronico" />
        <label>Correo:</label>
      </div>
      <br /><br />
      <div class="user-box">
        <input type="text" id="contra" name="contra" value="<?php echo $admin['password']; ?>" class="input"
          placeholder="Ingresa tu Nueva Contraseña" />
        <label>Contrase&ntildea:</label>
      </div>
      <br /><br />

      <a onclick="modificarAdmin();">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Modificar Datos
      </a>
    </form>
  </div>
  <p class="derecha grande identar"><b><i>Umizumi inc.</i></b></p>
</body>

</html>