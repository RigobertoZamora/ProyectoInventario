<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro del préstamo</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../JS/funciones.js"></script>
</head>

<body>
  <!--------------------------------------------------------->
  <nav id="webgui">
    <ul>
      <li>
        <a href="../HTML/loginn.html"><span></span>ADMINISTRADOR</a>
      </li>
      <li>
        <a href="../HTML/acerca.html"><span></span>ACERCA DE...</a>
      </li>
    </ul>
  </nav>
  <!----------------------------------------------------------->
  <div id="formulario" class="login-box">
    <br><br><br><br>
    <form method="post" action="ingresa.php" name="formulario">
      <div class="user-box">
        <input type="text" id="ncuenta" name="ncuenta" class="input" placeholder="Ingresa el numero de cuenta" />
        <label for="ncuenta">Numero de Cuenta: </label>
      </div>
      <br /><br />
      <div class="user-box">
        <input type="text" id="ncompleto" name="ncompleto" class="input" placeholder="Ingresa el nombre completo" />
        <label for="ncompleto">Nombre Completo: </label>
      </div>

      <div class="user-box">
        <h5 id="selecequip">Grado y Grupo: </h5>
        <select id="grapo" class="input" name="grapo">
          <option value="Seleccione su grado y grupo">Seleccione su grado y grupo</option>
          <option value="1°A">1° "A"</option>
          <option value="1°B">1° "B"</option>
          <option value="1°C">1° "C"</option>
          <option value="1°D">1° "D" </option>
          <option value="1°E">1° "E" </option>
          <option value="1°F">1° "F" </option>
          <option value="2°A">2° "A"</option>
          <option value="2°B">2° "B"</option>
          <option value="2°C">2° "C"</option>
          <option value="2°D">2° "D" </option>
          <option value="2°E">2° "E" </option>
          <option value="2°F">2° "F" </option>
          <option value="3°A">3° "A"</option>
          <option value="3°B">3° "B"</option>
          <option value="3°C">3° "C"</option>
          <option value="3°D">3° "D" </option>
          <option value="3°E">3° "E" </option>
          <option value="3°F">3° "F" </option>
          <option value="4°A">4° "A"</option>
          <option value="4°B">4° "B"</option>
          <option value="4°C">4° "C"</option>
          <option value="4°D">4° "D" </option>
          <option value="4°E">4° "E" </option>
          <option value="4°F">4° "F" </option>
          <option value="5°A">5° "A"</option>
          <option value="5°B">5° "B"</option>
          <option value="5°C">5° "C"</option>
          <option value="5°D">5° "D" </option>
          <option value="5°E">5° "E" </option>
          <option value="5°F">5° "F" </option>
          <option value="6°A">6° "A"</option>
          <option value="6°B">6° "B"</option>
          <option value="6°C">6° "C"</option>
          <option value="6°D">6° "D" </option>
          <option value="6°E">6° "E" </option>
          <option value="6°F">6° "F" </option>
        </select>
      </div>
      <br>
      <?php
      date_default_timezone_set('America/Chihuahua');
      $fecha = date("Y-m-d");
      $hora = date("H:i:s");
      ?>
      <div class="user-box">
        <input type="text" id="fecha" name="fecha" class="input" value="<?php echo $fecha; ?>" readonly />
      </div>
      <div class="user-box">
        <input type="text" id="hora" name="hora" class="input" value="<?php echo $hora; ?>" readonly />
      </div>
      <h1 class="centrado grande identar" id="selecequip">
        Selecciona equipo(s)
      </h1>

      <?php
      /*Para los que se encuentran haciendo lo del documento, no se me espanten, les explico
        Estas variables "comando" tienen como objetivo rescatar toda la informacion de los equipos en el inventario
        MIENTRAS sea un tipo de equipo en especifico Y no se estén usando.

        Así es, ahora nuestro sistema controla quién se llevo cierto equipo, y por ende, otras personas no
        podrán seleccionar que se quieren llevar el mismo equipo que otro ya tiene. 

        Todos los "res" hacen la consulta en la base de datos para extraer lo que se pide en los "comando"

        este patrón de codigos se repiten en modificar.php
      */
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

      <input type="checkbox" name="equipo" id="equipo" value=" Laptop" onchange="mostrarSelect();" />
      <label id="equipos" for="equipo">Laptop</label>
      <select id="opciones" class="input" name="opciones" style="display: none">
        <option disabled selected>Seleccione el N° de Inventario</option>
        <?php
        //Se abre un bucle teniendo como límite el número de registros completos metidos en un arreglo o "array", lo que se repite en bucle es el despliego de opciones con los números de inventario en cada una hasta que se agoten; escribeme si tienes dudas -Rigo
        while($laptops = mysqli_fetch_array($resLaps)){
          echo '
          <option>'.$laptops['n_inventario'].'</option>
          ';
        }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo1" id="equipo1" value=" Cable VGA" onchange="mostrarSelect1();" />
      <label id="equipos" id="equipos" for="equipo1">Cable VGA </label>
      <select id="opciones1" class="input" name="opciones1" style="display: none">
        <option disabled selected>Seleccione el N° de Inventario</option>
        <?php
          while($vgas = mysqli_fetch_array($resCVGA)){
            echo '
            <option>'.$vgas['n_inventario'].'</option>
            ';
          }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo2" id="equipo2" value=" Bocinas" onchange="mostrarSelect2();" />
      <label id="equipos" for="equipo2">Bocinas </label>
      <select id="opciones2" class="input" name="opciones2" style="display: none">
        <option disabled selected>Seleccione el N° de Inventario</option>
        <?php
          while($bocinas = mysqli_fetch_array($resBoci)){
            echo '
            <option>'.$bocinas['n_inventario'].'</option>
            ';
          }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo3" id="equipo3" value=" Adaptador" onchange="mostrarSelect3();" />
      <label id="equipos" for="equipo3">Adaptador </label>
      <select id="opciones3" class="input" name="opciones3" style="display: none">
        <option disabled selected>Seleccione el N° de Inventario</option>
        <?php
          while($adaptador = mysqli_fetch_array($resAdap)){
            echo '
            <option>'.$adaptador['n_inventario'].'</option>
            ';
        }
        ?>
      </select>
      <br /><br />

      <input type="checkbox" name="equipo4" id="equipo4" value=" Extensión" onchange="mostrarSelect4();" />
      <label id="equipos" for="equipo4">Extensión</label>
      <select id="opciones4" class="input" name="opciones4" style="display: none">
        <option disabled selected>Seleccione el N° de Inventario</option>
        <?php
          while($extensiones = mysqli_fetch_array($resExte)){
            echo '
            <option>'.$extensiones['n_inventario'].'</option>
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
</body>

</html>