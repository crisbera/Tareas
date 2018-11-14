<?php

class Bootstrap
{
	public static function run(Request $peticion){
		$controller = $peticion->getControlador()."Controller";
		$rutaControlador = ROOT."controllers".DS.$controller.".php";
		$metodo = $peticion->getMetodo();
		$args = $peticion->getArgs();

		if (is_readable($rutaControlador)) {
			require_once $rutaControlador;
			$controller = new $controller;

			if (is_callable(array($controller, $metodo))) {
				$metodo = $peticion->getMetodo();
			}else{
				$metodo = "index";
			}

			if (isset($args)) {
				call_user_func_array(
					array($controller, $metodo), 
					$peticion->getArgs()
				);
			}else{
				call_user_func(array($controller, $metodo));
			}

		}else{
			throw new Exception("Controlador no encontrado");
		}
	}

}