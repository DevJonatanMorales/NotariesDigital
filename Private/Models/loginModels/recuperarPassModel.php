<?php 
/** - Comentario: Archivos requeridos - **/
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");
require_once("../../Libs/PHPMailer/PHPMailerAutoload.php");
/**
*
* Comentario: Clase que se encarga de recuperar la contraseña
*
**/
class RecuperarPassModel extends ModelFather
{
  private $datos;
  public $resultado;

  public function RecibirDatos($datos){
    $this->datos = $datos;
    $this->ProcesarDatos();
  }

  private function ProcesarDatos(){
    switch ($this->datos['accion']) {
      case 'buscarCorreo':
        $this->ValidarCorreo();
        break;
      
      case 'recuperarPass':
         $this->ValidarPass();
        break;
      case 'restaurarPass':
        $this->ValidarPass();
        break;
    }
  }

  private function ValidarCorreo(){
    if (preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$this->datos['input'])) {
      $this->BuscarCorreo();
    } else {
      $this->resultado = 0;
    }
  }

  private function BuscarCorreo(){
    $sql = "SELECT usuarios.usuario_id FROM `usuarios` WHERE usuarios.email = '" . $this->datos['input'] . "'";
    $this->resultado = $this->Read($sql);
  }
}

if (isset($_POST['datos'])) {
  $recuperarPass = new RecuperarPassModel();
  $recuperarPass->RecibirDatos($_POST['datos']);
  print_r(json_encode($recuperarPass->resultado));
} else {
  echo "hola";
}
?>