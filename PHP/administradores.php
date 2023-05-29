<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
        $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
        $comando = "SELECT * FROM admins WHERE nombre='".$_GET['nombre']."'";
        $resultado = mysqli_query($conexion, $comando);
        $validacion = mysqli_fetch_array($resultado);
        $querySelect = "SELECT * FROM admins ORDER BY id ASC";
        $consultaAdmins = mysqli_query($conexion, $querySelect);
    ?>
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
    <?php
        echo "<br><h1><center>Control de administradores</center></h1>";
        echo "<p id=\"CreditsText\">Administrador actual: " . $validacion['nombre'];
        echo "</p>";
        echo "<br><br>";
    ?>
    
    <!--La tabla principal al entrar en admins-->
    <table id="container">
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Correo</th>
            <th>Password</th>
            <th>Acciones</th>
        </tr>

        <?php
        while ($admins = mysqli_fetch_array($consultaAdmins)) {
            echo "
                 <tr>
                      <td>" . $admins['id'] . "</td>
                      <td>" . $admins['nombre'] . "</td>
                      <td>" . $admins['correo'] . "</td>
                      <td>" . $admins['password'] . "</td>

                     <td>
                            <a id='links' href='eliminarAdmins.php?id=" . $admins['id'] . "&nombre=".$validacion['nombre']."'>Eliminar</a >
                            <a id='links' href='modificarAdmins.php?id=" . $admins['id'] . "&nombre=".$validacion['nombre']."'>Modificar</a >
                            </td>

                 </tr>
            ";
        }
        echo "</table>";

        ?>
        <br>
        <div id="CreditsBtn">
            <ul>
                <li>
                    <a href="formularioNA.php"> <span></span>Añadir Nuevo Administrador</a>
                </li>
            </ul>
        </div>

</body>

</html>