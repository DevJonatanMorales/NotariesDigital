<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class ValUser extends ModelFather
{
  private $datos;
  private $validacion = 'incorrecto';
  public $resultado;

  public function RecibirDatos($datos)
  {
      $this->datos = $datos;
      $this->Proceso();
  }

  private function Proceso()
  {
    switch ($this->datos['accion']) 
    {
      case 'buscarUser':
        $this->BuscarUsuario();
        break;
                      
      default:
        echo json_encode(['result' => 'error']);
        break;
    }
  }

  private function BuscarUsuario()
  {
    $sql = "SELECT usuarios.user FROM `usuarios` WHERE usuarios.user = '" . $this->datos['query'] . "'";
    
    $this->PrintJSON($this->Read($sql));
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$valUser = new ValUser();
if(isset($_POST['datos'])) {
  $valUser->RecibirDatos($_POST['datos']);
  echo $valUser->resultado;    
}

?>