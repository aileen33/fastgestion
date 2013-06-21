<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" href="/<?php echo config_item('dir_alias') ?>/img/img-slider1/auditoria_condominios.jpg" >
<title>FastGestion</title>
	<?php
		echo $head						//	Esta variable es pasada como parámetro a esta vista
	?>
<body>
	<div id="wrap" style="min-width:100%">
		<div class="row-fluid">
				<?php
					echo $menu_superior;	//	Barra con los menúes
				?>

		</div>
		<!-- Ahora debe ir el código de la barra lateral y el contenido de la operación -->
		<div class="container-fluid" >
			<div class="row-fluid">
				<div class="span2">
					<!--Sidebar content-->
					<?php
						echo $barra_lateral;		//	Barra Lateral
					?>
				</div>
				<div class="span10">
					
					<!-- Barra de navegación con botones undo-redo -->
					<div style="min-height: 310px" class="undoable" >
						<!-- Start WOWSlider.com BODY section -->
						<div id="wowslider-container1">
							<div class="ws_images">
								<ul>
									<li><a href="<?php echo site_url("Menu/menu1")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/contabilidad.jpg" alt="ASESORIACONTABILIDAD" title="Asesoría en Contabilidad" id="wows1_0"/></a></li>
									<li><a href="<?php echo site_url("Menu/menu2")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/laboral.jpg" alt="ASESORIALABORAL" title="Asesoría Laboral y Remuneraciones" id="wows1_1"/></a></li>
									<li><a href="<?php echo site_url("Menu/menu3")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/legal.jpg" alt="ASESORIALEGAL" title="Asesoría Legal Administrativa" id="wows1_2"/></a></li>
									<li><a href="<?php echo site_url("Menu/menu4")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/tributaria.jpg" alt="ASESORIATRIBUTARIA" title="Asesoría Tributaria" id="wows1_3"/></a></li>
									<li><a href="<?php echo site_url("Menu/menu5")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/auditoria_condominios.jpg" alt="AUDITORIAEN EDIFICIOS Y CONDOMINIOS" title="Auditoría en Edificios y Condominios" id="wows1_4"/></a></li>
									<li><a href="<?php echo site_url("Menu/menu6")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/auditoria_financiera.jpg" alt="AUDITORIAPARAAPOYO" title="Auditoría para Apoyo al Control Interno" id="wows1_5"/></a></li>
									<li><a href="<?php echo site_url("Menu/menu7")?>"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/capacitacion.jpg" alt="CAPACITACION" title="Capacitación" id="wows1_6"/></a></li>

								</ul>
							</div>
								<div class="ws_bullets">
									<div>
										<a href="#" title="Asesoría Laboral y Remuneraciones" ><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/contabilidad.jpg" alt="CONTABILIDAD"/>1</a>
										<a href="#" title="Asesoría Laboral y Remuneraciones"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/laboral.jpg" alt="LABORAL"/>2</a>
										<a href="#" title="Asesoría Legal Administrativa"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/legal.jpg" alt="LEGAL"/>3</a>
										<a href="#" title="Asesoría Tributaria"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/tributaria.jpg" alt="TRIBUTARIA"/>4</a>
										<a href="#" title="Auditoría en Edificios y Condominios"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/auditoria_condominios.jpg" alt="AUDITORIA CONDOMINIOS"/>5</a>
										<a href="#" title="Auditoría para Apoyo al Control Interno" ><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/auditoria_financiera.jpg" alt="AUDITORIA APOYO"/>6</a>
										<a href="#" title="Capacitación"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/capacitacion.jpg" alt="CAPACITACION"/>7</a>

									</div>
								</div>
							<div class="ws_shadow"></div>
						</div>
						<script type="text/javascript" src="/<?php echo config_item('dir_alias') ?>/javascripts/wowslider1.js"></script>
						<script type="text/javascript" src="/<?php echo config_item('dir_alias') ?>/javascripts/script1.js"></script>
							<!-- End WOWSlider.com BODY section -->

						<!--	Body content									-->
						<!--	Cuerpo central de la operación (de la vista)	-->
						<?php
							echo $cuerpo_central;		//	Cuerpo central pasado como parámetro desde el controlador
						?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<?php
		echo $footer;
	?>
	</body>
</html>
