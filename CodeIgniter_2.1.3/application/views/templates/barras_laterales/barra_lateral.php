<!--	Barra lateral con las operaciones que puede realizar el usuario cuando se encuentra en el módulo "Alumnos"	-->
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
		$menu1 = "";
		$menu2 = "";
		$menu3 = "";
		$menu4 = "";
		$menu5 = "";
		$menu6 = "";
		$menu7 = "";


		//	En caso de que tal operación específica este seleccionada.
		//	La operación seleccionada tiene clase "active"
		if ($subVistaLateralAbierta == "InfoContacto") {
			$menu1 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "EnviarConsulta") {
			$menu2 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "verAlumnos") {
			$menu3 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "verSalas") {
			$menu4 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "agregarAlumnos") {
			$menu5 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "agregarSalas") {
			$menu6 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "editarAlumnos") {
			$menu7 = 'class="active"';
		}
	?>

	<!--	Barra lateral de alumnos	-->
	<div class="accordion" id="accordion2">
    	<div class="accordion-group">
		    <div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				Servicios</a>
		    </div>
		    <div id="collapseOne" class="accordion-body collapse in">
		    	<div class="accordion-inner nav nav-list">
						<li <?php echo $menu1; ?> ><a href="<?php echo site_url("Contacto/InfoContacto")?>">Asesoría en Contabilidad</a></li>
						<li <?php echo $menu2; ?> ><a href="<?php echo site_url("Contacto/EnviarConsulta")?>">Asesoría Laboral y Remuneraciones</a></li>
						<li <?php echo $menu3; ?> ><a href="<?php echo site_url("Alumnos/verAlumnos")?>">Asesoría Legal Administrativa</a></li>
						<li <?php echo $menu4; ?> ><a href="<?php echo site_url("Salas/verSalas")?>">Asesoría Tributaria</a></li>
						<li <?php echo $menu5; ?> ><a href="<?php echo site_url("Alumnos/agregarAlumnos")?>">Auditoria en Edificios y Condominios</a></li>
						<li <?php echo $menu6; ?> ><a href="<?php echo site_url("Salas/agregarSalas")?>">Auditoria para Apoyo al Control Interno</a></li>
						<li <?php echo $menu7; ?> ><a href="<?php echo site_url("Alumnos/editarAlumnos")?>">Capacitación</a></li>
		     		
		     	</div>
		    </div>
	  	</div>
	</div>
