<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
    //Conexión con la tabla "admins" en la BDD
    $comando = "SELECT * FROM admins WHERE nombre='".$_GET['nombre']."'";
    $resultado = mysqli_query($conexion, $comando);
    $validacion = mysqli_fetch_array($resultado);
        echo '
            <div id="menuToggle">
            <nav role="navigation">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">  
                <li><a href="formulario.php">CERRAR SESION</a></li>
                <li><a href="mostrar_datos1.php?nombre='.$validacion['nombre'].'">REGISTROS ACTUALES</a></li>
                <li><a href="historial.php?nombre='.$validacion['nombre'].'">HISTORIAL</a></li>
                <li><a href="inventario.php?nombre='.$validacion['nombre'].'">INVENTARIO</a></li>
                <li><a href="administradores.php?nombre='.$validacion['nombre'].'">ADMINISTRADORES</a></li>
            </ul>
            </nav>
            </div>';  
        echo "
        <br><h1><center>Historial de entregados</center></h1>";
        echo "<br><p id=\"CreditsText\"> Administrador: ".$validacion['nombre'];
        echo "</p>";

        $querySelect = "SELECT * FROM entregados ORDER BY id ASC";

        $resultado = mysqli_query($conexion, $querySelect);
?>
    <br><p id="CreditsText">Estos son los préstamos ya finalizados que se han hecho a los usuarios:</p><br>
    <!--La tabla principal al entrar en admins-->
        <table id="container"> 
            <tr>
               <th>ID</th>
               <th>No.Cuenta</th>
               <th>Nombre Completo</th>
               <th>Grado y Grupo</th>
               <th>Fecha</th>
               <th>Hora de entrega</th>
               <th>Equipo(s)</th>
               <th>Acciones</th>
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
                            <a id='links' href='eliminar.php?id=".$entregados['id']."'>Eliminar</a >
                            <a id='links' href='recuperar.php?id=".$entregados['id']."'>Recuperar</a >
                            </td>

                 </tr>
            ";
        }
            echo "</table>";
?>
        <div id="CreditsBtn">
            <ul>
                <li>
                    <a href="formularioNA.php"> <span></span>Añadir Nuevo Administrador</a>
                </li>
            </ul>
        </div>
</body>
</html>