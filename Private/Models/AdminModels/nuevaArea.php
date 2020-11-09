<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class NuevaArea extends ModelFather
{
	public $resultado;
	private $datos;
	private $query = false;

	public function RecibirDatos($datos)
	{
		$this->datos = $datos;
		$this->Accion();
	}

	private function Accion()
	{
		switch ($this->datos['accion']) {
			case 'guardar':
				$this->query = true;
				$this->NewArea();
				break;
			
			default:
				$this->PrintJSON(['result'=>'error']);
				break;
		}
	}

	private function NewArea()
	{
		if ($this->query == true) {
			$sql = "INSERT INTO `areas`(`areas`) VALUES ('".$this->datos['area']."')";

			if ($this->Query($sql) == true) {
				$this->resultado = 1;
			} else {
				$this->resultado = 0;
			}
			
		} else {
			$this->PrintJSON(['result'=>'error']);
		}
		
	}

	private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$nuevaArea = new NuevaArea();

if (isset($_POST['datos'])) {
	$nuevaArea->RecibirDatos($_POST['datos']);
	echo $nuevaArea->resultado;
}
?>