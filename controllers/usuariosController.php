<?php

class Usuarios extends AppController{

	public function __contruct(){
		parent::__contruct();
	}

	public function index(){
		$usuarios = $this->db->find("usuarios", "all");	
		$this->set("usuarios", $usuarios);
	}
	
	public function add(){
		if($_POST){
			$filter = new Validations();
			$pass = new Password();

			$_POST["password"] = $filter->sanitizeText($_POST["password"]);
			$_POST["password"] = $pass->getPassword($_POST["password"]);

			if($this->db->save("usuarios", $_POST)){
				$this->redirect(array("controller"=>"usuarios"));
			}else{
				$this->redirect(array("controller"=>"usuarios", "action"=>"add"));
			}
		}
	}

	public function edit($args){
		if($_POST){
			$filter = new Validations();
			$pass = new Password();

			$_POST["password"] = $filter->sanitizeText($_POST["password"]);
			$_POST["password"] = $pass->getPassword($_POST["password"]);

			if($this->db->update("usuarios", $_POST)){
				$this->redirect(array("controller"=>"usuarios"));
			}else{
				$this->redirect(array("controller"=>"usuarios", "action"=>"edit"));
			}
		}		
		$usuario = $this->db->find("usuarios", "first", array(
			"conditions" => "usuarios.id=".$args[0]
		));
		$this->set("usuario", $usuario);

	}

	public function login(){
		if($_POST){
			$pass = new Password();
			$filter = new Validations();
			$auth = new Authorization();

			$username = $filter->sanitizeText($_POST["username"]);
			$password = $filter->sanitizeText($_POST["password"]);

			$options['conditions'] = " username = '$username'";
			$usuario = $this->db->find("usuarios", "first", $options);

			if($pass->isValid($password, $usuario['password'])){
				$auth->login($usuario);
				$this->redirect(array("controller"=>"tareas"));
			}else{
				echo "Usuario Invalido";
			}
		}
	}

	public function logout(){
		$auth = new Authorization();
		$auth->logout();
	}	
}