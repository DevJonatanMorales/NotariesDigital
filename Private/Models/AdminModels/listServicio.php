<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class ListServicio extends ModelFather
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
      case 'mostrar':
        $this->query = true;
        $this->Mostrar();
        break;

      case 'buscar':
        $this->query = true;
        $this->Buscar();
        break;
      
      default:
        $this->PrintJSON(['result'=>'error']);
        break;
    }
  }

  private function Mostrar()
  {
    if ($this->query == true) {
      $sql = "SELECT servicios.nom_servicio, areas.nom_areas FROM servicios INNER JOIN areas ON servicios.areas_id = areas.areas_id ORDER BY servicios.servicios_id DESC";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    } else {
      $this->PrintJSON(0);
    }
  }

  private function Buscar()
  {
    if ($this->query == true) {
      $sql = "SELECT servicios.nom_servicio, areas.nom_areas FROM servicios INNER JOIN areas ON servicios.areas_id = areas.areas_id WHERE servicios.nom_servicio LIKE '%".$this->datos['query']."%' OR areas.nom_areas LIKE '%".$this->datos['query']."%'";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    } else {
      $this->PrintJSON(0);
    }
  }

  private function PrintJSON($stringJson)
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$listServicio = new ListServicio();

if (isset($_POST['datos'])) {
  $listServicio->RecibirDatos($_POST['datos']);
  echo $listServicio->resultado;
}
?>