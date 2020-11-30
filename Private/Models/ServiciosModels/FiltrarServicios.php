<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class FiltrarServicios extends ModelFather
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
      case 'filtrar':
        $this->query = true;
        $this->Filtrar();
        break;
      
      default:
        $this->PrintJSON(['result'=>'error']);
        break;
    }
  }

  private function Filtrar()
  {
    if ($this->query == true) {
      
      if ($this->datos['filtro'] == 0) {
        $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, areas.nom_areas FROM areas INNER JOIN servicios on areas.areas_id=servicios.areas_id";
      } else {
        $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, areas.nom_areas FROM areas INNER JOIN servicios on areas.areas_id=servicios.areas_id WHERE areas.areas_id = '".$this->datos['filtro']."'";
      }

      $this->PrintJSON($this->Read($sql));
    } else {
      $this->PrintJSON(['result'=>'error']);
    }    
  }
  
  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$filtrarServicios = new FiltrarServicios();

if (isset($_POST['datos'])) {
  $filtrarServicios->RecibirDatos($_POST['datos']);
  echo $filtrarServicios->resultado;
}
?>