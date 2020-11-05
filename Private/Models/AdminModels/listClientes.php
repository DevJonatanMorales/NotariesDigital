<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class ListClientes extends ModelFather
{
	private $datos;
	private $query = false;
	public $resultado;

	public function RecibirDatos($datos)
	{
		$this->datos = $datos;
		$this->Validar();
	}

	private function Validar() 
	{
		switch ($this->datos['accion']) {
			case 'mostrar':
				$this->query = true;
				$this->Mostrar();
				break;			
			case 'buscar':
				$this->query = true;
				$this->Buscar();
				break;
		}
	}

	private function Mostrar()
	{
		if ($this->query == true) {
			$sql = "SELECT clientes.cliente_id, usuarios.foto, clientes.nombres, clientes.apellidos, clientes.telefono, usuarios.email FROM `clientes` INNER JOIN `usuarios` ON clientes.usuario_id=usuarios.usuario_id";
	
			$this->PrintJSON($this->Read($sql));
		} else {
			$this->PrintJSON(['query' => 'error']);
		}		
	}

	private function Buscar()
	{
		if($this->query == true) {
			$sql = "SELECT clientes.cliente_id, usuarios.foto, clientes.nombres, clientes.apellidos, clientes.telefono, usuarios.email FROM `clientes` INNER JOIN `usuarios` ON clientes.usuario_id=usuarios.usuario_id WHERE clientes.nombres LIKE '%".$this->datos['sql']."%' OR clientes.apellidos LIKE '%".$this->datos['sql']."%' OR usuarios.email LIKE '%".$this->datos['sql']."%'";

			// $this->resultado = $sql;
			$this->PrintJSON($this->Read($sql));
		} else {
			$this->PrintJSON(['query'=>'error']);
		}
	}

	private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$litsClientes = new ListClientes();

if (isset($_POST['datos'])) {
	$litsClientes->RecibirDatos($_POST['datos']);
	echo $litsClientes->resultado;
}
?>