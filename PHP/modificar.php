<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificando registro...</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../JS/funciones.js"></script>
</head>

<body>
  <?php
  $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
  $comando = "SELECT * FROM admins WHERE nombre='" . $_GET['nombre'] . "'";
  $resultado = mysqli_query($conexion, $comando);
  $validacion = mysqli_fetch_array($resultado);
  ?>
  <!--------------------------Lista---------------------------->
  <div id="CreditsBtn">
    <ul>
      <li>
        <?php
        echo '
          <a href="mostrar_datos1.php?nombre=' . $validacion['nombre'] . '"> <span></span> 🡨 Regresar</a>
          ';
        ?>
      </li>
    </ul>
  </div>
  <!------------------------------------------------------------->
  <!-- <br><p id="CreditsText">Administrador: <?php echo $validacion['nombre'] ?></p> -->
  <?php
  //Paso 1:  creo la conexion
  $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
  //Paso 2: Creo la consulta 
  $querySelect = "SELECT * FROM registros WHERE id=" . $_GET['id'];
  //Paso  3: Ejecuta la consulta
  $resultado = mysqli_query($conexion, $querySelect);
  //Paso 4: Extraigo los datos de la consulta
  $inventario = mysqli_fetch_array($resultado);
  ?>
  <div id="formulario" class="login-box">
    <p id="CreditsText">Modifica los datos del préstamo</p>
    <form method="post" action="modificar2.php" name="formulario">
      <div class="user-box">
        <input type="hidden" id="id" name="id" value="<?php echo $inventario['id']; ?>" class="input"
          placeholder="Ingresa el numero de cuenta" />
      </div>
      <div class="user-box">
        <input type="text" id="ncuenta" name="ncuenta" value="<?php echo $inventario['No_cuenta']; ?>" class="input"
          placeholder="Ingresa el numero de cuenta" />
      </div>
      <br /><br />
      <div class="user-box">
        <input type="text" id="ncompleto" name="ncompleto" value="<?php echo $inventario['Nombre']; ?>" class="input"
          placeholder="Ingresa el nombre completo" />
      </div>
      <br /><br />
      <div class="user-box">
        <input type="text" id="grapo" name="grapo" value="<?php echo $inventario['grapo']; ?>" class="input"
          placeholder="Ingresa el grado y grupo" />
      </div>
      <br /><br />
      <?php
      date_default_timezone_set('America/Chihuahua');
      $fecha = date("Y-m-d");
      $hora = date("H:i:s");
      ?>
      <div class="user-box">
        <input type="text" id="fecha" name="fecha" class="input" value="<?php echo $fecha; ?>" readonly />
      </div>
      <br /><br />
      <div class="user-box">
        <input type="text" id="hora" name="hora" class="input" value="<?php echo $hora; ?>" readonly />
      </div>
      <br />
      <!--<select id="equipo" class="input" name="equipo">
          <option selected disabled>Selecciona equipo</option>
          <option value="laptop">Laptop</option>
          <option value="cable vga">Cable VGA</option>
          <option value="bocinas">Bocinas</option>
          <option value="adaptador">Adaptador</option>
          <option value="etension">Extension</option>
        </select>
         -->
      <?php
      if ($inventario['laptop'] != 0) {
        $disable = $inventario['laptop'];
      } else {
        $disable = "Seleccione el N° de Inventario";
      }

      if ($inventario['vga'] != 0) {
        $disable1 = $inventario['vga'];
      } else {
        $disable1 = "Seleccione el N° de Inventario";
      }

      if ($inventario['bocina'] != 0) {
        $disable2 = $inventario['bocina'];
      } else {
        $disable2 = "Seleccione el N° de Inventario";
      }

      if ($inventario['adaptador'] != 0) {
        $disable3 = $inventario['adaptador'];
      } else {
        $disable3 = "Seleccione el N° de Inventario";
      }

      if ($inventario['extension'] != 0) {
        $disable4 = $inventario['extension'];
      } else {
        $disable4 = "Seleccione el N° de Inventario";
      }


      //Explicaación de esto en formulario.php
      $conexion = $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
      $comandoLAP = "SELECT * FROM inventario WHERE equipo='LAPTOP' && uso='NO'";
      $comandoVGA = "SELECT * FROM inventario WHERE equipo='CABLE VGA' && uso='NO'";
      $comandoBOC = "SELECT * FROM inventario WHERE equipo='BOCINAS' && uso='NO'";
      $comandoADA = "SELECT * FROM inventario WHERE equipo='ADAPTADOR' && uso='NO'";
      $comandoEXT = "SELECT * FROM inventario WHERE equipo='EXTENSION' && uso='NO'";
      $resLaps = mysqli_query($conexion, $comandoLAP);
      $resCVGA = mysqli_query($conexion, $comandoVGA);
      $resBoci = mysqli_query($conexion, $comandoBOC);
      $resAdap = mysqli_query($conexion, $comandoADA);
      $resExte = mysqli_query($conexion, $comandoEXT);
      ?>
      <h1 class="centrado grande identar" id="selecequip">Confirma la selección de equipo(s)</h1>

      <input type="checkbox" name="equipo" id="equipo" value=" Laptop" onchange="mostrarSelect();">
      <label id="equipos" for="equipo">Laptop</label>
      <select id="opciones" name="opciones" style="display: none" class="input">
        <option>
          <?php echo $disable; ?>
        </option>
        <?php
        while ($laptops = mysqli_fetch_array($resLaps)) {
          echo '
          <option>' . $laptops['n_inventario'] . '</option>
          ';
        }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo1" id="equipo1" value=" Cable VGA" onchange="mostrarSelect1();">
      <label id="equipos" for="equipo1">Cable VGA </label>
      <select id="opciones1" name="opciones1" style="display: none" class="input">
        <option>
          <?php echo $disable1; ?>
        </option>
        <?php
        while ($vgas = mysqli_fetch_array($resCVGA)) {
          echo '
            <option>' . $vgas['n_inventario'] . '</option>
            ';
        }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo2" id="equipo2" value=" Bocinas" onchange="mostrarSelect2();">
      <label id="equipos" for="equipo2">Bocinas </label>
      <select id="opciones2" name="opciones2" style="display: none" class="input">
        <option>
          <?php echo $disable2; ?>
        </option>
        <?php
        while ($bocinas = mysqli_fetch_array($resBoci)) {
          echo '
            <option>' . $bocinas['n_inventario'] . '</option>
            ';
        }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo3" id="equipo3" value=" Adaptador" onchange="mostrarSelect3();">
      <label id="equipos" for="equipo3">Adaptador </label><br>
      <select id="opciones3" name="opciones3" style="display: none" class="input">
        <option>
          <?php echo $disable3; ?>
        </option>
        <?php
        while ($adaptador = mysqli_fetch_array($resAdap)) {
          echo '
            <option>' . $adaptador['n_inventario'] . '</option>
            ';
        }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo4" id="equipo4" value=" Extensión" onchange="mostrarSelect4();">
      <label id="equipos" for="equipo4">Extensión</label>
      <select id="opciones4" name="opciones4" style="display: none" class="input">
        <option>
          <?php echo $disable4; ?>
        </option>
        <?php
        while ($extensiones = mysqli_fetch_array($resExte)) {
          echo '
            <option>' . $extensiones['n_inventario'] . '</option>
            ';
        }
        ?>
      </select>
      <br /><br />

      <a onclick="validar();">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Registrar Préstamo
      </a>
    </form>
  </div>
  <p class="left identify"><b><i>Umizumi inc.</i></b></p>
</body>

</html>