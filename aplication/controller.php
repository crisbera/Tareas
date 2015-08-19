<?php 
abstract class AppController{
	protected $db; 
	abstract public function index();

	public function __construct(){

		$nameController = substr_replace(get_class($this), '', -1);
		$connection = new DataBaseConfig();

		$this->$nameController = new ClassPDO(
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
		$server="http://".$_SERVER['HTTP_HOST'];
		header("LOCATION: ".$server."/app/".$path);
	}

}