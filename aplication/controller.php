<?php 
abstract class AppController{
	protected $db; 
	abstract public function index();

	public function __construct(){

		$connection = new DataBaseConfig();

		$this->db = new ClassPDO(
			$connection->config['drive'],
			$connection->config['host'],
			$connection->config['database'],
			$connection->config['username'],
			$connection->config['password']
		);
	}

	protected function set($name = null, $value=array()){
		$GLOBALS[$name] = $value;
	}

	protected function redirect($url = array()){
		$path = "";
		if($url["controller"]){
			$path .= $url["controller"];
		}
		if($url["action"]){
			$path .= "/". $url["action"];
		}
		
		header("LOCATION: ".APP_URL.$path);
	}

}