<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class NuevoServicio extends ModelFather
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
      case 'nuevo':
        $this->query = true;
        $this->Nuevo();
        break;
      
      case 'getArea':
        $this->query = true;
        $this->Areas();
      break;
        
      default:
        # code...
        break;
    }
  }

  private function Areas()
  {
    if ($this->query == true) {
      $sql = "SELECT * FROM `areas` ORDER BY areas.areas_id DESC";
      $this->PrintJSON($this->Read($sql));
    } else {
      $this->PrintJSON(['result'=>'error']);
    }
    
  }

  private function Nuevo()
  {
    if ($this->query == true) {
      $sql = "INSERT INTO `servicios`(`areas_id`, `nom_servicio`) VALUES ('".$this->datos['areas_id']."','".$this->datos['servicio']."')";

      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
      
      $this->query = false;   
    } else {
      $this->PrintJSON(['result'=>'error']);
    }    
  }

  private function PrintJSON($stringJson)
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$nuevoServicio = new NuevoServicio();

if (isset($_POST['datos'])) {
  $nuevoServicio->RecibirDatos($_POST['datos']);
  echo $nuevoServicio->resultado;
}

?>