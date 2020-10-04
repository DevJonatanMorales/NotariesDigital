<?php 
/**
 * clase conexion
 */
class Conection
{
	private $host;
	private $user;
	private $pass;
	private $db;
	protected $conn;

	function __construct()
	{
		$this->host = constant("SERVERNAME");
		$this->user = constant("USERNAME");
		$this->pass = constant("USERPASS");
		$this->db 	= constant("DBNAME");
	}

	protected function OpenConection()
	{
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
		
		if ($this->conn->connect_error) 
		{
		 	die("Connection failed: " . $this->conn->connect_error);
		}
	}	
}

?>