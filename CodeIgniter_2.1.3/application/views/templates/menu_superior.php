<!--	Menú que contiene los distintos módulos que soporta el sistema ManteKA							-->
<!--	Contiene las secciones Correos, Docentes, Secciones, Planificación, Salas, Alumnos, Informes	-->
<!--	Para cada una de las secciones se determina si está seleccionada o no							-->
<!--	Se recibe en la vista la variable $menuSuperiorAbierto desde el controlador						-->
<!--	Determinando cuál es el módulo que está seleccionado											-->

<?php
	//	Si la variable no se ha seteado, se asume operación principal.
		if (!isset($menuSuperiorAbierto)) {
			$menuSuperiorAbierto = "Salas";
		}
		
		$menu1 = "";
		$menu2 = "";
		$menu3 = "";
		

		//	En caso de que tal operación específica este seleccionada.
		//	La operación seleccionada tiene clase "active"
		if ($menuSuperiorAbierto == "Salas") {
			$menu1 = 'class="active"';
		}
		else if ($menuSuperiorAbierto == "Secciones") {
			$menu2 = 'class="active"';
		}
		else if ($menuSuperiorAbierto == "Contacto") {
			$menu3 = 'class="active"';
		}


?>

	<div class="navbar">
		<div class="navbar-inner" style="margin-left:0px;">
			<ul class="nav">
				<li <?php echo $menu1;?> >
					<a class="btn_with_icon" href="<?php echo site_url("Salas/index") ?>">S Acerca de Fastgestion</a>
				</li>
				<li <?php echo $menu2;?> >
					<a class="btn_with_icon" href="<?php echo site_url("Secciones/index") ?>">K Quiénes somos</a>
				</li>
				<li <?php echo $menu3;?> >
					<a class="btn_with_icon" href="<?php echo site_url("Contacto/index") ?>">M Contáctanos</a>
				</li>
				
			</ul>
		</div>
	</div>
	
