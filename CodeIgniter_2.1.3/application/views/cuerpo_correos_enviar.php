<!--
<link rel="stylesheet" href="/<?php echo config_item('dir_alias') ?>/css/enviarCorreo.css" type="text/css" media="all" />
-->

<script type='text/javascript'>
var arrayRespuesta;
var arrayCarreras;
var myVar;
var codigoBorrador=-1;

/** 
* Esta función se llama al hacer click en el botón enviar, 
* por convención las funciones que utilizan document.getElementById()
* deben ser definidas en la misma vista en que son utilizados para evitar conflictos de nombres.
* Para ver como se configura esto se debe ver como es seteado el evento onsubmit() en el formulario.
* Esta función se encarga de evitar el envio de mails sin destinatario o sin asunto ni cuerpo de correo
* en caso de no contar con solo asunto o cuerpo decuerpo de correo pide confirmacion 
*/
function validacionSeleccion()
{

	var rutRecept = document.getElementById("rutRecept").value;
	
	if (rutRecept!="")
	{
		var texto = document.getElementById("editor").value;
		var asunto = document.getElementById("asunto").value;

		 if (asunto=="")
		{
			if (confirm("¿Desea enviar este correo sin indicar asunto?")){
				clearInterval(myVar);
				return true;
			}
				
			else 
				return false;
		}
		clearInterval(myVar);
		return true;
	}
	else
	{
        return false;
	}
	return false;
}
</script>

<script type='text/javascript'>


/**
*Esta función carga la informacion del borrador seleccionado para ser enviado
*/

function cargarBorrador(codigo){

	codigoBorrador=codigo;

		
		$.ajax({
			type: "POST",
			url: "<?php echo site_url("Correo/postCargarBorrador") ?>",
			
			data: {codigo:codigo},
			success: function(respuesta){
				borrador = JSON.parse(respuesta);
				$('#cuadroDestinatario').css({display:'none'});
				$('#cuadroEnviar').css({display:'none'});
				$('#cuadroEnvio').css({display:'block'}); 
				document.getElementById("asunto").value=borrador[0][0].asunto;
				CKEDITOR.instances.editor.setData(""+borrador[0][0].cuerpo_email);
				var rutRecept=[];

				for(var i=0;i<borrador[1].length;i++){
					rutRecept.push(borrador[1][i].rutRecept);
				}
				
				document.getElementById("rutRecept").value=rutRecept;
				document.getElementById("codigoBorrador").value=codigoBorrador;
				var correoRecept=[];

				for(var i=0;i<borrador[2].length;i++){
					correoRecept.push(borrador[2][i].correo);
				}
				var to="";
				to=correoRecept.join(", ");
				document.getElementById("to").value=to;

				myVar=setInterval(function(){timerBorradores()},20*1000);
				timerBorradores();
				var iconoCargado = document.getElementById("icono_cargando");
						$(icono_cargando).hide();
			}
		});
		/* Muestro el div que indica que se está cargando... */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).show();
}

/** 
* Esta función guarda un borrador cada 20 seg.
*/

function timerBorradores()
{
	var d=new Date();
	var t=d.toLocaleTimeString();

	
	editor=CKEDITOR.instances.editor.getData();
	asunto=document.getElementById("asunto").value;
	to=document.getElementById("to").value;
	rutRecept= document.getElementById("rutRecept").value;
	
	$.ajax({
			type: "POST",
			url: "<?php echo site_url("Correo/postGuardarBorradores") ?>",
			
			data: {codigoBorrador:codigoBorrador,to:to,rutRecept:rutRecept,editor:editor,asunto:asunto},
			success: function(respuesta){
				codigoBorrador = JSON.parse(respuesta);
								
				document.getElementById("guardado").innerHTML="se ha guardado un borrador a las: "+t;
				var iconoCargado = document.getElementById("icono_cargando");
						$(icono_cargando).hide();
			}
		});
		/* Muestro el div que indica que se está cargando... */
				var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).show();

}

/** 
* Esta función muestra el segundo paso para mandar un correo
*/

function pasoUnoDos()
{
	$('#cuadroEnviar').css({display:'none'});
	$('#cuadroEnvio').css({display:'none'});
	$('#cuadroDestinatario').css({display:'block'});
	document.getElementById('filtroPorCarrera').disabled=true;
}

/** 
* Esta función devuelve al primer paso para mandar un correo
*/

</script>

<script type='text/javascript'>
function pasoDosUno()
{
	$('#cuadroDestinatario').css({display:'none'});
	$('#cuadroEnvio').css({display:'none'});
	$('#cuadroEnviar').css({display:'block'});
}
</script>

<script type='text/javascript'>

/** 
* Esta función muestra el tercer paso para mandar un correo
*/

function pasoDosTres()
{
	var rutRecept = [];
	var to = "";
	//var rutRecept = document.getElementById("rutRecept").value;
	for(var i =0;i < tbody2.getElementsByTagName('tr').length;i++){
		
		
		if(tbody2.getElementsByTagName('tr')[i].getElementsByTagName('input')[0].checked){
			rutRecept.push(tbody2.getElementsByTagName('tr')[i].getAttribute("rut"));
			if(to==""){
				to = tbody2.getElementsByTagName('tr')[i].getAttribute("correo");
			}else{
				to = to + ", " + tbody2.getElementsByTagName('tr')[i].getAttribute("correo");
			}
		}
	}

	if (rutRecept=="")
	{
		alert("Debe seleccionar un destinatario para continuar");
	}
	else
	{
		document.getElementById("to").value=to;
		document.getElementById("rutRecept").value=rutRecept;
		$('#cuadroDestinatario').css({display:'none'});
		$('#cuadroEnviar').css({display:'none'});
		$('#cuadroEnvio').css({display:'block'});
		myVar=setInterval(function(){timerBorradores()},20*1000);
		timerBorradores();
	}

					




}
</script>

<script type='text/javascript'>


/** 
* Esta función devuelve al segundo paso para mandar un correo
*/

function pasoTresDos()
{
	$('#cuadroEnvio').css({display:'none'});
	$('#cuadroEnviar').css({display:'none'});
	$('#cuadroDestinatario').css({display:'block'});
	clearInterval(myVar);
}
</script>

<script type='text/javascript'>

/**
* Esta función se llama al escribir en el filtro de busqueda, 
* Esta función elimina los resultados que no coincidan con el filtro de busqueda
*/

function selectAll(value){
	var tabla = document.getElementById('tabla');
	var tbody = tabla.childNodes[1];
	var flag;
	if(value.checked){
		flag=true;
	}else{
		flag=false;
	}
	for(var i = 0;i<tbody.childNodes.length;i++){
		if(document.getElementById(i).style.display!='none'){
			document.getElementById('check'+i).checked=flag;
		}
	}
}

function ordenarFiltro(filtroLista){
	var arreglo = new Array();
	var arregloOcultados = new Array();
	var receptor;
	var ocultar;
	var cont;
	var filtroListaSplit = filtroLista.split(" ");
	for(cont=0;cont < arrayRespuesta.length;cont++)
	{
		ocultar=document.getElementById(cont);
		for(contadorF = 0;contadorF < filtroListaSplit.length;contadorF++){
				if(0 > arrayRespuesta[cont].nombre1.toLowerCase ().indexOf(filtroListaSplit[contadorF].toLowerCase ())&
				0 > arrayRespuesta[cont].apellido1.toLowerCase ().indexOf(filtroListaSplit[contadorF].toLowerCase ())&
				0 > arrayRespuesta[cont].apellido2.toLowerCase ().indexOf(filtroListaSplit[contadorF].toLowerCase ()))
				{
					arregloOcultados[cont]='ocultado';
				}
		}
	}
	for (cont = 0; cont < arrayRespuesta.length; cont++) {
		ocultar=document.getElementById(cont);
		if(arregloOcultados[cont]=='ocultado'){
			ocultar.style.display='none';
		}else{
			ocultar.style.display='';
		}
	}
}
</script>

<script type="text/javascript">
/************************************************************************************************************

(C) www.dhtmlgoodies.com, November 2005

This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.   
    
Terms of use:
You are free to use this script as long as the copyright message is kept intact. However, you may not
redistribute, sell or repost it without our permission.

Thank you!
    
www.dhtmlgoodies.com
Alf Magne Kalleland

************************************************************************************************************/   
var arrayOfRolloverClasses = new Array();
var arrayOfClickClasses = new Array();
var activeRow = false;
var activeRowClickArray = new Array();

function seleccionar_todo(){ 	
	
    var checkboxes=document.getElementById('tbody1').getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(var i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=this.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
	   
} 

function seleccionar_segundo_check(source){ 	
	
    var checkboxes=document.getElementById('tbody2').getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(var i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
	   
} 
    

function muestraTabla(respuesta){
	var tablaResultados = document.getElementById('tabla');
					var nodoTexto;
					$(tablaResultados).empty();		
					arrayRespuesta = JSON.parse(respuesta);
					var thead = document.createElement('thead');
					thead.setAttribute("style","width:100%");
					var tbody = document.createElement('tbody');
					tbody.id="tbody1";
					var tr = document.createElement('tr');
					var th = document.createElement('th');
					var check = document.createElement('input');
					check.id='todos';
					check.type='checkbox';
					check.checked=false;					
					th.appendChild(check);
					thead.appendChild(th);
					th = document.createElement('th');
					nodoTexto =document.createTextNode('Nombre Completo');
					th.appendChild(nodoTexto);
					thead.appendChild(th);
					tablaResultados.appendChild(thead);
					tbody.setAttribute("style","width:100%");
					for (var i = 0; i < arrayRespuesta.length; i++) {
						tr = document.createElement('tr');
						td = document.createElement('td');
						check = document.createElement('input');
						check.type='checkbox';
						check.checked=false;
						check.id='todos';
						$('#todos').click(seleccionar_todo);
						td.appendChild(check);
						tr.appendChild(td);
						td = document.createElement('td');
						tr.setAttribute("id", i);
						tr.setAttribute("style","width:100%");
						nodoTexto = document.createTextNode(arrayRespuesta[i].nombre1 +" "+ arrayRespuesta[i].nombre2 +" "+ arrayRespuesta[i].apellido1 +" "+arrayRespuesta[i].apellido2);
						tr.setAttribute('rut',arrayRespuesta[i].rut);
						tr.setAttribute('correo',arrayRespuesta[i].correo);
						td.appendChild(nodoTexto);
						td.setAttribute("style","width:100%");
						tr.appendChild(td);
						tbody.appendChild(tr);
					}
					tablaResultados.appendChild(tbody);

					/* Quito el div que indica que se está cargando */
					var iconoCargado = document.getElementById("icono_cargando");
					$(icono_cargando).hide();
}

function showDestinatarios(value){
	var destinatario = value;
		//if (texto.trim() != "") {
			$.ajax({
				type: "POST", /* Indico que es una petición POST al servidor */
				url: "<?php echo site_url("Correo/postBusquedaTipoDestinatario") ?>", /* Se setea la url del controlador que responderá */
				data: { destinatario: destinatario}, /* Se codifican los datos que se enviarán al servidor usando el formato JSON */
				success: function(respuesta) { /* Esta es la función que se ejecuta cuando el resultado de la respuesta del servidor es satisfactorio */
					muestraTabla(respuesta);
					if(destinatario==1){
						showCarreras();
						showProfesores();
						showSecciones();
						showHorarios();
						showModulosTematicos();
						document.getElementById('filtroPorBloqueHorario').disabled=false;
						document.getElementById('filtroPorModuloTematico').disabled=false;
						document.getElementById('filtroPorCarrera').disabled=false;
						document.getElementById('filtroPorProfesorEncargado').disabled=false;
						document.getElementById('filtroPorSeccion').disabled=false;
					}else if(destinatario ==2){
						showSecciones();
						showHorarios();
						showModulosTematicos();
						document.getElementById('filtroPorModuloTematico').selectedIndex=0;
						document.getElementById('filtroPorModuloTematico').disabled=false;
						document.getElementById('filtroPorBloqueHorario').selectedIndex=0;
						document.getElementById('filtroPorBloqueHorario').disabled=false;
						document.getElementById('filtroPorProfesorEncargado').selectedIndex=0;
						document.getElementById('filtroPorProfesorEncargado').disabled=true;
						document.getElementById('filtroPorCarrera').selectedIndex=0;
						document.getElementById('filtroPorCarrera').disabled=true;
						document.getElementById('filtroPorSeccion').disabled=false;
					}else if(destinatario==3){
						showProfesores();
						showSecciones();
						showHorarios();
						showModulosTematicos();
						document.getElementById('filtroPorBloqueHorario').disabled=false;
						document.getElementById('filtroPorModuloTematico').disabled=false;
						document.getElementById('filtroPorProfesorEncargado').disabled=false;
						document.getElementById('filtroPorSeccion').disabled=false;
					}
					else{
						document.getElementById('filtroPorModuloTematico').selectedIndex=0;
						document.getElementById('filtroPorModuloTematico').disabled=true;
						document.getElementById('filtroPorBloqueHorario').selectedIndex=0;
						document.getElementById('filtroPorBloqueHorario').disabled=true;
						document.getElementById('filtroPorProfesorEncargado').selectedIndex=0;
						document.getElementById('filtroPorProfesorEncargado').disabled=true;
						document.getElementById('filtroPorCarrera').selectedIndex=0;
						document.getElementById('filtroPorCarrera').disabled=true;
						document.getElementById('filtroPorSeccion').selectedIndex=0;
						document.getElementById('filtroPorSeccion').disabled=true;
					}
					}
			});

			/* Muestro el div que indica que se está cargando... */
			var iconoCargado = document.getElementById("icono_cargando");
			$(icono_cargando).show();
		//}
}

function showCarreras(){
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("Correo/postCarreras") ?>",
		data:{},
		success: function(respuesta){
			var filtroCarrera = document.getElementById("filtroPorCarrera");
			arrayCarreras = JSON.parse(respuesta);
			filtroCarrera.selectedIndex=0;
			$('#filtroPorCarrera').empty();
			filtroCarrera.add(new Option("Todos",""));
			for(var i=0;i<arrayCarreras.length;i++){
				filtroCarrera.add(new Option(arrayCarreras[i].carrera,arrayCarreras[i].codigo));
			}
			var iconoCargado = document.getElementById("icono_cargando");
					$(icono_cargando).hide();
		}
	});
	/* Muestro el div que indica que se está cargando... */
			var iconoCargado = document.getElementById("icono_cargando");
			$(icono_cargando).show();
}

function showProfesores(){
	var destinatario = 2;
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("Correo/postBusquedaTipoDestinatario") ?>",
		data:{destinatario: destinatario},
		success: function(respuesta){
			var filtroProfesor = document.getElementById("filtroPorProfesorEncargado");
			arrayProfesores = JSON.parse(respuesta);
			filtroProfesor.selectedIndex=0;
			$('#filtroPorProfesorEncargado').empty();
			filtroProfesor.add(new Option("Todos",""));
			for (var i = 0; i < arrayProfesores.length; i++) {
				filtroProfesor.add(new Option(arrayProfesores[i].nombre1+" "+arrayProfesores[i].apellido2,arrayProfesores[i].rut));
			}
			var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
		}
	});
		/* Muestro el div que indica que se está cargando... */
			var iconoCargado = document.getElementById("icono_cargando");
			$(icono_cargando).show();
}

function showSecciones(){
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("Correo/postSecciones") ?>",
		data:{},
		success: function(respuesta){
			var filtroSeccion = document.getElementById("filtroPorSeccion");
			arraySecciones = JSON.parse(respuesta);
			filtroSeccion.selectedIndex=0;
			$('#filtroPorSeccion').empty();
			filtroSeccion.add(new Option("Todos",""));
			for (var i = 0; i < arraySecciones.length; i++) {
				filtroSeccion.add(new Option(arraySecciones[i].nombre,arraySecciones[i].codigo));
			}
			var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
		}
	});
		/* Muestro el div que indica que se está cargando... */
			var iconoCargado = document.getElementById("icono_cargando");
			$(icono_cargando).show();
}

function showHorarios(){
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("Correo/postHorarios") ?>",
		data:{},
		success: function(respuesta){
			var filtroHorario = document.getElementById("filtroPorBloqueHorario");
			arrayHorarios = JSON.parse(respuesta);
			filtroHorario.selectedIndex=0;
			$('#filtroPorBloqueHorario').empty();
			filtroHorario.add(new Option("Todos",""));
			for (var i = 0; i < arrayHorarios.length; i++) {
				filtroHorario.add(new Option(arrayHorarios[i].nombre,arrayHorarios[i].codigo));
			}
			var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
		}
	});
		/* Muestro el div que indica que se está cargando... */
			var iconoCargado = document.getElementById("icono_cargando");
			$(icono_cargando).show();
}

function showModulosTematicos(){
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("Correo/postModulosTematicos") ?>",
		data:{},
		success: function(respuesta){
			var filtroModuloTematico = document.getElementById("filtroPorModuloTematico");
			arrayModulosTematicos = JSON.parse(respuesta);
			filtroModuloTematico.selectedIndex=0;
			$('#filtroPorModuloTematico').empty();
			filtroModuloTematico.add(new Option("Todos",""));
			for (var i = 0; i < arrayModulosTematicos.length; i++) {
				filtroModuloTematico.add(new Option(arrayModulosTematicos[i].nombre,arrayModulosTematicos[i].codigo));
			}
			var iconoCargado = document.getElementById("icono_cargando");
				$(icono_cargando).hide();
		}
	});
		/* Muestro el div que indica que se está cargando... */
			var iconoCargado = document.getElementById("icono_cargando");
			$(icono_cargando).show();
}


function showDestinatarioByFiltro(){
	var destinatario = document.getElementById('filtroPorTipoDeDestinatario').value;
	var codigo = document.getElementById('filtroPorCarrera').value;
	var profesor = document.getElementById('filtroPorProfesorEncargado').value;
	var seccion = document.getElementById('filtroPorSeccion').value;
	var modulo_tematico = document.getElementById('filtroPorModuloTematico').value;
	var bloque = document.getElementById('filtroPorBloqueHorario').value;
	if(destinatario==1){
		if(codigo=="" && profesor=="" && seccion=="" && modulo_tematico=="" && bloque==""){
			showDestinatarios(1);
		}else{
			$.ajax({
				type: "POST",
				url: "<?php echo site_url("Correo/postAlumnosByFiltro") ?>",
				data:{ codigo: codigo, profesor: profesor, seccion: seccion, modulo_tematico: modulo_tematico, bloque: bloque},
				success: function(respuesta){
					muestraTabla(respuesta);
				}
				});
			}
	}else if(destinatario==2){
		if(seccion=="" && modulo_tematico=="" && bloque == ""){
			showDestinatarios(2);
		}else{
			$.ajax({
	 			type: "POST",
				url: "<?php echo site_url("Correo/postProfesoresByFiltro") ?>",
				data:{ seccion: seccion, modulo_tematico:modulo_tematico, bloque: bloque},
				success: function(respuesta){
					muestraTabla(respuesta);
				}
			});
		}
	}else{
		if(seccion=="" && modulo_tematico=="" && bloque == "" && profesor == ""){
			showDestinatarios(3);
		}else{
			$.ajax({
			type: "POST",
			url: "<?php echo site_url("Correo/postAyudantesByFiltro") ?>",
			data:{ profesor: profesor, seccion: seccion, modulo_tematico: modulo_tematico, bloque: bloque},
			success: function(respuesta){
				muestraTabla(respuesta);
			}
		});
		}
	}
}


$(document).ready(showDestinatarios(0));

function highlightTableRow()
{
	var tableObj = this.parentNode;
	if(tableObj.tagName!='TABLE')tableObj = tableObj.parentNode;

	if(this!=activeRow)
	{
		this.setAttribute('origCl',this.className);
		this.origCl = this.className;
	}
	this.className = arrayOfRolloverClasses[tableObj.id];
        
	activeRow = this;
}

function clickOnTableRow()
{
	var tableObj = this.parentNode;
	if(tableObj.tagName!='TABLE')tableObj = tableObj.parentNode;        
        
	if(activeRowClickArray[tableObj.id] && this!=activeRowClickArray[tableObj.id])
	{
		activeRowClickArray[tableObj.id].className='';
	}
	
	this.className = arrayOfClickClasses[tableObj.id];
	activeRowClickArray[tableObj.id] = this;            
}

function resetRowStyle()
{
	var tableObj = this.parentNode;
	if(tableObj.tagName!='TABLE')tableObj = tableObj.parentNode;

	if(activeRowClickArray[tableObj.id] && this==activeRowClickArray[tableObj.id])
	{
		this.className = arrayOfClickClasses[tableObj.id];
		return; 
	}
	
	var origCl = this.getAttribute('origCl');
	if(!origCl)origCl = this.origCl;
		this.className=origCl;
}

function addTableRolloverEffect(tableId,whichClass,whichClassOnClick)
{
	arrayOfRolloverClasses[tableId] = whichClass;
	arrayOfClickClasses[tableId] = whichClassOnClick;
        
	var tableObj = document.getElementById(tableId);
	var tBody = tableObj.getElementsByTagName('TBODY');
	if(tBody)
	{
		var rows = tBody[0].getElementsByTagName('TR');
	}
	else
	{
		var rows = tableObj.getElementsByTagName('TR');
	}
	
	for(var no=0;no<rows.length;no++)
	{
		rows[no].onmouseover = highlightTableRow;
		rows[no].onmouseout = resetRowStyle;
            
		if(whichClassOnClick)
		{
			rows[no].onclick = clickOnTableRow; 
		}
	}
}
function pasarContactos(){

 var tbody = document.getElementById('tbody1');
 var tbody2 = document.getElementById('tbody2');
 var cont = 0;
 var total=tbody.getElementsByTagName('tr').length;

	for (var x=0; x < total; x++) {		
		if (tbody.getElementsByTagName('tr')[x].getElementsByTagName('input')[0].checked) {
			if(revisarRut(tbody.getElementsByTagName('tr')[x].getAttribute("rut"))){	
				tbody2.appendChild(tbody.getElementsByTagName('tr')[x]);
				total--;
				x--;
			}
			else
				tbody.getElementsByTagName('tr')[x].getElementsByTagName('input')[0].checked=false;				
		}
	}
}

function revisarRut(rut){
	var tbody2 = document.getElementById('tbody2');
	for(var i=0; i < tbody2.getElementsByTagName('tr').length; i++){
		if(tbody2.getElementsByTagName('tr')[i].getAttribute("rut")== rut ){
			return false;	
		}
	}
	return true;	
}

</script>

<?php
if(isset($codigo))
{
	?>
	<script type="text/javascript">cargarBorrador(<?php echo $codigo; ?>)</script>
	<?php
	unset($codigo);
}

?>
<fieldset id="cuadroEnviar">
    <legend>&nbsp;Enviar correo&nbsp;</legend>
	<div class="inicio" title="Paso 1: Selección de plantilla">
	<div class="texto1">
	Paso 1: Seleccione una plantilla.
	</div>
	<div class="seleccion">
	<select id="tipoDePantilla" title="Nombre de la plantilla" name="Plantilla a usar">
	<option value="1">No utilizar plantilla</option>
	</select>
	</div>
	
	<pre class="prePlantilla">
	<div class="plantilla">
	Actualmente sólo es posible enviar correos sin el uso de plantillas.
	La selección de plantillas será implementada en las próximas entregas.
	</div>
	</pre>
	<div class="row-fluid">
		<ul class="page pull-right">
		<button class ="btn" type="button"  title="Avanzar a paso 2" onclick="pasoUnoDos()" >Siguiente <div class="btn_with_icon_solo">=</div></button>
	</ul>
	</div>
	</div>
</fieldset>
	

<fieldset id="cuadroDestinatario" style="display:none;">
	<legend>&nbsp;Enviar correo&nbsp;</legend>
	<div class="bloque" title="Paso 2: Seleccionar destinatario(s)">
		<h5>
			Paso 2: Seleccione destinatario.
		</h5>
	</div>
	<div id="filtrosSelect">
		<div class="row-fluid">
			 <div class="control-group span9">
				<label class="control-label" for="filtroLista">Ingrese el nombre de quien busca o parte de su nombre</label>
				<div class="controls">
					<input id="filtroLista" name="filtroLista" style="font-size:9pt;font-weight:bold;" onkeyup="ordenarFiltro(this.value)" type="text" placeholder="Filtro búsqueda">
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="control-group span4">
				<label class="control-label" for="filtroPorTipoDeDestinatario">Filtrar por tipo destinatario</label>
				<div class="controls">
					<select class="filtro-primario" id="filtroPorTipoDeDestinatario" title="Tipo de destinatario"  onChange="showDestinatarios(this.value)">
						<option  value="0">Todos</option>
						<option  value="1">Alumnos</option>
						<option  value="2">Profesores</option>
						<option value="3">Ayudantes</option>
						<option value="4">Coordinadores</option>
					</select>
				</div>
			</div>


			<div class="control-group span4">
				<label class="control-label" for="filtroPorProfesorEncargado">Filtrar por profesor encargado</label>
				<div class="controls">
					<!-- Este debe ser cargado dinámicamente por php -->
					<select id="filtroPorProfesorEncargado" title="Tipo de destinatario" class="filtro-primario" onChange="showDestinatarioByFiltro()">
						<option  value="0">Todos</option>
						<option  value="1">profe1</option>
						<option  value="2">profe2</option>
						<option value="3">profe3</option>
						<option value="4">profe4</option>
					</select>
				</div>
			</div>

			<div class="control-group span4">
				<label class="control-label" for="filtroPorCarrera" >Filtrar por carrera</label>
				<div class="controls">
					<!-- Este debe ser cargado dinámicamente por php -->
					<select id="filtroPorCarrera" title="Tipo de destinatario" class="filtro-secundario" onChange="showDestinatarioByFiltro()">
						<option  value="">Todos</option>
						<!--<option  value="1">Ing civil informática</option>
						<option  value="2">Ing civil en minas</option>
						<option value="3">Ing civil elétrica</option>
						<option value="4">Ing  industrial</option> -->
					</select>
				</div>
			</div>
		</div>

		<div class="row-fluid">
			<div class="control-group span4">
				<label class="control-label" for="filtroPorModuloTematico">Filtrar por módulo temático</label>
				<div class="controls">
					<!-- Este debe ser cargado dinámicamente por php -->
					<select id="filtroPorModuloTematico" title="Tipo de destinatario" class="filtro-secundario" onChange="showDestinatarioByFiltro()">
						<option  value="0">Todos</option>
						<option  value="1">Unidad 1</option>
						<option  value="2">Unidad 2</option>
						<option value="3">Unidad 3</option>
						<option value="4">Unidad 4</option>
						<option value="5">Unidad 5</option>
					</select>
				</div>
			</div>

			<div class="control-group span4">
				<label class="control-label" for="filtroPorSeccion">Filtrar por sección</label>
				<div class="controls">
					<!-- Este debe ser cargado dinámicamente por php -->
					<select id="filtroPorSeccion" title="Tipo de destinatario" class="filtro-secundario" onChange="showDestinatarioByFiltro()">
						<option  value="0">Todas</option>
						<option  value="a1">A-01</option>
						<option  value="b2">B-02</option>
						<option value="c3">C-03</option>
						<option value="d4">D-04</option>
						<option value="e5">E-05</option>
					</select>
				</div>
			</div>

			<div class="control-group span4">
				<label class="control-label" for="filtroPorBloqueHorario">Filtrar por bloque horario</label>
				<div class="controls">
					<!-- Este debe ser cargado dinámicamente por php -->
					<select id="filtroPorBloqueHorario" title="Tipo de destinatario" class="filtro-secundario" onChange="showDestinatarioByFiltro()">
						<option  value="0">Todos</option>
						<option  value="1">Unidad 1</option>
						<option  value="2">Unidad 2</option>
						<option value="3">Unidad 3</option>
						<option value="4">Unidad 4</option>
						<option value="5">Unidad 5</option>
					</select>
				</div>
			</div>
		</div>
	</div>


	<!-- Este es el listado de resultados del filtro -->
	<div id="listasDeDestinatarios" class="row-fluid">
		<div id="listaResultadosFiltro" class="span5">
			<table id="tabla" name="tabla" class="table table-hover table-bordered" style="width:100%; display:block; height:331px; cursor:pointer;overflow-y:scroll;margin-bottom:0px">
				<thead>
					<tr>
						<th >
							<input type="checkbox" id="seleccionarTodosDelFiltro">
						</th>
						<th>
							Resultados del filtro
						</th>
					</tr>
				</thead>


				<tbody>
					<form id="formDetalle" type="post">
					<tr>
						<td >
							<input type="checkbox" id="seleccionarTodosDelFiltro">
						</td>
						<td>
							Juan Perez Torres
						</td>
					</tr>
					</form>
				</tbody>
			</table>
		</div>
<script>
//addTableRolloverEffect('tabla','tableRollOverEffect1','tableRowClickEffect1');
</script>
		<!-- Este es el botón que está entremedio de los dos listados -->
		<div class="span2 text-center">
			<div class="btn" type="button" onclick="pasarContactos()">Agregar</div>
		</div>

		<!-- Este es el listado de destinatarios seleccionados para el envío -->
		<div id="listaDestinatarios" class="span5">
			<table id="tabla2" class="table table-hover table-bordered" style=" width:100%; display:block; height:331px; cursor:pointer;overflow-y:scroll;margin-bottom:0px">
				<thead>
					<tr>
						<th>
							<input type="checkbox" id="seleccionarTodosDelFiltro" onClick="seleccionar_segundo_check(this)" checked="true">

						</th>
						<th >
							Destinatarios seleccionados

						</th>
					</tr>
				</thead>
				<tbody id="tbody2">
					


				</tbody>
			</table>
		</div>
	</div>

	<!-- Botones atrás y siguiente -->
	<div class="row-fluid">
		<ul class="pager pull-right">
			
			<li>
			<?php
					$attributes = array('onSubmit' => 'return validar(this)', 'id'=>'form_contactos','style'=>'margin-left:-300px;');
					echo form_open('Grupo/agregarGrupo',$attributes);
				?>
				<input type="text" name="NOMBRE_FILTRO_CONTACTO" placeholder="Nombre Grupo Contactos" style="margin-top:10px;">
				<input type="hidden" name="QUERY_FILTRO_CONTACTO">
				<button class ="btn" type="submit" title="Guardar Grupo de Contactos para reutilizarlos en un futuro" >Guardar Grupo</button>
				<?php echo form_close(""); ?>
			</li>
			<li>
				<div class ="btn" type="button" title="Volver a paso 1" onclick="pasoDosUno()" ><div class="btn_with_icon_solo"><</div> Anterior</div>
			</li>
			<li>
				<div class ="btn" type="button" title="Avanzar a paso 2" onclick="pasoDosTres()" >Siguiente <div class="btn_with_icon_solo">=</div></div>
			</li>
		</ul>
	</div>
</fieldset>






<fieldset id="cuadroEnvio" style="display:none;">
	<legend>&nbsp;Enviar correo&nbsp;</legend>

	<?php 
		$attributes = array('onSubmit'=>'return validacionSeleccion();', 'id'=>'formEnviar');
		echo form_open('Correo/enviarPost',$attributes);
	?>
	<div title="Paso 3: Escribir correo">
		<div class="span12">
			Paso 3: Escriba el correo
		</div>
		<div class="row-fluid">
			<div class="span12" > 
				<p id="guardado"></p>
				Para: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="to" name="to" type="text" value="<?php set_value('to'); ?>" readonly><br>
				Asunto: &nbsp;<input id="asunto" name="asunto" type="text" value="<?php set_value('asunto'); ?>">
				<button type="button" class ="btn"  onclick="timerBorradores()" style="  float:right; " >Guardar Borrador</button>
				
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 control-group">
				<?php 
				$data = array(
					'name'=>'editor',
					'id'=>'editor',
					'value'=>set_value('editor'),
					'class'=>'ckeditor',
				);
				?>
				<div id="ck">
					<?php
					echo form_textarea($data);
					?>
				</div>

				<input type="hidden" name="rutRecept" id="rutRecept" value="<?php set_value('rutRecept');?>"/>
				<input type="hidden" name="codigoBorrador" id="codigoBorrador" value="<?php set_value('codigoBorrador');?>"/>

			</div>
		</div>
		<div class="row-fluid">
			<div class="pager pull-right control-group">
				<button type="submit" title="Enviar correo" class="btn btn-primary" style="float:right" >Enviar  <div class="btn_with_icon_solo">M</div></button>
				<button class="btn" type="button" title="Volver a paso 2" onclick="pasoTresDos()" style="float:right; margin-right:3px" ><div class="btn_with_icon_solo"><</div> Anterior</button>
				
			</div>
		</div>
	</div>
	<?php echo form_close(""); ?>
</fieldset>
	
<script type="text/javascript">


function validar(form){
	event.preventDefault();
	var answer = confirm("¿Está seguro que desea agregar este Grupo de Contactos?");
	if (answer){
		var string = "";
		var total=tbody2.getElementsByTagName('tr').length;
		var help = 0;
		for (var x=0; x < total; x++) {		
			if (tbody2.getElementsByTagName('tr')[x].getElementsByTagName('input')[0].checked) {
				if(help== 0){
				string=tbody2.getElementsByTagName('tr')[x].getAttribute("rut");
				help = 1;
				}
				else{
				string=string+","+tbody2.getElementsByTagName('tr')[x].getAttribute("rut");
				}			
			}
		}	
		if(!string.length){
			alert('Debe seleccionar un contacto de la tabla Destinatario')
		}
		else{
			if($('input[name=NOMBRE_FILTRO_CONTACTO]').val().length == 0 ){
				alert("Debe seleccionar un nombre para el grupo de contactos");
			}
			else{
				$('input[name=QUERY_FILTRO_CONTACTO]').val(string);
		// Enviamos el formulario usando AJAX
				$.ajax({
				type: 'POST',
				url: "<?php echo site_url("Grupo/agregarGrupo") ?>",
				data: $('#form_contactos').serialize(),	
				// Mostramos un mensaje con la respuesta de PHP
				success: function(data){				
				}
				})	
				alert('¡Grupo de Contactos exitosamente agregado!');
			
			}
		}	
		return false;		
	}
	else{
			
	}
	
}

</script>