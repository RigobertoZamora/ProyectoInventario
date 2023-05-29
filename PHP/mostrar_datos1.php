<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos vigentes</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
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
        <br><h1><center>Control de préstamos vigentes</center></h1>";
        echo "<br><p id=\"CreditsText\"> Administrador: ".$validacion['nombre'];
        echo "</p>";
?>
        <h3>Escribe el No. Cuenta del prestatario a la izquierda o la Fecha del préstamo a la derecha para una visualización más precisa:</h3>
        <!--FILTRO POR FECHA-->
        <div class="relativeFecha">
            <form action="bfecha.php" method="post">
                <input type="date" name="bfecha" class="input">
                <input type="submit" id="filtro" name="bfiltro" value="Filtrar" onclick="validarFecha();"/>
            </form>
        </div>
        <!--FILTRO POR N° CUENTA-->
        <div class="relativeCuenta">
            <form action="bregistros.php" method="post">
               <input type="text" name="busqueda" class="input" placeholder="Número de cuenta">
               <input type="submit" id="filtro" name="bfiltro" value="Buscar" onclick="validarCuenta();"/>
            </form>
        </div>

        <p id="CreditsText">Estos son los préstamos actuales a usuarios:</p><br><br>
        
<?php
        $querySelect = "SELECT * FROM registros ORDER BY id ASC";

        $resultado = mysqli_query($conexion, $querySelect);
?>
    <!--La tabla principal al entrar en admins-->
        <table id="container"> 
            <tr>
               <th>ID</th>
               <th>No.Cuenta</th>
               <th>Nombre Completo</th>
               <th>Grado y Grupo</th>
               <th>Fecha</th>
               <th>Hora</th>
               <th>Equipo(s)</th>
               <th>Acciones</th>
            </tr>

<?php
        while($inventario = mysqli_fetch_array($resultado))
        {
            echo"
                 <tr>
                      <td>".$inventario['id']."</td>
                      <td>".$inventario['No_cuenta']."</td>
                      <td>".$inventario['Nombre']."</td>
                      <td>".$inventario['grapo']."</td>
                      <td>".$inventario['fecha']."</td>
                      <td>".$inventario['hora']."</td>
                      <td>".$inventario['equipo']."</td>
                      <td>
                            <a id='links' href='eliminaAHistorial.php?id=".$inventario['id']."&nombre=".$validacion['nombre']."'>Entregado</a >
                            <a id='links' href='modificar.php?id=".$inventario['id']."&nombre=".$validacion['nombre']."'>Modificar</a >
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