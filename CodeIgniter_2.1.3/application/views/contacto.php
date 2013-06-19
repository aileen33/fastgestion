<?php
if (!isset($_POST['email'])) {
?>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
  
	<fieldset style="margin-right:300px;" >
				<div class="row-fluid">
					<div class="span6">
						<font color="red">*Campos Obligatorios</font>
					</div>
				</div>
				<div class= "row-fluid">
					<div class= "span6" style="margin-bottom:2%">
						Complete los datos del formulario para envíar su consulta:
					</div>
				</div>

    <label>
    <font color="red">*</font>Nombre:</label>
    <input style="margin-left:10px" name="nombre" type="text"  placeholder="Ej:Juan" title="Ingrese su nombre" required/>
    <br>
	<label>
    <font color="red">*</font>Correo:</label>
    <input style="margin-left:16px" name="correo" type="text"  placeholder="Ej:Juan@hotmail.com" title="Ingrese su correo electrónico" required/>
    <br>
	<label> Asunto:</label>
    <input style="margin-left:20px"name="email" type="text" placeholder="Ej:Disponibilidad" "Ingrese el asunto del mensaje"/>
    <br>
	<label><font color="red">*</font>Mensaje: </label>
	<textarea style="margin-left:5px"name="mensaje" maxlength="500"  required="required"></textarea>  
    <br>
	<div class="row-fluid" style="margin-left:130px">
	<input type="submit" value="Enviar" />
	<input type="reset" value="Cancelar" />
    <div>
	</fieldset>
  </form>
<?php
}else{
  $mensaje="Mensaje del formulario de contacto de confecciones jessica";
  $mensaje.= "\nNombre: ". $_POST['nombre'];
  $mensaje.= "\nEmail: ".$_POST['correo'];
  $mensaje.= "\nMensaje: \n".$_POST['mensaje'];
  $destino= "aileen.esparza@usach.cl";
  $remitente = $_POST['email'];
  $asunto = "Mensaje enviado por: ".$_POST['nombre'];
  mail($destino,$asunto,$mensaje,"FROM: $remitente");
?>
  <p><strong>Mensaje enviado.</strong></p>
<?php
}
?>









