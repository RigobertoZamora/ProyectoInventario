<html>
<head>
	<title>Registro modificado</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
	<!--Lista-->
<nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox"/>
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <?php
                echo '
                <li><a href="formulario.php">CERRAR SESION</a></li>
                <li><a href="mostrar_datos1.php">REGISTROS ACTUALES</a></li>
                <li><a href="historial.php">HISTORIAL</a></li>
                <li><a href="inventario.php">INVENTARIO</a></li>
                <li><a href="administradores.php">ADMINISTRADORES</a></li>
                ';
                ?>
            </ul>
        </div>
</nav>
	<!--------------------------------------------------------------->
  <?php
    //Paso 1: Me conecto al servidor y guardo la conexion
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");

    //Paso 2: Creo la consulta SQL para actualizar
    $consultaUpdate = "UPDATE admins SET
                       nombre='".$_POST['nombre']."', 
                       correo='".$_POST['correo']."',
                       password='".$_POST['contra']."'
                       WHERE 
                       id=".$_POST['id'];
    //Paso 3: Ejecuto la consulta SQL para actualizar
    mysqli_query($conexion, $consultaUpdate);
    
    //Paso 4: Ejecuto la consulta SQL y guardo el resultado
    $querySelect = "SELECT * FROM admins"; 
    $resultado = mysqli_query($conexion, $querySelect);
    echo "<br><h1><center>Control de administradores</center></h1>";
    echo "<br><br>";
  ?>

  <table id="container">
    <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Correo</th>
        <th>Password</th>
        <th>Acciones</th>
    </tr>
    <?php
      while($admins = mysqli_fetch_array($resultado))
      {
          echo"
               <tr>
                    <td>".$admins['id']."</td>
                    <td>".$admins['nombre']."</td>
                    <td>".$admins['correo']."</td>
                    <td>".$admins['password']."</td>

                  <td>
                        <a id='links' href='eliminarAdmins.php?id=".$admins['id']."'>Eliminar</a >
                        <a id='links' href='modificarAdmins.php?id=".$admins['id']."'>Modificar</a >
                            </td>
               </tr>
          ";
      }
?>
</table>
<div id="CreditsBtn">
            <ul>
                <li>
                    <a href="formularioNA.php"> <span></span>Añadir Nuevo Administrador</a>
                </li>
            </ul>
        </div>
</body>
</html>