<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro guardado</title>
   <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div id="CreditsBtn">
      <ul>
        <li>
          <a href="formulario.php"> <span></span> 🡨 Inicio</a>
        </li>
      </ul>
    </div>
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
      //Paso 1: Guardamos la conexion en una variable
         $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc") or die("Hubo un problema al conectar con MySQL");
         //Paso 2: Creamos la consulta SQL
         $queryInsert = "INSERT INTO registros VALUES(
                         '#',
                         '".$_POST['ncuenta']."', 
                         '".$_POST['ncompleto']."',
                         '".$_POST['grapo']."',
                         '".$_POST['fecha']."',
                         '".$_POST['hora']."',
                         '".$equipos."',
                         '".$lap."',
                         '".$vga."',
                         '".$boc."',
                         '".$ada."',
                         '".$ext."'
                         )";
         //echo $queryInsert;
                          
         //Paso 3: Ejecuto la consulta
                        mysqli_query($conexion,$queryInsert);

      //✰ Paso 4: Actualizamos el equipo para señalar que está en uso
      if($lap != "Seleccione el N° de Inventario" && $lap != "0")
      {
        $usando = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$lap."";
        mysqli_query($conexion,$usando);
      }
      if($vga != "Seleccione el N° de Inventario" && $vga != "0")
      {
        $usando = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$vga."";
        mysqli_query($conexion,$usando);
      }
      if($boc != "Seleccione el N° de Inventario" && $boc != "0")
      {
        $usando = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$boc."";
        mysqli_query($conexion,$usando);
      }
      if($ada != "Seleccione el N° de Inventario" && $ada != "0")
      {
        $usando = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$ada."";
        mysqli_query($conexion,$usando);
      }
      if($ext != "Seleccione el N° de Inventario" && $ext != "0")
      {
        $usando = "UPDATE inventario SET uso='SI' WHERE n_inventario=".$ext."";
        mysqli_query($conexion,$usando);
      }
  ?>
  <div id="CreditsBox">
      <div id="CreditsText">
        <h1 class="center" id="CreditsText">
          Ingreso de datos del prestamista
        </h1>
        <h3 id="CreditsText">Los datos recibidos son:</h3>
        <span id="CreditsText">No.Cuenta: </span
        ><?php echo $_POST['ncuenta']; ?><br /><br />
        <span id="CreditsText">Nombre completo: </span
        ><?php echo $_POST['ncompleto']; ?><br /><br />
        <span>Grado y grupo: </span
        ><?php echo $_POST['grapo']; ?><br /><br />
        <span id="CreditsText">Fecha: </span
        ><?php echo $_POST['fecha']; ?><br /><br />
        <span id="CreditsText">Hora: </span
        ><?php echo $_POST['hora']; ?><br /><br />
        <span id="CreditsText">Equipo(s): </span
        ><?php echo $equipos; ?><br /><br /><br />
        <span id="warning"
          >¡Tienes hasta las 3 de la tarde del día de hoy para devolver el equipo prestado!</span
        >
      </div>
    </div>
</body>
</html>