<?php

class Categorias extends AppController
{
	public function index(){
		$categorias = $this->db->find("categorias", "all");
		$this->set("categorias", $categorias);
	}
	public function add(){
		if($_POST){
			if($this->db->save("categorias", $_POST)){
				$this->redirect(array(
					"controller"=>"categorias"
				));
			}else{
				$this->redirect(array(
					"controller"=>"categorias",
					"action"=>"add"
				));
			}
		}
	}
	public function edit(){

	}
	public function delete(){

	}
} 