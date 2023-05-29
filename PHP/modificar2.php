<html>
<head>
	<title>Registro modificado</title>
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
          '; ?>
      </ul>
    </div>
  </nav>
	<!--------------------------------------------------------------->
	<?php
      if($_POST['opciones'] != "Seleccione el N° de Inventario" && $_POST['opciones'] != "")
      {
        $lap=$_POST['opciones'];
      }else{
        $lap="0";
      }
      if($_POST['opciones1'] != "Seleccione el N° de Inventario" && $_POST['opciones1'] != "")
      {
        $vga=$_POST['opciones1'];
      }else{
        $vga="0";
      }
      if($_POST['opciones2'] != "Seleccione el N° de Inventario" && $_POST['opciones2'] != "")
      {
        $boc=$_POST['opciones2'];
      }else{
        $boc="0";
      }
      if($_POST['opciones3'] != "Seleccione el N° de Inventario" && $_POST['opciones3'] != "")
      {
        $ada=$_POST['opciones3'];
      }else{
        $ada="0";
      }
      if($_POST['opciones4'] != "Seleccione el N° de Inventario" && $_POST['opciones4'] != "")
      {
        $ext=$_POST['opciones4'];
      }else{
        $ext="0";
      }


      $equipos = "";
      if($_POST['equipo'] == true)
      {
        $equipos .="| Laptop N° ".$lap."| ";
      }
      if ($_POST['equipo1'] == true) 
      {
        $equipos .="| Cable VGA N° ".$vga."| ";
      }
      if ($_POST['equipo2'] == true) 
      {
        $equipos .="| Bocina N° ".$boc."| ";
      }
      if ($_POST['equipo3'] == true) 
      {
        $equipos .="| Adaptador N° ".$ada."| ";
      }
      if ($_POST['equipo4'] == true) 
      {
        $equipos .="| Extensión N° ".$ext."| ";
      }
  ?>
  <br><h1><center>Control de préstamos vigentes</center></h1>
  <?php
    //Paso 1: Me conecto al servidor y guardo la conexion
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");

    //Paso 2: Creo la consulta SQL para actualizar
    $consultaUpdate = "UPDATE registros SET
                       No_cuenta=".$_POST['ncuenta'].", 
                       Nombre='".$_POST['ncompleto']."',
                       grapo='".$_POST['grapo']."',
                       fecha='".$_POST['fecha']."',
                       hora='".$_POST['hora']."',
                       equipo='".$equipos."'
                       WHERE 
                       id=".$_POST['id'];
    //Paso 3: Ejecuto la consulta SQL para actualizar
    mysqli_query($conexion, $consultaUpdate);
    
    //Paso 4: Ejecuto la consulta SQL y guardo el resultado
    $querySelect = "SELECT * FROM registros"; 
    $resultado = mysqli_query($conexion, $querySelect);
  ?>
  <h3>Los Prestamistas registrados son:</h3><br>

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
                          <a id='links' href='eliminar.php?id=".$inventario['id']."'>Eliminar</a >
                          <a id='links' href='modificar.php?id=".$inventario['id']."'>Modificar</a >
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