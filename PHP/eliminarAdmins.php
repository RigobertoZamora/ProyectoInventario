<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo eliminado</title>
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
        <input type="checkbox"/>
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
<br><h1><center>Control de administradores</center></h1>
<!--Añadir una clase de estilos, en este boton y en los de inventario.php-->
<h3>El Administrador con el ID "<?php echo $_GET['id']; ?>" ha sido eliminado exitosamente</h3>

<?php 
//Paso 1: Me conecto al servidor y guardo la conexion
$conexion = mysqli_connect("localhost", "root", "administrador","inventarioc");
$queryDelete = "DELETE FROM admins WHERE id =".$_GET['id'];
mysqli_query($conexion, $queryDelete);

 echo "<p id=\"CreditsText\">Administrador actual: " . $validacion['nombre'];
 echo "</p>";
 echo "<br><br>";

//Paso 2: Crear la consulta SQL
$querySelect = "SELECT * FROM admins ORDER BY id ASC";

//Paso 3: EJecuto la consulta SQL y guardo el resultado
$resultado = mysqli_query($conexion, $querySelect);
?>

<table id="container"> 
    <tr>
        <th>ID</th>
        <th>Nombre</th>
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
                    <a id='links' href='eliminarAdmins.php?id=".$admins['id']."&nombre=".$validacion['nombre']."'>Eliminar</a >
                    <a id='links' href='modificarAdmins.php?id=".$admins['id']."&nombre=".$validacion['nombre']."'>Modificar</a >
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

