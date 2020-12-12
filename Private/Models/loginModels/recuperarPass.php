<?php 
/** - Comentario: Archivos requeridos - **/
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");
/* - Comentario Archivos para enviar correo - */
require_once("../../Libs/PHPMailer/Exception.php");
require_once("../../Libs/PHPMailer/OAuth.php");
require_once("../../Libs/PHPMailer/PHPMailer.php");
require_once("../../Libs/PHPMailer/POP3.php");
require_once("../../Libs/PHPMailer/SMTP.php");
require_once("../../Libs/PHPMailer/enviarCorreo.php");
/**
*
* Comentario: Clase que se encarga de recuperar la contraseña
*
**/
class RecuperarPass extends ModelFather
{
  private $datos;
  public $resultado;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->ProcesarDatos();
  }

  private function ProcesarDatos()
  {
    switch ($this->datos['accion']) {
      case 'buscarCorreo':
        $this->ValidarCorreo();
        break;
      case 'recuperarPass':
        $this->Recuperar();
        break;
    }
  }

  private function ValidarCorreo()
  {
    if (preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$this->datos['input'])) {
      $this->BuscarCorreo();
    } else {
      $this->PrintJSON(0);
    }
  }
 
  private function BuscarCorreo()
  {
    $sql = "SELECT usuarios.user, usuarios.usuario_id FROM usuarios INNER JOIN clientes ON usuarios.usuario_id=clientes.usuario_id WHERE usuarios.email = '" . $this->datos['input'] . "'";

    $this->PrintJSON($this->Read($sql));
  }
  
  private function setFecha(){
    /* - Comentario: Fecha de recuperacion - */    
    ini_set("date.timezone","America/El_Salvador");
    $y = date("Y");
    $d = date("d") + 1;
    $m = date("m");
    
    if ($d > 31) {
      $m = $m + 1;
      $d = 1;
    }

    if ($m == 02 && $d > 28) {
      $m + 1;
      $d = 1;
    }
    return $y."-".$m."-".$d;
  }
  
  private function Recuperar()
  {
    /* - Comentario: Se genra el codigo - */
    $codigo = $this->GenerarPass();
    /* - Comentario: Creamos la consulta - */
    $sql = "UPDATE `usuarios` SET `codigo_pass`='".$codigo."',`fech_pass`='".$this->setFecha()."' WHERE `usuario_id`='".$this->datos['userID']."'";
    
    if ($this->Query($sql)) {
      $contenido = "Estimado/a usuario ".$this->datos['user']." a hecho una solicitud para recuperar contraseña, el codigo para cambier la contraseña es: ".$codigo." tiene 24 horas para cambiar la contraseña solo de <a href=\"https://notariesdigital.000webhostapp.com/Public/views/ServiciosView/restaurarPass.php?_id=".$this->Encryption($this->datos['userID'])."\">Click Aqui</a> para recuperar sus contraseña.";

      $contenido = wordwrap($contenido, 70, "\r\n");
      
      $this->PrintJSON(EnviarEmail('Recuperar Contraseña',$this->datos['correo'],$contenido));
    } else {
      $this->PrintJSON(0);
    }
    
  }
    
  private function PrintJSON($stringJson) 
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$recuperarPass = new RecuperarPass();

if (isset($_POST['datos'])) {
  $recuperarPass->RecibirDatos($_POST['datos']);
  echo $recuperarPass->resultado;
}

?>