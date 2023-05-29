<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador añadido</title>
  <link rel="stylesheet" href="../CSS/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!------------------------------------------------------------->
  <div id="CreditsBtn">
      <ul>
        <li>
          <a href="administradores.php"> <span></span> 🡨 Regresar</a>
        </li>
      </ul>
    </div>
  <!------------------------------------------------------------->
  <!--No tiene los estilos-->

<?php 
  $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc") or die("Hubo un problema al conectar con MySQL");
  $comando = "SELECT * FROM admins";
  $resultado = mysqli_query($conexion, $comando);
  /*$validacion = mysqli_fetch_array($resultado);*/$encontrado = false;
  while ($validacion = mysqli_fetch_array($resultado)) {
    if ($validacion['correo'] == $_POST['correona']) {
      $encontrado = true;
      break;
    }
  }
      if($encontrado)
      {
         echo "
        <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Alerta de error',
                    text: 'Has introducido un correo ya existente!',
                    showConfirmButton: true,
                }).then(function(){
                    window.location = '../PHP/formularioNA.php'
                });
            </script>
            ";
      }else{
?>
  <div id="CreditsBox">
    <div id="CreditsText">
    <h1 class="center" id="CreditsText">Nuevo administrador añadido exitosamente</h1>
        <h3>Los datos recibidos son:</h3>
        <span id="CreditsText">Nombre completo: </span><?php echo $_POST['ncompletona']; ?><br>
        <span id="CreditsText">Correo: </span><?php echo $_POST['correona']; ?><br>
        <span id="CreditsText">Contraseña: </span><?php echo $_POST['passwordna']; ?><br>
    </div>
  </div>
  <?php

  $queryInsert = "INSERT INTO admins VALUES(
                       '#',
                       '" . $_POST['ncompletona'] . "', 
                       '" . $_POST['correona'] . "',
                       '" . $_POST['passwordna'] . "'      
       	                )";

  mysqli_query($conexion, $queryInsert);
 } 
 //ESTE CORCHETE ES DEL ELSE
?>
</body>
</html>