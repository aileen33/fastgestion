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
