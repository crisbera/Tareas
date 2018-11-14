<?php

/**
 * Controlador principal de la APP
 * 
 * @author  Cristian Bernal <crisbera@gmail.com>
 * @version 1.0
 */
abstract class AppController
{
	/**
	 * Objeto de la clase view
	 * @var object
	 */
	protected $_view;

	/**
	 * Objeto de la clase Messages
	 * @var object
	 */
	protected $_messages;

	/**
	 * Constructor de la clas
	 */
	public function __construct(){
		$this->_view = new View(new Request);
		$this->_messages = new \Plasticbrain\FlashMessages\FlashMessages();
	}

	/**
	 * Método abstracto
	 * @return [type] [description]
	 */
	abstract function index();

	/**
	 * Método que carga modelos en el controlador
	 * @param  string $modelo nombre del modelo
	 * @return object instancia de la clase
	 */
	protected function loadModel($modelo){
		$modelo = $modelo."Model";
		$rutaModelo = ROOT."models".DS.$modelo.".php";

		if (is_readable($rutaModelo)) {
			require_once($rutaModelo);
			$modelo = new $modelo;
			return $modelo;
		}else{
			throw new Exeption("Error al cargar el modelo");
		}
	}

	/**
	 * Construye la ruta de redireción
	 * @param  array  $url elementos de la url
	 * @return string url generada
	 */
	public function redirect($url = array()){
		$path = "";
		if ($url["controller"]) {
			$path .= $url["controller"];
		}
		if ($url["action"]) {
			$path .= "/".$url["action"];
		}
		return APP_URL.$path;
		//header("LOCATION: ".APP_URL.$path);
	}
}