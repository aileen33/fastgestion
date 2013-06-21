<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/Master.php'; 

class Contacto extends MasterManteka {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	/******************************************************************************************************************************
	* Funciones de tipo GET
	* Acá se ponen las funciones que cargan vistas a través del método GET, sólo muestran vistas.
	******************************************************************************************************************************/

	/**
	* Función principal del controlador User, es llamado para mostrar la vista de gestión
	* de la cuenta de usuario
	*/

	
	public function EnviarConsulta(){
		// se carga el modelo, los datos de la vista, las funciones a utilizar del modelo
		$datos_vista = 0;		
		$subMenuLateralAbierto = "EnviarConsulta"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Contacto", 'contacto', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);
	}
	public function InfoContacto(){
		// se carga el modelo, los datos de la vista, las funciones a utilizar del modelo
		$datos_vista = 0;		
		$subMenuLateralAbierto = "InfoContacto"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Contacto", 'info', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);
	}
}

/* End of file Correo.php */
/* Location: ./application/controllers/Correo.php */