<?php

class AppModel
{
	protected $_db;

	public function __construct(){
		$this->_db = new Database();
	}
}