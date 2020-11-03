<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class CambiarClave extends ModelFather
{
  
  private $validacion = 'incorrecto';
  private $datos;
  public  $resultado;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

  private function Accion()
  {
    switch ($this->datos['accion']) {
      case 'upClave':
        $this->CambiarPass();
        break;
      case 'buscarPass':
        $this->BuscarPass();
        break;
    }
  }

  private function BuscarPass(){
    session_start();

    $sql = "SELECT pass FROM `usuarios` WHERE usuario_id = '".$_SESSION['USER_ID']."'";
    $pass = $this->Read($sql);
    
    $resultado = $pass[0]['pass'];

    $this->PrintJSON($this->Decryption($resultado));
  }

  private function CambiarPass()
  {
    session_start();
    $pass = $this->Encryption($this->datos['confClave']);
    $sql = "UPDATE `usuarios` SET `pass`='".$pass."' WHERE `usuario_id`= '".$_SESSION['USER_ID']."'";

    if ($this->Query($sql) == true) {
      $this->PrintJSON(['result' => 1]);
    } else {
      $this->PrintJSON(['result' => 0]);
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$cambiarClave = new CambiarClave();

if (isset($_POST['datos'])) {
  $cambiarClave->RecibirDatos($_POST['datos']);
  echo $cambiarClave->resultado;
}

?>