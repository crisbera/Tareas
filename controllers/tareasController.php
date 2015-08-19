<?php

class Tareas extends AppController
{
	public function index(){
		$conditions = array(
			"conditions"=>" tareas.categoria_id=categorias.id"
		);
		$tareas = $this->Tarea->find("tareas, categorias", "all", $conditions);
		$tareas = $tareas->fetchAll(PDO::FETCH_NUM);
		$categorias = $this->Tarea->find("categorias", "all");
		$this->set("tareas", $tareas);
		$this->set("categorias", $categorias);
	}

	public function add(){
		if($_POST){
			if($this->Tarea->save("tareas", $_POST)){
				$this->redirect(array(
					"controller"=>"tareas"
				));
			}else{
				$this->redirect(array(
					"controller"=>"tareas",
					"action"=>"add"
				));
			}
		}
		$categorias = $this->Tarea->find("categorias", "all");
		$this->set("categorias", $categorias);
	}

	public function edit($args = array()){
		if($_POST){
			if($this->Tarea->update("tareas", $_POST)){
				$this->redirect(array(
					"controller"=>"tareas"
				));
			}else{
				$this->redirect(array(
					"controller"=>"tareas",
					"action"=>"add"
				));
			}
		}

		$options = array(
			"conditions"=>"id=".$args[0]
		);
		$tarea = $this->Tarea->find("tareas", "first", $options);
		$categorias = $this->Tarea->find("categorias", "all");
		$this->set("categorias", $categorias);
		$this->set("tarea", $tarea);
	}

	public function delete($args){
		if($_GET){
			$condition = "id=".$args[0];
			$this->Tarea->delete("tareas", $condition);
			$this->redirect(array("controller"=>"tareas"));
		}
	}

	public function status($args){
		if($_GET){
			if ($args[0]=="off") {
				$data = array(
					"id"=> $args[1],
					"status"=> 0
				);
				if($this->Tarea->update("tareas", $data)){
					$this->redirect(array("controller"=>"tareas"));
				}
			}elseif($args[0]=="on"){
				$data = array(
					"id"=> $args[1],
					"status"=> 1
				);
				if($this->Tarea->update("tareas", $data)){
					$this->redirect(array("controller"=>"tareas"));
				}				
			}
		}		
	}
}