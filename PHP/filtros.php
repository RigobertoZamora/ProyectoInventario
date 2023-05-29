<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de inventario</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php
    /*Código por problemas de conexion (ignorar)
    if(isset($_POST['equipo'])) {
        echo "El formulario se envió correctamente";
    } else {
        echo "El formulario no se envió correctamente";
    }*/

    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
    $filtro = $_POST['equipo'];
    switch ($filtro) {
        case 'Laptop':
            $querySelect = "SELECT * FROM inventario WHERE equipo='LAPTOP' ORDER BY id ASC";
            break;
        case 'Cable vga':
            $querySelect = "SELECT * FROM inventario WHERE equipo='CABLE VGA' ORDER BY id ASC";
            break;
        case 'Bocinas':
            $querySelect = "SELECT * FROM inventario WHERE equipo='BOCINAS' ORDER BY id ASC";
            break;
        case 'Adaptador':
            $querySelect = "SELECT * FROM inventario WHERE equipo='ADAPTADOR' ORDER BY id ASC";
            break;
        case 'Extension':
            $querySelect = "SELECT * FROM inventario WHERE equipo='LAPTOP' ORDER BY id ASC";
            break;
        default:
            $querySelect = "SELECT * FROM inventario ORDER BY id ASC";
            break;
    }
    if ($filtro == "") {
        $filtro = "Todos los elementos";
    }

    $resultado = mysqli_query($conexion, $querySelect);

    $comando = "SELECT * FROM admins WHERE nombre='".$_GET['nombre']."'";
    $awake = mysqli_query($conexion, $comando);
    $validacion = mysqli_fetch_array($awake);
?>
    <!-------------------------------------Lista--------------------------------->
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
                '; ?>
            </ul>
        </div>
    </nav>
    <!----------------------------------------------------------------------------->
    <br>
    <h1>
        <center>Inventario del centro de cómputo principal</center>
    </h1>
    <br><p id="CreditsText">Administrador: <?php echo $validacion['nombre']?></p>
    <h3>Vista actual del inventario:
        <?php echo "$filtro"; ?>
    </h3>
    <h3>Selecciona un tipo de equipo para una visualización más precisa:</h3>
    <?php echo '<form class="relativeCuenta" method="post" action="filtros.php?nombre='.$validacion['nombre'].'" name="formularioEquipos">';?>
        <select id="equipo" class="input" name="equipo">
            <option selected disabled>Selecciona equipo</option>
            <option value="Laptop">Laptop</option>
            <option value="Cable vga">Cable VGA</option>
            <option value="Bocinas">Bocinas</option>
            <option value="Adaptador">Adaptador</option>
            <option value="Extension">Extension</option>
        </select>
        <input type="submit" id="filtro" value="Aplicar Filtro" onclick="validarEquipo();" />
        <!--Añadir una clase de estilos, en este boton y en los de inventario.php-->
    </form>

    <br><br>
    <p id="CreditsText">Los equipos registrados son:</p><br><br>
    <table id="container">
        <tr>
            <th>ID</th>
            <th>No. Inventario</th>
            <th>Equipo</th>
            <th>Descripción</th>
            <th>No. Folio</th>
            <th>Importe</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>
            <th>Ubicación</th>
            <th>Fecha de Resguardo</th>
            <th>BNL</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($inventario = mysqli_fetch_array($resultado)) {
            echo "
                 <tr>
                      <td>" . $inventario['id'] . "</td>
                      <td>" . $inventario['n_inventario'] . "</td>
                      <td>" . $inventario['equipo'] . "</td>
                      <td>" . $inventario['descripcion'] . "</td>
                      <td>" . $inventario['n_folio'] . "</td>
                      <td>" . $inventario['importe'] . "</td>
                      <td>" . $inventario['marca'] . "</td>
                      <td>" . $inventario['modelo'] . "</td>
                      <td>" . $inventario['serie'] . "</td>
                      <td>" . $inventario['ubicacion'] . "</td>
                      <td>" . $inventario['fecha_resguardo'] . "</td>
                      <td>" . $inventario['bnl'] . "</td>
                      <td>
                            <a id='links' href='eliminarInv.php?id=" . $inventario['id'] . "&nombre=".$validacion['nombre']."'>Eliminar</a >
                            <a id='links' href='modificarInv.php?id=" . $inventario['id'] . "&nombre=".$validacion['nombre']."'>Modificar</a >
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
                <li>
                    <a href="formularioNI.php"> <span></span> Añadir Nuevo Inventario</a>
                </li>
            </ul>
        </div>
</body>

</html>