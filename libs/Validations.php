<?php
/**
 * Clase para validar filtro de datos
 * 
 * Colección de funciones para validar filtro de datos, rangos y valores
 * @author  Cristian Bernal <crisbera@gmail.com>
 */
class Validations {
	
	/**
	 * Método isInt
	 * 
	 * Método que sirve para derminar si un numero es valido, opcionalmente dentro de un rango
	 * @param   $number numero a evaluar
	 * @param   $min_range valor inferior del rango	
	 * @param   $max_range valor superior del rango
	 * @return  bool valor boleano resultado de la validación
	 */
	public function isInt($number, $min_range = null, $max_range = null){
		//Rango de numeros
		$options = array();

		if($min_range && $max_range){
			$options = array(
				array(
					"min_range"=>$min_range,
					"max_range"=>$max_range
				)	
			);
		}else{
			if($min_range){
				$options = array(
					array(
					"min_range"=>$min_range
					)	
				);
			}

			if($max_range){
				$options = array(
					array(
						"max_range"=>$max_range
					)	
				);
			}
		}
		if(filter_var($number, FILTER_VALIDATE_INT, $options)){
			return true;
		}
		return false;
	}

	public function isEmail($email){
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		//Aplicamos el filtrado
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}
		return false;
	}

	public function sanitizeText($string){
		$string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
		return $string;
	}
}

$filter = new Validations();
