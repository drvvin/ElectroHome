
<?php
/**
*Comando para manejar el id de usuario atraves de las sessiones, en caso de que un usuario ingrese a una ventana sin permisos directos.
*/
session_start();
error_reporting(0);
$id_usuario = $_SESSION['id_usuario'];
$varsesion = $_SESSION['usuario'];
$nrosol = $_POST['nrosol'];
/**
*Sentencia if para confirmar que el usuario tenga permisos de autorizacion.
*/
if ($varsesion==null || $varsesion = '') {
	echo "No posee autorizacion para ingresar";
	die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--Link para habilitar las interfaz con celulares-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Redirrecion a comandos de diseño de bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!--Redirrecion a comandos jquery de fullcalendar-->
	<script src='FullCalendar/js/jquery.min.js'></script>
	<script src='FullCalendar/js/moment.min.js'></script>
	<!--Redirrecion a comandos de diseño de bootstrap-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!--Redirrecion a comandos css para modificar el estilo de la pagina-->
	<link rel="stylesheet" type="text/css" href="FullCalendar/css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="EstiloalternativoAHA.css">
	<!--Redirrecion a comandos de fullcalendar para hacer el calendario funcional-->
	<script src='FullCalendar/js/fullcalendar.min.js'></script>
	<!--Link para cambiar el idio del calendario-->
	<script src='FullCalendar/js/es.js'></script>
	<!--Funcion SCRIP para cambiar el idio del calendario-->
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				lenguage: 'es',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			});
		});
	</script>
</head>
<body>
	<!--Titulo del calendario en el contenido de la pagina-->
	<div class="tittle">
		<center><h1>Calendario WEB</h1></center>
	</div>
	<div class="container">
		<div class="contenido">
			<div class="contenidoMiCuenta">
				<!--Posicion y contruccion del formulario con boostrap-->
				<div class="row">
					<div class="col"></div>
					<!--Id del calendario (calendarioWEB) aqui se ingresa toda la informacion que se realiza dentro de esta pestaña de compando-->
					<div class="col-7"><div id="calendarioWEB"></div></div>
					<div class="col"></div>
				</div>
				<!--Boton volver a ver las solicitudes de los clientes-->
				<form action="/Evaluacion2_NM_DA_JC/Administrador/Estructura_Administrador_VerSolicitudes.php">
					<div class="botonMiCuenta">
						<center><br><br><input type="submit" value="Volver"></center>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!--Funcion SCRIP para hacer funcionar gran parte de la construccion del calendario en esta se realizaran las querys respectivas para mostrar las dfechas y titulos de una fecha agendada para un cliente-->
	<script>
		$(document).ready(function(){
			$('#calendarioWEB').fullCalendar({
				header:{
					left:'',
					center:'title',
				},
				customButtons:{
					Miboton:{
						text:"Boton 1",
						click:function(){
							alert("accion del boton");
						}
					}
				},
				dayClick:function(date,jsEvent,view){
					$('#txtFecha').val(date.format());
					$("#ModalEventos").modal();
				},

				//Redireccion a eventos2 para mostrar las fechas disponibles.
				events:'http://localhost/Evaluacion2_NM_DA_JC/Administrador/FullCalendar/eventos2.php',
	
				//cuando el usuario presione en un evente este llamara con el metodo val a la base de datos para rescatar la informacion de un evento con un auto relleno  y los pondra dentro del formulario atraves de sus respectivos ID.
				eventClick:function(calEvent,jsEvent,view){
					//Titulos de los eventos.
					$('#tituloEvento').html(calEvent.title);
					$('#descripcionEvento').html(calEvent.descripcion);
					//Mostrar la informacion del evento en los id, destacar que dentro comando val se ingresa el nombre el cual tiene este dato en la base de datos.
					$("#txtID").val(calEvent.NRO_SOL);
					$("#txtTitulo").val(calEvent.title);
					$("#txtDescripcion").val(calEvent.descripcion);
					$("#txtColor").val(calEvent.color);
					$("#txtFecha").val(calEvent.start);
					$("#txtnrosol").val(calEvent.NRO_SOL);
					//ID del div donde se mostraran los datos.
					$("#ModalEventos").modal();
				},
			});
		});
	</script>

	<!-- Modal(Agregar,Modificar;Eliminar) destacar que dentro de este div se encuentra el id con el cual se rellenara este formulario atraves de los SCRIP-->
	<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!--Titulo de hora reservada en el formulario creado con bootstrap-->
					<h5 class="modal-title" id="tituloEvento">Hora reservada</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!--Contenido del div-->
				<div class="modal-body">
					<div id="descripcionEvento"></div>
					<!--txt y txtfecha en hidden para rescatar la informacion pero no mostrarla al usuario-->
					<input type="hidden" id="txtID" name="txtID">
					<input type="hidden" id="txtFecha" name="txtFecha">
					<!--Campo de titulo del evento (Hora Extra Agendada)-->
					<div class="form-row">
						<div class="form-group col-md-8">
							<label>Titulo:</label>
							<input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
						</div>
					</div>
					<!--Campo de descripcion(aqui se ingresa la informacion del domicilio que se le otorgara una hora extra)-->
					<div class="form-group">
						<label>Descripcion:</label>
						<textarea id="txtDescripcion" class="form-control" rows="3"></textarea>
					</div>
					<!--Rescate del nro de solicitud para hacer la agregacion y eliminacion de este esta es rescatada desde la tabla de ver solicitudes-->
					<div class="form-group col-md-8">
						<?php 
						echo "<textarea id='txtnrosol' class='form-control' hidden>".$nrosol."</textarea>"
						?>
					</div>
					<!--Color del evento que queremos agregar, en la query construida el color negro esta por defecto pero tambien se puede sacar este comentario para hacer la selecion de colores al momento de agregar un evento-->
					<div class="form-group">	
						<input type="hidden" value="#ff0000" id="txtColor" class="form-control" style="height:36px">
					</div>
				</div>
				<!--Botones para agregar, elimnar y cancelar el boton modificar aun esta en construccion-->
				<div class="modal-footer">
					<button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
					<!--<button type="button" id="btnModificar"class="btn btn-success">Modificar</button>-->
					<button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>




	<script>
        //Variable para guardar nuevos eventos.
        var NuevoEvento;
        //Si se preciona la id de btnAgregar se rescataran los campos con la funcion RecolectarDatosGUI() y se enviaran a la funcion EnviarInformacion con un texto elimanar para recibirlos en eventos y saber que va con la accion de eliminar un evento.
        $('#btnAgregar').click(function(){
        	RecolectarDatosGUI();
        	EnviarInformacion('agregar',NuevoEvento);
        });
        //Si se preciona la id de btnEliminar se rescataran los campos con la funcion RecolectarDatosGUI() y se enviaran a la funcion EnviarInformacion con un texto elimanar para recibirlos en eventos y saber que va con la accion de eliminar un evento.
        $('#btnEliminar').click(function(){
        	RecolectarDatosGUI();
        	EnviarInformacion('eliminar',NuevoEvento);
        });
        //$('#btnModificar').click(function(){
        	//RecolectarDatosGUI();
        	//EnviarInformacion('modificar',NuevoEvento);
        //});

        //Funcion para recolectar la informacion ingresada en el fomrulario del calendario.
        function RecolectarDatosGUI(){
        	NuevoEvento= {
        		id:$('#txtID').val(),
        		title:$('#txtTitulo').val(),
        		descripcion:$('#txtDescripcion').val(),
        		color:$('#txtColor').val(),
        		textColor:"#FFFFFF",
        		start:$('#txtFecha').val(),
        		nrosol:$('#txtnrosol').val(),
        	};
        }

        //Funcion para enviar la informacion y la accion a eventos.php ademas de actualizar la informacion una ves agregado o eliminado un evento.
        function EnviarInformacion(accion,objEvento){
        	$.ajax({
        		type:'POST',
        		url:'Fullcalendar/eventos.php?accion='+accion,
        		data:objEvento,
        		success:function(msg,msg2){
        			if (msg,msg2) {
        				$('#calendarioWEB').fullCalendar('refetchEvents');
        				$("#ModalEventos").modal('toggle');
        			}
        		},
        		error:function(){
        			$('#calendarioWEB').fullCalendar('refetchEvents');
        			$("#ModalEventos").modal('toggle');
        		}
        	});
        }
    </script>
</div>
</body>
</html>