<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro eliminado</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

    <!--Lista-->
    <nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <li><a href="formulario.php">CERRAR SESION</a></li>
                <li><a href="mostrar_datos1.php">REGISTROS ACTUALES</a></li>
                <li><a href="historial.php">HISTORIAL</a></li>
                <li><a href="inventario.php">INVENTARIO</a></li>
                <li><a href="administradores.php">ADMINISTRADORES</a></li>
            </ul>
        </div>
    </nav>
    <!--------------------------------------------------------------->
    <br>
    <h1>
        <center>Historial de registros</center>
    </h1>
    <h3>El préstamo con ID eliminado es: <?php echo $_GET['id']; ?> </h3>

    
    <?php
    //Paso 1: ME conecto al servidor y guardo la conexion
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
    $queryDelete = "DELETE FROM entregados WHERE id =" . $_GET['id'];
    mysqli_query($conexion, $queryDelete);
    ?>

   <br><p id="CreditsText">Estos son los préstamos ya finalizados que se han hecho a los usuarios:</p><br>

    <?php


    //Paso 2: Crear la consulta SQL
    $querySelect = "SELECT * FROM entregados ORDER BY nombre ASC";

    //Paso 3: EJecuto la consulta SQL y guardo el resultado
    $resultado = mysqli_query($conexion, $querySelect);
    ?>

    <table id="container">
        <tr>
            <th>ID</th>
            <th>No.Cuenta</th>
            <th>Nombre Completo</th>
            <th>Grado y Grupo</th>
            <th>Fecha</th>
            <th>Hora de entrega</th>
            <th>Equipo</th>
            <th>Acciones</th>
        </tr>

        <?php
        while ($entregados = mysqli_fetch_array($resultado)) {
            echo "
         <tr>
              <td>" . $entregados['id'] . "</td>
              <td>" . $entregados['No_cuenta'] . "</td>
              <td>" . $entregados['Nombre'] . "</td>
              <td>" . $entregados['grapo'] . "</td>
              <td>" . $entregados['fecha'] . "</td>
              <td>" . $entregados['hora'] . "</td>
              <td>" . $entregados['equipo'] . "</td>
              <td>
                    <a id='links' href='eliminar.php?id=" . $entregados['id'] . "'>Eliminar</a >
                    <a id='links' href='recuperar.php?id=" . $entregados['id'] . "'>Recuperar</a >
                    </td>

         </tr>
    ";
        }
        ?>
    </table>
    <br><br>
    <div id="CreditsBtn">
        <ul>
            <li>
                <a href="formularioNA.php"> <span></span>Añadir Nuevo Administrador</a>
            </li>
        </ul>
    </div>

</body>

</html>