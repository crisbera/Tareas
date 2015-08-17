<?php 
abstract class AppController{
	protected $db; 
	abstract public function index();

	public function __construct(){
		$this->db = new ClassPDO();
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