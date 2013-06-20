<?php
if (!isset($_POST['email'])) {
?>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
  


	<fieldset  >
				<div class="row-fluid">
					<div class="span6">
					<h3>Contacto </h3>
					
					</div>
					
					
				</div>
				<div class="offset6 top">
					<div class="span1">
					<img src="/<?php echo config_item('dir_alias')  ?>/img/home.png" alt="contacto" >
					</div>
					<div class="span10">
					Santiago-Concepción,Chile<br>
					contacto@fastgestion.cl
					<br>
					<a href="http://www.fastgestion.cl"/>http://www.fastgestion.cl</a>
					</div>
					<br><br>
				</div>	
				<div class= "row-fluid" >
				
					
				</div>
Complete los datos del formulario para envíar su consulta:<font color="red"><br>*Campos Obligatorios</font><br><br>
						
	<div class="span2">
    <font color="red">*</font>Nombre:
	</div>
	<div>
    <input name="nombre" type="text"  placeholder="Ej:Juan" title="Ingrese su nombre utilizando sólo letras" required/>
    </div>
	<div class="span2">
    <font color="red">*</font>Correo:
	</div>
	<div >
    <input  name="correo" type="text"  placeholder="Ej:Juan@hotmail.com" title="Ingrese su correo electrónico. Ej: juan@hotmail.com" required/>
    </div>
	<div class="span2">
	Asunto:
	</div>
	<div >
    <input name="email" type="text" placeholder="Ej:Capacitación" "Ingrese el asunto del mensaje"/>
    </div>
	<div class="span2">
	<font color="red">*</font>Mensaje: 
	</div>
	<div>
	<textarea title="Ingrese el mensaje a envíar"name="mensaje" maxlength="500"  required="required"></textarea>  
    </div>
	<div style="margin-left:260px">
	<input type="submit" value="Enviar" />
	<input type="reset" value="Cancelar" />
    <div>
	
	</fieldset>
  </form>
<?php
}else{
  $mensaje="Mensaje de consultas FastGestion.";
  $mensaje.= "\nNombre: ". $_POST['nombre'];
  $mensaje.= "\nEmail: ".$_POST['correo'];
  $mensaje.= "\nMensaje: \n".$_POST['mensaje'];
  $destino= "aileen.esparza@usach.cl";
  $remitente = $_POST['email'];
  $asunto = "Mensaje enviado por: ".$_POST['nombre'];
  mail($destino,$asunto,$mensaje,"FROM: $remitente");
?>

		    <div class="alert alert-success">
    			<button type="button" class="close" data-dismiss="alert">&times;</button>
    			 <h4>Mensaje enviado.</h4>
				Nos comunicaremos con usted a la brevedad.
    		</div>	
		
  
<?php
}
?>









