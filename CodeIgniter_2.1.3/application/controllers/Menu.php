<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/Master.php'; 

class Menu extends MasterManteka {
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
	public function index()
	{
	   // se carga el modelo, los datos de la vista, las funciones a utilizar del modelo
		$datos_vista = 0;		
		$subMenuLateralAbierto = ""; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu1', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);
	
		
	}
	
	public function menu1(){
		// se carga el modelo, los datos de la vista, las funciones a utilizar del modelo
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu1"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu1', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);
	}
	public function menu2(){
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu2"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu2', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);

	}
	public function menu3(){
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu3"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu3', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);
	}
	public function menu4(){
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu4"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu4', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);

	}
	public function menu5(){
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu5"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu5', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);

	}
	public function menu6(){
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu6"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu6', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);

	}
	public function menu7(){
		$datos_vista = 0;		
		$subMenuLateralAbierto = "menu7"; 
		$muestraBarraProgreso = FALSE; //Indica si se muestra la barra que dice anterior - siguiente
		$this->cargarTodo("Menu", 'menu7', "barra_lateral", $datos_vista,  $subMenuLateralAbierto, $muestraBarraProgreso);

	}
}

/* End of file Correo.php */
/* Location: ./application/controllers/Correo.php */