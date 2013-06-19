<!--	Barra lateral con las operaciones que puede realizar el usuario cuando se encuentra en el módulo "Salas"	-->
	<?php
		/**
		*	Determinar qué grupo se encuentra abierto en caso de tenerlos.
		*	Determinar qué operación está seleccionada
		*/

		//	Si la variable no se ha seteado, se asume operación principal.
		if (!isset($subVistaLateralAbierta)) {
			$subVistaLateralAbierta = "InfoContacto";
		}

		// Las operaciones por defecto no poseen clases
		$InfoContacto = "";
		$EnviarConsulta = "";

		//	En caso de que tal operación específica este seleccionada.
		//	La operación seleccionada tiene clase "active"
		if ($subVistaLateralAbierta == "InfoContacto") {
			$InfoContacto = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "EnviarConsulta") {
			$EnviarConsulta = 'class="active"';
		}
		
	?>

	<!--	Barra lateral de salas	-->
	<div class="accordion" id="accordion2">
    	<div class="accordion-group">
		    <div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" >
				Contacto</a>
		    </div>
		    <div id="collapseOne" class="accordion-body collapse in">
		    	<div class="accordion-inner navl">
		        	<li <?php echo $InfoContacto; ?> ><a href="<?php echo site_url("Contacto/InfoContacto")?>">Información de Contacto</a></li>
					<li <?php echo $EnviarConsulta; ?> ><a href="<?php echo site_url("Contacto/EnviarConsulta")?>">Envíar Consulta</a></li>
		     	</div>
		    </div>
	  	</div>
	</div>