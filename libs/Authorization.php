<?php
/**
 * Clase Authorization
 * 
 * Clase que sirve para validar usuarios en el sistema
 * @author  Cristian Bernal <crisbera@gmail.com>
 */
class Authorization{
	
	/**
	 * Método logged
	 * 
	 * Método que sirve para comprobar si el usuario inicio sesión en el sistema
	 * @return  void no regresa ningún valor
	 */
	static function logged(){
		session_start();
		if(!$_SESSION['logged']){
			
		    header("Location: ".APP_URL."usuarios/login");
		    exit;
		}
	}

	/**
	 * Método login
	 * 
	 * Método que permite que el usuario inicie sesión en el sistema
	 * @param  $user array con los datos del usuario
	 * @return  void no regresa ningún valor
	 */
	public function login($user){
		session_start();
		$_SESSION['logged'] = true;
	    $_SESSION['username'] = $user["username"];
	    $_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
	}	
	
	/**
	 * Método logout
	 * 
	 * Método que termina la sesión del usuario
	 * 
	 */
	public function logout(){
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy(); 
		echo"<script type='text/javascript'>
		     alert('Ha salido correctamente');
		    window.location='usuarios/login';
		    </script>";
	}
}