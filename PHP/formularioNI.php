<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo inventario</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../JS/funciones.js"></script>
</head>

<body>
  <!--Mismo problema que con formularioNA.php-->
  <div id="CreditsBtn">
    <ul>
      <li>
        <a href="inventario.php"> <span></span> 🡨 Regresar</a>
      </li>
    </ul>
  </div>

  <!--Adaptar este formulario al estilo del principal-->
  <div id="formulario" class="login-box">
    <p id="CreditsText">Ingresa los datos del nuevo inventario</p>

    <form method="post" action="ingresaNI.php" name="formularioNI">
      <div class="user-box">
        <input type="text" id="ninventario" name="ninventario" class="input"
          placeholder="Ingresa el numero de inventario" />
      </div>

      <select id="equipo" class="input" name="equipo">
        <option value="Selecciona equipo">Selecciona equipo</option>
        <option value="LAPTOP">Laptop</option>
        <option value="CABLE VGA">Cable VGA</option>
        <option value="BOCINAS">Bocinas</option>
        <option value="ADAPTADOR">Adaptador</option>
        <option value="EXTENSION">Extension</option>
      </select>

      <div class="user-box">
        <input type="text" id="descripcion" name="descripcion" placeholder="Ingresa descripcion" />
      </div>

      <div class="user-box">
        <input type="text" id="nfolio" name="nfolio" placeholder="Ingresa el numero de folio" />
      </div>

      <div class="user-box">
        <input type="text" id="importe" name="importe" placeholder="Ingresa el importe" />
      </div>

      <div class="user-box">
        <input type="text" id="marca" name="marca" placeholder="Ingresa la marca" />
      </div>

      <div class="user-box">
        <input type="text" id="modelo" name="modelo" placeholder="Ingresa el modelo" />
      </div>

      <div class="user-box">
        <input type="text" id="serie" name="serie" placeholder="Ingresa la serie" />
      </div>

      <div class="user-box">
        <input type="text" id="ubicacion" name="ubicacion" placeholder="Ingresa la ubicacion" />
      </div>

      <div class="user-box">
        <input type="date" id="fechar" name="fechar" placeholder="Inicia por año completo, mes y día" />
      </div>
      <div class="user-box">
        <input type="text" id="bnl" name="bnl" placeholder="¿Venia en el envio?" />
      </div>
      <a onclick="NoFuncionaPQ();">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Registrar Nuevo Inventario
      </a>
    </form>
  </div>

</body>

</html>