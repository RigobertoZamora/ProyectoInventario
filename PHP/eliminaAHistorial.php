<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Entregado</title>
  <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
  <?php
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
    $comando = "SELECT * FROM admins WHERE nombre='".$_GET['nombre']."'";
    $resultado = mysqli_query($conexion, $comando);
    $validacion = mysqli_fetch_array($resultado);
  ?>

  <!--Lista-->
  <nav role="navigation">
    <div id="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>
      <ul id="menu">
        <?php
        echo '
        <li><a href="formulario.php">CERRAR SESION</a></li>
        <li><a href="mostrar_datos1.php?nombre='.$validacion['nombre'].'">REGISTROS ACTUALES</a></li>
        <li><a href="historial.php?nombre='.$validacion['nombre'].'">HISTORIAL</a></li>
        <li><a href="inventario.php?nombre='.$validacion['nombre'].'">INVENTARIO</a></li>
        <li><a href="administradores.php?nombre='.$validacion['nombre'].'">ADMINISTRADORES</a></li>
        ';
        ?>     
      </ul>
    </div>
  </nav>
  <!--------------------------------------------------------------->
  
  <br><h1><center>Control de préstamos vigentes</center></h1>
  <br><p id="CreditsText">Administrador: <?php echo $validacion['nombre']?>
  <h3>El préstamo con ID "
    <?php echo $_GET['id']; ?>" ha sido marcado como "Entregado"
  </h3>
  <h3>De haberse tratado de un error favor de ingresar al historial y seleccionar "Recuperar" en el registro</h3>
  <br><h3>Escribe el No. Cuenta del prestatario a la izquierda o la Fecha del préstamo a la derecha para una visualización más precisa:</h3>
        <!--FILTRO POR FECHA-->
        <div class="relativeFecha">
            <form action="bfecha.php" method="post">
                <input type="date" name="bfecha" class="input">
                <input type="submit" name="bfiltro" id="filtro" value="Filtrar" onclick="validarFecha();"/>
            </form>
        </div>
        <!--FILTRO POR N° CUENTA-->
        <div class="relativeCuentaaa">
            <form action="bregistros.php" method="post">
               <input type="text" name="busqueda" class="input" placeholder="Número de cuenta">
               <input type="submit" name="bfiltro" id="filtro" value="Buscar" onclick="validarCuenta();"/>
            </form>
        </div>

        <p id="CreditsText">Estos son los préstamos actuales a usuarios:</p><br><br>

  <?php
  date_default_timezone_set('America/Chihuahua');
  $fecha = date("Y-m-d");
  $hora = date("H:i:s");
  ?>
  <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>" readonly />
  <br /><br />
  <input type="hidden" id="hora" name="hora" value="<?php echo $hora; ?>" readonly />
  <br />

  <?php
  // Paso 1: Conectar al servidor y guardar la conexión
  $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");

  // Paso 2: Obtener los datos del prestamista que se eliminará
  $querySelect = "SELECT * FROM registros WHERE id =" . $_GET['id'];
  $resultado = mysqli_query($conexion, $querySelect);
  $prestamista = mysqli_fetch_array($resultado);
  //echo $prestamista['fecha'];
  //echo $prestamista['hora'];

  // Paso 3: Eliminar el prestamista de la tabla inventario
  $queryDelete = "DELETE FROM registros WHERE id =" . $_GET['id'];
  mysqli_query($conexion, $queryDelete);

  // Paso 4: Mover el registro eliminado a la tabla entregados
  $fechaActual = date("Y-m-d");
  $horaActual = date("H:i:s");
  $queryInsert = "INSERT INTO entregados (No_cuenta, Nombre, grapo, fecha, hora, equipo, laptop, vga, bocina, adaptador, extension, fechap, horap) VALUES ('" . $prestamista['No_cuenta'] . "', '" . $prestamista['Nombre'] . "', '" . $prestamista['grapo'] . "', '" . $fechaActual . "', '" . $horaActual . "', '" . $prestamista['equipo'] . "','" . $prestamista['laptop'] . "', '" . $prestamista['vga'] . "', '" . $prestamista['bocina'] . "','" . $prestamista['adaptador'] . "', '" . $prestamista['extension'] . "', '" . $prestamista['fecha'] . "', '" . $prestamista['hora'] . "')";
  mysqli_query($conexion, $queryInsert);

  //✰ Paso 4.5: Marcamos que el equipo ya no está en uso
  if($prestamista['laptop']!=0)
  {
    $nouso = "UPDATE inventario SET uso='NO' WHERE n_inventario=".$prestamista['laptop'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['vga']!=0)
  {
    $nouso = "UPDATE inventario SET uso='NO' WHERE n_inventario=".$prestamista['vga'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['bocina']!=0)
  {
    $nouso = "UPDATE inventario SET uso='NO' WHERE n_inventario=".$prestamista['bocina'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['adaptador']!=0)
  {
    $nouso = "UPDATE inventario SET uso='NO' WHERE n_inventario=".$prestamista['adaptador'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['extension']!=0)
  {
    $nouso = "UPDATE inventario SET uso='NO' WHERE n_inventario=".$prestamista['extension'];
    mysqli_query($conexion, $nouso);
  }
//No saben la de horas que me llevo esto, espero al menos que el trabajo escrito amerite un 27/10
  ?>

  <br>

  <?php
  // Paso 5: Mostrar la tabla actualizada
  $querySelect = "SELECT * FROM registros ORDER BY nombre ASC";
  $resultado = mysqli_query($conexion, $querySelect);
  ?>

  <table id="container">
    <tr>
      <th>ID</th>
      <th>No.Cuenta</th>
      <th>Nombre Completo</th>
      <th>Grado y Grupo</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Equipo</th>
      <th>Acciones</th>
    </tr>

    <?php
    while ($registros = mysqli_fetch_array($resultado)) {
      echo "
         <tr>
              <td>" . $registros['id'] . "</td>
              <td>" . $registros['No_cuenta'] . "</td>
              <td>" . $registros['Nombre'] . "</td>
              <td>" . $registros['grapo'] . "</td>
              <td>" . $registros['fecha'] . "</td>
              <td>" . $registros['hora'] . "</td>
              <td>" . $registros['equipo'] . "</td>
              <td>
                    <a id='links' href='eliminaAHistorial.php?id=" . $registros['id'] . "&nombre=".$validacion['nombre']."'>Entregado</a>
                    <a id='links' href='modificar.php?id=".$inventario['id']."&nombre=".$validacion['nombre']."'>Modificar</a >
                    </td>
        
         </tr>
    ";
    }
    ?>
  </table>
</body>

</html>