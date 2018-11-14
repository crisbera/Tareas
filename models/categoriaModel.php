<?php

class CategoriaModel extends AppModel
{
	private static $nombre = "categorias";

	public function listarTodo(){
		
		$categorias = $this->_db->query("SELECT * FROM categorias");
		
		return $categorias->fetchall();
	}
	
	public function guardar($datos = array()){

		$consulta = $this->_db->prepare(
			"INSERT INTO categorias (nombre) VALUES (:nombre)"
		);

		$consulta->bindParam(":nombre", $datos["nombre"]);		

		if ($consulta->execute()) {
			return true;
		}else{
			return false;
		}
	}	

}