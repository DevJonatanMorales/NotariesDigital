<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class ModificarArea extends ModelFather
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
      case 'modificar':
        $this->query = true;
        $this->Modificar();
        break;
      
      default:
        $this->PrintJSON(['result'=>'error']);
        break;
    }
  }

  private function Modificar()
  {
    if ($this->query == true) {
      $sql = "UPDATE `areas` SET `nom_areas`='".$this->datos['area']."' WHERE `areas_id`='".$this->datos['areaId']."'";
      
      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
      
    } else {
      $this->PrintJSON(['result'=>'error']);
    }
    $this->query = false;
  }

  private function PrintJSON($stringJson)
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$modificarArea = new ModificarArea();

if (isset($_POST['datos'])) {
  $modificarArea->RecibirDatos($_POST['datos']);
  echo $modificarArea->resultado;
}
?>