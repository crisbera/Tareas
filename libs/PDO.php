<?php
/**
 * Archivo de clase de conexion PDO
 *
 * Clase que permite acciones CRUD usando PDO
 *
 * @package PDO
 * @author Cristian Bernal <crisbera@gmail.com>
 * @version 1.0 Estable
 * @copyright MIT
 */
class ClassPDO{
	/** @var string variable de conexión */
	public  $connection = "";

	/** @var string cadena de conexión */
	private $dsn;

	/** @var string controlador de la base de datos */
	private $_drive;
	
	/** @var string nombre de servidor */
	private $_host;
	
	/** @var string nombre de la base datos */
	private $_database;

	/** @var string nombre de usuario */
	private $_username;

	/** @var string contraseña */
	private $_password;

	/** @var string resultado */
	public  $result;

	/** @var string Ultimo id insertado */
	public  $lastInsertId;

	/** @var int Columnas afectadas */
	public $numberRows;

	/**
	  * Constructor de la clase
	  * 
	  * Metodo constructor de la clase
	  * 
	  * @param string $drive gestor de base de datos
	  * @param string $host nombre del servidor
	  * @param string $database nombre de la base de datos
	  * @param string $username nombre de usuario
	  * @param string $password contraseña
	  * @return void
	  */
	public function __construct($drive = 'mysql', $host = 'localhost', $database = 'gestion', $username = 'root', $password = ''){
		$this->_drive    = $drive;
		$this->_host     = $host;
		$this->_database = $database;
		$this->_username = $username;
		$this->_password = $password;
		$this->connection();
	}

	/**
	  * Méto de conexión a la base de datos.
	  *
	  * Método que permite establecer una conexión a la base de datos
	  *
	  * @return void
	  */
	private function connection(){
		$this->_dsn = $this->_drive.':host='.$this->_host.';dbname='.$this->_database;
		try{
			$this->connection = new PDO(
				$this->_dsn,
				$this->_username,
				$this->_password
			);
			$this->connection->setAttribute(
				PDO::ATTR_ERRMODE, 
				PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "ERROR: " . $e->getMessage();
			die();
		}		
	}

	/**
	  * Método find
	  *
	  * Método que sirve para hacer consultas a la base de datos
	  *
	  * @param string $table nombe de la tabla a consultar
	  * @param string $query tipo de consulta
	  *  - all
	  *  - first
	  *  - count
	  * @param array $options restriciones en la consulta
	  *  - fields
	  *  - conditions
	  *  - group
	  *  - order
	  *  - limit
	  * @return object
	  */
	public function find($table = null, $query = null, $options = array()){
		$fields = '*';
		$parameters = '';

		if(!empty($options['fields'])){
			$fields  = $options['fields'];
		}

		if(!empty($options['conditions'])){
			$parameters = ' WHERE '.$options['conditions'];
		}

		if(!empty($options['group'])){
			$parameters  .= ' GROUP BY '.$options['group'];
		}		

		if(!empty($options['order'])){
			$parameters  .= ' ORDER BY '.$options['order'];
		}

		if(!empty($options['limit'])){
			$parameters  .= ' LIMIT '.$options['limit'];
		}

		switch ($query) {
			case 'all':{
				$sql = "SELECT $fields FROM ".$table.' '.$parameters;
				$this->result = $this->connection->query($sql);
				break;
			}
			case 'count':{
				$sql = "SELECT COUNT(*) FROM ".$table.' '.$parameters;
				$result = $this->connection->query($sql);
				$this->result = $result->fetchColumn();
				break;
			}
			case 'first':{
				$sql = "SELECT $fields FROM ".$table.' '.$parameters;
				$result = $this->connection->query($sql);
				$this->result = $result->fetch();
				break;
			}
			
			default:
				$sql = "SELECT $fields FROM ".$table.' '.$parameters;
				$this->result = $this->connection->query($sql);
				break;
		}

		return $this->result;

	}

	/**
	* Metodo save 
	*
	* Metodo que sirve para guardar registros
	* 
	* @param  string $table tabla a consultar
	* @param  string $data valores a guardar
	* @return object
	*/

	public function save($table = null, $data = array()){
		$sql = "SELECT * FROM $table";
		$result = $this->connection->query($sql);

		for ($i=0; $i < $result->columnCount(); $i++) { 
			$meta = $result->getColumnMeta($i);
			$fields[$meta['name']]=null;
		}

		$fieldsToSave="id";
		$valueToSave="NULL";

		foreach ($data as $key => $value) {
			if(array_key_exists($key, $fields)){
				$fieldsToSave .= ", ".$key;
				$valueToSave  .= ", "."\"$value\""; 
			}
		}

		$sql = "INSERT INTO $table ($fieldsToSave)VALUES($valueToSave);";

		$this->result = $this->connection->query($sql);

		$this->lastInsertId = $this->connection->lastInsertId();

		return $this->result;
	}

	/**
	 * Metodo update 
	 * 
	 * Metodo que sirve para actualizar registros
	 * 
	 * @param  string $table tabla a consultar
	 * @param  string $data valores a actualizar
	 * @return object
	 * @author Cristian Bernal <crisbera@gmail.com>
	 */
	public function update($table = null, $data = array()){
		$sql = "SELECT * FROM $table";
		$result = $this->connection->query($sql);

		for ($i=0; $i < $result->columnCount(); $i++) { 
			$meta = $result->getColumnMeta($i);
			$fields[$meta['name']]=null;
		}		

		if(array_key_exists("id", $data)){
			//Update
			$fieldsToSave = "";
			$id = $data["id"];
			unset($data["id"]);
			$i = 0;

			foreach ($data as $key => $value) {
				if(array_key_exists($key, $fields)){
					$fieldsToSave .= $key."="."\"$value\", ";
				}

			}
			$fieldsToSave = substr_replace($fieldsToSave, '', -2);

			$sql = "UPDATE $table SET $fieldsToSave WHERE $table.id =$id;";
			//echo $sql;
			//exit;
		}
		$this->result = $this->connection->query($sql);

		return $this->result;		
	}

	/**
	 * Metodo delete 
	 * 
	 * Metodo que sirve para eliminar registros
	 * 
	 * @param string $table tabla a consultar
	 * @param string $condition condición a cumplir
	 * @return object
	 */
	public function delete($table = null, $condition = null){
		$sql = "DELETE FROM $table WHERE $condition".";";

		$this->result = $this->connection->query($sql);

		$this->numberRows = $this->result->rowCount();

		return $this->result;
	}
}

?>