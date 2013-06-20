<script type="text/javascript">
	
	if("<?php echo $mensaje_confirmacion;?>"!="2"){
		if("<?php echo $mensaje_confirmacion;?>"!="-1" && "<?php echo $mensaje_confirmacion;?>"!="3"){
				alert("Sala agregada correctamente");
			
		}
		else{
			if("<?php echo $mensaje_confirmacion;?>"=="-1"){
				alert("Error al agregar la sala");
			}		
			else{
				if("<?php echo $mensaje_confirmacion;?>"=="3"){
				alert("Una sala con el mismo nombre ya se ha ingresado");
				}
			}
		}
	}
</script>
<div class="row-fluid" style="margin-left: 0px">
	<fieldset style="margin-right:200px;" >	<legend><h4>Información de Contacto</h4></legend>
		<div class= "contact h3 ">
		<label>
		Teléfono&nbsp&nbsp&nbsp:25470089<br>   
		Celular&nbsp&nbsp&nbsp&nbsp&nbsp :90952993<br>   
		Dirección&nbsp&nbsp  :Melania 10030, El Bosque.</label>	</div>
		<a href="http://www.mapcity.cl/#t=1:a=CALLE_MELANIA__10030.EL_BOSQUE">
		<img src="/<?php echo config_item('dir_alias')  ?>/img/logo_usach.png" alt="mapa" title="Para mayor información haga click en el mapa" width="65%" height="60%">
		</a>
		</fieldset>
</div>










