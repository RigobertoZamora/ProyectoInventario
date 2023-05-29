//Función para validar el préstamo
function validar()
{
	var bandera = 1;
	var ncuenta = document.getElementById('ncuenta').value;
	var ncompleto = document.getElementById('ncompleto').value;
	var grapo = document.getElementById('grapo').value;
	//var fecha = document.getElementById('fecha').value;
	//var hora = document.getElementById('hora').value;
	var laptop = document.getElementById('equipo');
	var vga = document.getElementById('equipo1');
	var bocina = document.getElementById('equipo2');
	var adaptador = document.getElementById('equipo3');
	var extension = document.getElementById('equipo4');
	var select = document.getElementById("opciones").value;
	var select1 = document.getElementById("opciones1").value;
	var select2 = document.getElementById("opciones2").value;
	var select3 = document.getElementById("opciones3").value;
	var select4 = document.getElementById("opciones4").value;

	if(ncuenta.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar la cuenta en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}

	if(ncompleto.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el nombre en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}

	if(grapo == "Seleccione su grado y grupo")
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'Debes seleccionar tu grado y grupo!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}

	//Tremendo if anidado me aventé
	if (laptop.checked) {
		if(select != "Seleccione el N° de Inventario")
		  {
					
		  }else{
		  	Swal.fire({
			icon: 'error',
			title: 'Alerta',
			text: 'Selecciona el numero de Inventario o desmarca el equipo!',
			showConfirmButton: false,
			timer: 3000
			})
			bandera = 2;
		  }

	}else{
		if (vga.checked) {
			if(select1 != "Seleccione el N° de Inventario")
			  {
						
			  }else{
			  	Swal.fire({
				icon: 'error',
				title: 'Alerta',
				text: 'Selecciona el numero de Inventario o desmarca el equipo!',
				showConfirmButton: false,
				timer: 3000
				})
				bandera = 2;
			  }
		}else{
			if (bocina.checked) {
				if(select2 != "Seleccione el N° de Inventario")
				  {
							
				  }else{
				  	Swal.fire({
					icon: 'error',
					title: 'Alerta',
					text: 'Selecciona el numero de Inventario o desmarca el equipo!',
					showConfirmButton: false,
					timer: 3000
					})
					bandera = 2;
				  }
			}else{
				if (adaptador.checked) {
					if(select3 != "Seleccione el N° de Inventario")
					  {
								
					  }else{
					  	Swal.fire({
						icon: 'error',
						title: 'Alerta',
						text: 'Selecciona el numero de Inventario o desmarca el equipo!',
						showConfirmButton: false,
						timer: 3000
						})
						bandera = 2;
					  }
				}else{
					if (extension.checked) {
						if(select4 != "Seleccione el N° de Inventario")
						  {
									
						  }else{
						  	Swal.fire({
							icon: 'error',
							title: 'Alerta',
							text: 'Selecciona el numero de Inventario o desmarca el equipo!',
							showConfirmButton: false,
							timer: 3000
							})
							bandera = 2;
						  }
					}else{
							Swal.fire({
							icon: 'error',
							title: 'Alerta',
							text: 'No puedes seguir sin haber seleccionado ningun equipo',
							showConfirmButton: false,
							timer: 3000
							})		
							bandera = 2;
					}
				}
			}
		}
	}

	//Hago validacion para saber si mi formulario esta bien llenado
	if(bandera == 1)
	{
		Swal.fire({
		  title: '¿Deseas continuar?',
		  text: "Verifica que tus datos sean correctos, una vez hecho el registro no podrás modificarlos",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si'
		}).then((result) => {
		  if (result.isConfirmed) {
		    document.formulario.submit();
		  }
		})
	}
}

//Función para validar el login
function validarUsuario()
{
	var correo = document.getElementById('correo').value;
	var password = document.getElementById('password').value;
	if(correo == "")
	{
		Swal.fire({
			icon: 'error',
			title: 'Alerta',
			text: 'Usuario o password no validos!',
			showConfirmButton: false,
			timer: 3000
			})
			bandera = 2;
		}else
		{
			bandera = 1;
		}


	if(password == "")
	{
		Swal.fire({
			icon: 'error',
			title: 'Alerta',
			text: 'Usuario o password no validos!',
			showConfirmButton: false,
			timer: 3000
			})
			bandera = 2;
		}else
		{
			bandera = 1;
		}

	if(bandera == 1)
	{
		document.formulario.submit();
	}	
}

//Función para validar nuevo administrador
function validarNA()
{
	var ncompletona = document.getElementById('ncompletona').value;
	var correona = document.getElementById('correona').value;
	var passwordna = document.getElementById('passwordna').value;
	//var verificar = document.getElementById('verificacion').value;
	var recopila = "";
	var bandera = 1;
	//alert(correona);

	if(ncompletona.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el nombre en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}

	if(passwordna.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el password vacio',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}else{
		if(passwordna.length == 16)
		{
			Swal.fire({
			icon: 'error',
			title: 'Alerta',
			text: 'El password no debe de tener mas de 15 caracteres',
			showConfirmButton: false,
			timer: 3000
			})
			bandera = 2;
		}
	}

	//Verificamos que el correo introducido sea real, sea ucol y si el correo excede el almacenamiento en la bdd:
	if(correona.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el correo vacio!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}else{
		var posicion = 0;
		var posicion = correona.lastIndexOf("@");
		//alert(posicion); ¿por qué "-1"? porque lastIndexOf cuando no encuentra nada arroja "-1" y no "0" ayuda me quiero dormir
		if(posicion != -1)
		{
			if(posicion == 13)
			{
				Swal.fire({
				icon: 'error',
				title: 'Alerta',
				text: 'El correo es demasiado largo!',
				showConfirmButton: false,
				timer: 3000
				})
				bandera = 2;
			}
			recopila = correona.substring(posicion);
			//alert(recopila);
			if(recopila.toLowerCase() !== "@ucol.mx")
			{
				Swal.fire({
				icon: 'error',
				title: 'Alerta',
				text: 'El correo NO es UCOL!',
				showConfirmButton: false,
				timer: 3000
				})
				bandera = 2;
			}
		}else{
			Swal.fire({
			icon: 'error',
			title: 'Alerta',
			text: 'Introduce un correo UCOL!',
			showConfirmButton: false,
			timer: 3000
			})
			bandera = 2;

		}
	}

	if(bandera == 1)
	{
		Swal.fire({
		  title: '¿Deseas continuar?',
		  text: "Verifica que tus datos sean correctos",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si'
		}).then((result) => {
		  if (result.isConfirmed) {
		    document.formularioNA.submit();
		  }
		})
	}
}


//Función para validar el filtro de equipos
function validarEquipo()
{
	var equipo = document.getElementById('equipo').value;
	var bandera = 1;

	if(equipo == "Selecciona equipo")
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'Debes seleccionar un equipo!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}

	if(bandera == 1)
	{
		document.formularioEquipos.submit();
	}
}

//Función para validar nuevo inventario
function NoFuncionaPQ()
{
	var ninventario = document.getElementById('ninventario').value;
	var equipo = document.getElementById('equipo').value;
	var descripcion = document.getElementById('descripcion').value;
	var nfolio = document.getElementById('nfolio').value;
	/*var importe = document.getElementById('importe').value;*/
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var serie = document.getElementById('serie').value;
	var ubicacion = document.getElementById('ubicacion').value;
	var fechar = document.getElementById('fechar').value;
	/*var bnl = document.getElementById('bnl').value;*/
	var bandera = 1;
	
	
	if(ninventario.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el No. inventario en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}/*else
	{
		bandera = 1;
	}*/

	if(equipo == "Selecciona equipo")
	{
		Swal.fire({
			icon: 'error',
			title: 'Alerta de error',
			text: 'Debes seleccionar un equipo!',
			showConfirmButton: false,
			timer: 3000
		})
		bandera = 2;
	}


	if(descripcion.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar la descripcion en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}/*else
		{
			bandera = 1;
		}*/

	if(nfolio.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el No. folio en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}/*else
		{
			bandera = 1;
		}/*

	/*if(importe.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el importe en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}else
		{
			bandera = 1;
		}*/

	if(marca.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar la marca en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}/*else
		{
			bandera = 1;
		}*/

	if(modelo.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el modelo en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}/*else
		{
			bandera = 1;
		}*/

	if(serie.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar la serie en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}/*else
		{
			bandera = 1;
		}*/

	if(ubicacion.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar la ubicacion en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}/*else
		{
			bandera = 1;
		}*/

	if(fechar.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar la fecha de resguardo en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
		}/*else
		{
			bandera = 1;
		}*/

	/*if(bnl.length == 0)
	{
		Swal.fire({
		icon: 'error',
		title: 'Alerta',
		text: 'No puedes dejar el BNL en blanco!',
		showConfirmButton: false,
		timer: 3000
		})
		bandera = 2;
	}else
		{
			bandera = 1;
		}*/

	//Hago validacion para saber si mi formulario de nuevo inventario esta bien llenado
	if(bandera == 1)
	{
		Swal.fire({
			title: '¿Deseas continuar?',
			text: "Verifica que tus datos sean correctos, una vez hecho el registro no podrás modificarlos",
			icon: 'warning',
			showConfirmButton: true,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Si'
		}).then((result) =>{
			if(result.isConfirmed)
			{
				document.formularioNI.submit();
			}
		})
	}
}

//Funciones individuales para hacer aparecer los select que tienen un checkbox
function mostrarSelect() {
	var select = document.getElementById("opciones");
	if (document.getElementById("equipo").checked) {
	  select.style.display = "block";
	} else {
	  select.style.display = "none";
	}
  }

function mostrarSelect1() {
	var select = document.getElementById("opciones1");
	if (document.getElementById("equipo1").checked) {
	  select.style.display = "block";
	} else {
	  select.style.display = "none";
	}
  }

function mostrarSelect2() {
	var select = document.getElementById("opciones2");
	if (document.getElementById("equipo2").checked) {
	  select.style.display = "block";
	} else {
	  select.style.display = "none";
	}
  }
  
function mostrarSelect3() {
	var select = document.getElementById("opciones3");
	if (document.getElementById("equipo3").checked) {
	  select.style.display = "block";
	} else {
	  select.style.display = "none";
	}
  }

function mostrarSelect4() {
	var select = document.getElementById("opciones4");
	if (document.getElementById("equipo4").checked) {
	  select.style.display = "block";
	} else {
	  select.style.display = "none";
	}
  }

//Funcion para validar el usuario que está activo
function UsuarioActivo()
{
	var usuario = document.getElementById("usuario").value;

	alert(usuario);
}

function modificarAdmin()
{
	document.formulario.submit();
}