<!DOCTYPE html>
<html lang="en">
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
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/auditoria_condominios.jpg" alt="AUDITORIA CONDOMINIOS" title="AUDITORIA CONDOMINIOS" id="wows1_0"/></li>
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/auditoria_financiera.jpg" alt="AUDITORIA FINANCIERA" title="AUDITORIA FINANCIERA" id="wows1_1"/></li>
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/capacitacion.jpg" alt="capacitacion" title="capacitacion" id="wows1_2"/></li>
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/contabilidad.jpg" alt="CONTABILIDAD" title="CONTABILIDAD" id="wows1_3"/></li>
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/laboral.jpg" alt="LABORAL" title="LABORAL" id="wows1_4"/></li>
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/legal.jpg" alt="LEGAL" title="LEGAL" id="wows1_5"/></li>
									<li><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider/tributaria.jpg" alt="tributaria" title="tributaria" id="wows1_6"/></li>
								</ul>
							</div>
								<div class="ws_bullets">
									<div>
										<a href="#" title="AUDITORIA CONDOMINIOS"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/auditoria_condominios.jpg" alt="AUDITORIA CONDOMINIOS"/>1</a>
										<a href="#" title="AUDITORIA FINANCIERA"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/auditoria_financiera.jpg" alt="AUDITORIA FINANCIERA"/>2</a>
										<a href="#" title="capacitacion"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/capacitacion.jpg" alt="capacitacion"/>3</a>
										<a href="#" title="CONTABILIDAD"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/contabilidad.jpg" alt="CONTABILIDAD"/>4</a>
										<a href="#" title="LABORAL"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/laboral.jpg" alt="LABORAL"/>5</a>
										<a href="#" title="LEGAL"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/legal.jpg" alt="LEGAL"/>6</a>
										<a href="#" title="tributaria"><img src="/<?php echo config_item('dir_alias') ?>/img/img-slider1/tributaria.jpg" alt="tributaria"/>7</a>
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
