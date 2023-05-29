<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de eliminado</title>
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
<br><h1><center>Historial de entregados</center></h1>
<br><p id="CreditsText">Administrador: <?php echo $validacion['nombre']?></p>
<h3>El préstamo con ID "<?php echo $_GET['id']; ?>"fue recuperado exitosamente, revise los préstamos actuales</h3>

<?php 
// Paso 1: Conectar al servidor y guardar la conexión
$conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");

// Paso 2: Obtener los datos del prestamista que se eliminará
$querySelect = "SELECT * FROM entregados WHERE id =" . $_GET['id'];
$resultado = mysqli_query($conexion, $querySelect);
$prestamista = mysqli_fetch_array($resultado);

// Paso 3: Eliminar el prestamista de la tabla entregados
$queryDelete = "DELETE FROM entregados WHERE id =" . $_GET['id'];
mysqli_query($conexion, $queryDelete); 

// Paso 4: Mover el registro eliminado a la tabla inventario
$queryInsert = "INSERT INTO registros (No_cuenta, Nombre, grapo, fecha, hora, equipo, laptop, vga, bocina, adaptador, extension) VALUES ('" . $prestamista['No_cuenta'] . "', '" . $prestamista['Nombre'] . "', '" . $prestamista['grapo'] . "','" . $prestamista['fechap'] . "', '" . $prestamista['horap'] . "', '" . $prestamista['equipo'] . "','" . $prestamista['laptop'] . "', '" . $prestamista['vga'] . "', '" . $prestamista['bocina'] . "','" . $prestamista['adaptador'] . "', '" . $prestamista['extension'] . "')";
mysqli_query($conexion, $queryInsert);

//✰ Paso 4.5: Marcamos que el equipo ya no está en uso
  if($prestamista['laptop']!=0)
  {
    $nouso = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$prestamista['laptop'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['vga']!=0)
  {
    $nouso = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$prestamista['vga'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['bocina']!=0)
  {
    $nouso = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$prestamista['bocina'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['adaptador']!=0)
  {
    $nouso = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$prestamista['adaptador'];
    mysqli_query($conexion, $nouso);
  }
  if($prestamista['extension']!=0)
  {
    $nouso = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$prestamista['extension'];
    mysqli_query($conexion, $nouso);
  }

?>

<br><p id="CreditsText">Estos son los préstamos ya finalizados que se han hecho a los usuarios:</p><br>

<?php
// Paso 5: Mostrar la tabla actualizada
$querySelect = "SELECT * FROM entregados ORDER BY nombre ASC";
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
    </tr>

<?php
while($entregados = mysqli_fetch_array($resultado))
{
    echo"
         <tr>
              <td>".$entregados['id']."</td>
              <td>".$entregados['No_cuenta']."</td>
              <td>".$entregados['Nombre']."</td>
              <td>".$entregados['grapo']."</td>
              <td>".$entregados['fecha']."</td>
              <td>".$entregados['hora']."</td>
              <td>".$entregados['equipo']."</td>
              <td>
                    <a id='links' href='eliminar.php?id=".$entregados['id']."&nombre=".$validacion['nombre']."'>Eliminar</a>
                    <a id='links' href='recuperar.php?id=".$entregados['id']."&nombre=".$validacion['nombre']."'>Recuperar</a>

                    </td>
        
         </tr>
    ";
}
?>
</table>
</body>
</html>
           