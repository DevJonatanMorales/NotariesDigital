<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class EliminarArea extends ModelFather
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
      case 'eliminar':
        $this->query = true;
        $this->ValArea();
        break;
      
      default:
        $this->PrintJSON('error');
        break;
    }
  }

  private function ValArea()
  {
    if ($this->query == true) {
      $sql = "SELECT areas.areas_id FROM areas WHERE areas_id IN (SELECT servicios.areas_id FROM servicios WHERE servicios.areas_id = '".$this->datos['areaId']."')";

      if ($this->Read($sql) == 0) {
        $this->Eliminar();
      } else {
        $this->query = false;
        $this->PrintJSON(2);
      }
      
    } else {
      $this->PrintJSON('error');
    }
  }

  private function Eliminar()
  {
    if ($this->query == true) {
      $sql = "DELETE FROM areas WHERE areas.areas_id = '".$this->datos['areaId']."'";

      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
      
    } else {
      $this->PrintJSON('error');
    }

    $this->query = false;
  }
  
  private function PrintJSON($stringJson)
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }

}

$eliminarArea = new EliminarArea();

if (isset($_POST['datos'])) {
  $eliminarArea->RecibirDatos($_POST['datos']);
  echo $eliminarArea->resultado;
}

?>