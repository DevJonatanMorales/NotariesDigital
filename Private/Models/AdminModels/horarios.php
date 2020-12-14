<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class Horarios extends ModelFather
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
        $this->Guardar();
        break;
      
      case 'modificar':
        $this->query = true;
        $this->Modificar();
        break;

      case 'eliminar':
        $this->query = true;
        $this->Eliminar();
        break;

      case 'mostrar':
        $this->query = true;
        $this->Mostrar();
        break;
    }
  }

  private function Mostrar()
  {
    if ($this->query == true) {
      $sql = "SELECT * FROM `horarios`";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    }
  }

  private function Guardar()
  {
    if ($this->query == true) {
      $sql = "INSERT INTO `horarios` (`turno`, `horario`) VALUES ('".$this->datos['turno']."','".$this->datos['horario']."')";
      // $this->resultado = $sql;
      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
      
      $this->query = false;
    }
  }

  private function Modificar()
  {
    if ($this->query == true) {
      $sql = "UPDATE `horarios` SET `turno`='".$this->datos['turno']."',`horario`='".$this->datos['horario']."' WHERE  `horario_id`='".$this->datos['horarioId']."'";

      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
      
      $this->query = false;
    }
  }

  private function Eliminar()
  {
    if ($this->query == true) {
      $sql = "DELETE FROM `horarios` WHERE `horario_id`='".$this->datos['horarioId']."'";

      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }

      $this->query  = false;
    }
  }
  
  private function PrintJSON($stringJson)
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$horarios = new Horarios();

if (isset($_POST['datos'])) {
  $horarios->RecibirDatos($_POST['datos']);
  echo $horarios->resultado;
}

?>