<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class ModificarServicio extends ModelFather
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
      $sql = "UPDATE `servicios` SET `areas_id`='".$this->datos['area']."',`nom_servicio`='".$this->datos['servicio']."' WHERE `servicios_id`='".$this->datos['servicioId']."'";
      
      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
      
    } else {
      $this->PrintJSON(0);
    }
    $this->query = false;
  }

  private function PrintJSON($stringJson)
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }

}

$modificarServicio = new ModificarServicio();

if (isset($_POST['datos'])) {
  $modificarServicio->RecibirDatos($_POST['datos']);
  echo $modificarServicio->resultado;
} 

?>