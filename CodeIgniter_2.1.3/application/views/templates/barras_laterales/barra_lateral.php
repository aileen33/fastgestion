<!--	Barra lateral con las operaciones que puede realizar el usuario cuando se encuentra en el módulo "Alumnos"	-->
	<?php
		/**
		*	Determinar qué grupo se encuentra abierto en caso de tenerlos.
		*	Determinar qué operación está seleccionada
		*/

		//	Si la variable no se ha seteado, se asume operación principal.
		if (!isset($subVistaLateralAbierta)) {
			$subVistaLateralAbierta = "menu1";
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
		if ($subVistaLateralAbierta == "menu1") {
			$menu1 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "menu2") {
			$menu2 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "menu3") {
			$menu3 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "menu4") {
			$menu4 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "menu5") {
			$menu5 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "menu6") {
			$menu6 = 'class="active"';
		}
		else if ($subVistaLateralAbierta == "menu7") {
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
						<li <?php echo $menu1; ?> ><a href="<?php echo site_url("Menu/menu1")?>">Asesoría en Contabilidad</a></li>
						<li <?php echo $menu2; ?> ><a href="<?php echo site_url("Menu/menu2")?>">Asesoría Laboral y Remuneraciones</a></li>
						<li <?php echo $menu3; ?> ><a href="<?php echo site_url("Menu/menu3")?>">Asesoría Legal Administrativa</a></li>
						<li <?php echo $menu4; ?> ><a href="<?php echo site_url("Menu/menu4")?>">Asesoría Tributaria</a></li>
						<li <?php echo $menu5; ?> ><a href="<?php echo site_url("Menu/menu5")?>">Auditoria en Edificios y Condominios</a></li>
						<li <?php echo $menu6; ?> ><a href="<?php echo site_url("Menu/menu6")?>">Auditoria para Apoyo al Control Interno</a></li>
						<li <?php echo $menu7; ?> ><a href="<?php echo site_url("Menu/menu7")?>">Capacitación</a></li>
		     		
		     	</div>
		    </div>
	  	</div>
			<br>
		<div class="accordion-group">
		    <div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
				Sitios de Interés</a>
		    </div>
			
		    <div id="collapseTwo" class="accordion-body collapse in">
				<div class="accordion-inner nav nav-list">
					<a href="http://home.sii.cl/"  target="_blank">
						<img src="/<?php echo config_item('dir_alias') ?>/img/logosii.png" height="150px" width="150px" alt="logo sii" title="Servicio de Impuestos Internos">
					</a>
					<br>
					<br>
					<a href="https://www.dt.gob.cl"  target="_blank">
						<img src="/<?php echo config_item('dir_alias') ?>/img/logodtgob.png"  height="150px" width="150px" alt="logo dtgob" title="Dirección del Trabajo">
					</a>
					<br>
					<br>
					<a href="http://www.svs.cl/‎‎"  target="_blank">
						<img src="/<?php echo config_item('dir_alias') ?>/img/logosvs.png"  height="150px" width="150px" alt="logo twitter" title="Superintendencia de Valores y Seguros">
					</a>
					<br>
					<br>
					<a href="http://www.tesoreria.cl/"  target="_blank">
						<img src="/<?php echo config_item('dir_alias') ?>/img/logotesoreria.png"  height="150px" width="150px" alt="logo Tesorería" title="Tesorería General de la República">
					</a>
				</div>
		    </div>
	  	</div>
	</div>
