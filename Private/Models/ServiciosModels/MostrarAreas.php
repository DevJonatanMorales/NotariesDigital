<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class MostrarAreas extends ModelFather
{
  public $resultado;
  private $query = false;
  private $datos;

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
      $sql = "SELECT * FROM `areas` ORDER BY areas_id DESC";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    } else {
      $this->PrintJSON(['result'=>'errorUno']);
    }
  }

  private function Buscar()
  {
    if ($this->query == true) {
      $sql = "SELECT * FROM `areas` WHERE nom_areas LIKE '%".$this->datos['query']."%'";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    } else {
      $this->PrintJSON(['result'=>'error']);
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json');
    $this->resultado = json_encode($stringJson);
  }
}

$mostrarAreas = new MostrarAreas();

if (isset($_POST['datos'])) {
  $mostrarAreas->RecibirDatos($_POST['datos']);
  echo $mostrarAreas->resultado;
}

?>