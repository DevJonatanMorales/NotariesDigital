<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class AgendarCita extends ModelFather
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
      case 'agendar':
        $this->query = true;
        $this->Agendar();
        break;
      
      case 'cancelar':
        $this->query = true;
        $this->Cancelar();
        break;
    }
  }

  private function Agendar()
  {
    if ($this->query == true) {
      session_start();
      $sql = "INSERT INTO `agendar_cita`(`servicio_id`, `abogado_id`, `usuario_id`, `fecha`, `horario_id`, `comentario`) VALUES ('".$this->datos['servicioId']."','".$this->datos['abogadoId']."','".$_SESSION['USER_ID']."','".$this->datos['fecha']."','".$this->datos['horarioId']."','".$this->datos['comentario']."')";

      if ($this->Query($sql) == true) {
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }

      $this->query = false;
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$agendarCita = new AgendarCita();

if (isset($_POST['datos'])) {
  $agendarCita->RecibirDatos($_POST['datos']);
  echo $agendarCita->resultado;
}
?>