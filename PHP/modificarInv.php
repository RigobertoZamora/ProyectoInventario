<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificando registro...</title>
	<link rel="stylesheet" href="../CSS/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../JS/funciones.js"></script>
</head>
<body>
<?php
    $conexion = mysqli_connect("localhost", "root", "administrador", "inventarioc");
    $comando = "SELECT * FROM admins WHERE nombre='".$_GET['nombre']."'";
    $resultado = mysqli_query($conexion, $comando);
    $validacion = mysqli_fetch_array($resultado);
  ?>

	<!--Lista-->
	<div id="CreditsBtn">
      <ul>
        <li>
          <?php
          echo '
          <a href="inventario.php?nombre='.$validacion['nombre'].'"> <span></span> 🡨 Regresar</a>
          ';
          ?>
        </li>
      </ul>
    </div>
	<!------------------------------------------------------------->
	<?php
		//Paso 1:  creo la conexion
		$conexion  = mysqli_connect("localhost", "root", "administrador", "inventarioc");
		//Paso 2: Creo la consulta 
		$querySelect = "SELECT * FROM inventario WHERE id=".$_GET['id'];
		//Paso  3: Ejecuta la consulta
		$resultado = mysqli_query($conexion, $querySelect);
		//Paso 4: Extraigo los datos de la consulta
		$inventario= mysqli_fetch_array($resultado);
	?>
	<div id="formulario" class="login-box">
        <p class="centrado grande identar">Modifica los datos del equipo</p>
      <form method="post" action="modificar2Inv.php" name="formularioNI" >
        <input
          type="hidden"
          id="id"
          name="id"
          value="<?php echo $inventario['id']; ?>"
          class="input"
        />
        <div class="user-box">
        <input type="text" id="ninventario" name="ninventario" class="input" value="<?php echo $inventario['n_inventario']; ?>" placeholder="Ingresa el numero de inventario"/>
</div>
        <br/>
        <select id="equipo" class="input" name="equipo">
          <option <?php echo $inventario['equipo']; ?>><?php echo $inventario['equipo']; ?></option>
          <option value="LAPTOP">Laptop</option>
          <option value="CABLE VGA">Cable VGA</option>
          <option value="BOCINAS">Bocinas</option>
          <option value="ADAPTADOR">Adaptador</option>
          <option value="EXTENSION">Extension</option>
        </select>
        <br/>
        <div class="user-box">
        <input type="text" id="descripcion" name="descripcion" class="input" value="<?php echo $inventario['descripcion']; ?>" placeholder="Ingresa descripcion"/>
        <br/>
</div>
        <div class="user-box">
        <input type="text" id="nfolio" name="nfolio" class="input" value="<?php echo $inventario['n_folio']; ?>" placeholder="Ingresa el numero de folio"/>
        <br/>
</div>
        <div class="user-box">
        <input type="text" id="importe" name="importe" class="input" value="<?php echo $inventario['importe']; ?>"placeholder="Ingresa el importe"/>
        <br/><
</div>
        <div class="user-box">
        <input type="text" id="marca" name="marca" class="input" value="<?php echo $inventario['marca']; ?>" placeholder="Ingresa la marca"/>
        <br/><
</div>
        <div class="user-box">
        <input type="text" id="modelo" name="modelo" class="input" value="<?php echo $inventario['modelo']; ?>" placeholder="Ingresa el modelo"/>
        <br/><
</div>
        <div class="user-box">
        <input type="text" id="serie" name="serie" class="input" value="<?php echo $inventario['serie']; ?>" placeholder="Ingresa la serie"/>
        <br/><
</div>
        <div class="user-box">
        <input type="text" id="ubicacion" name="ubicacion" class="input" value="<?php echo $inventario['ubicacion']; ?>" placeholder="Ingresa la ubicacion"/>
        <br/><
</div>
        <div class="user-box">
        <input type="date" id="fechar" name="fechar" class="input" value="<?php echo $inventario['fecha_resguardo']; ?>" placeholder="Inicia por año completo, mes y día"/>
        <br/><
</div>
        <div class="user-box">
        <input type="text" id="bnl" name="bnl" class="input" value="<?php echo $inventario['bnl']; ?>" placeholder="¿Venia en el envio?"/>
        <br>
</div>
        <a onclick="NoFuncionaPQ()">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Modificar Inventario
      </a>
      </form>
    </div>
    <p class="derecha grande identar"><b><i>Umizumi inc.</i></b></p>
</body>
</html>