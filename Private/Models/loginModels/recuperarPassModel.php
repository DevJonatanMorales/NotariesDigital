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
class RecuperarPassModel extends ModelFather
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
      case 'buscarPass':
        $this->BuscarPass();
      break;
      case 'cambiarPass':
        $this->CambiarPass();
      break;
      case 'recuperarPass':
         $this->RecuperarPass();
        break;
      case 'restaurarPass':
        $this->ValidarPass();
        break;
      case 'valUser':
        $this->ValidarId();
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

  private function ValidarId(){
    if (preg_match("/^[0-9]{1,2}$/",$this->datos['userId'])) {
      $this->BuscarUser();
    } else {      
      $this->PrintJSON(0);
    }
    
  }

  private function CambiarPass(){
    session_start();
    $pass = $this->Encryption($this->datos['confClave']);
    $sql = "UPDATE `usuarios` SET `pass`='".$pass."' WHERE `usuario_id`= '".$_SESSION['USER_ID']."'";

    if ($this->Query($sql) == true) {
      $this->PrintJSON(['result' => 1]);
    } else {
      $this->PrintJSON(['result' => 0]);
    }

  }
  
  private function BuscarPass()
  {
    session_start();
    
    $sql = "SELECT usuarios.pass FROM `usuarios` WHERE usuarios.usuario_id = '".$_SESSION['USER_ID']."'";
    $pass = $this->Read($sql);
    $this->PrintJSON($this->Decryption($pass[0]['pass']));
  }

  private function BuscarUser(){
    $sql = "SELECT usuarios.codigo_pass, usuarios.fech_pass FROM `usuarios` WHERE usuarios.usuario_id = '".$this->datos['userId']."'";
    $this->PrintJSON($this->Read($sql));
  }
  
  private function BuscarCorreo()
  {
    $sql = "SELECT usuarios.user, usuarios.usuario_id FROM usuarios INNER JOIN clientes ON usuarios.usuario_id=clientes.usuario_id WHERE usuarios.email = '" . $this->datos['input'] . "'";

    $this->PrintJSON($this->Read($sql));
  }

  private function RecuperarPass()
  {
    /* - Comentario: Se genra el codigo - */
    $codigo = $this->GenerarPass();
    /* - Comentario: Fecha de recuperacion - */
    ini_set("date.timezone","America/El_Salvador");
    $fecha = date("Y")."-".date("m")."-".(date("d") + 1)." ".date("g:i");
    /* - Comentario: Creamos la consulta - */
    $sql = "UPDATE `usuarios` SET `codigo_pass`='".$codigo."',`fech_pass`='".$fecha."' WHERE `usuario_id`='".$this->datos['userID']."'";
    
    if ($this->Query($sql)) {
      
      $contenido = "Estimado/a usuario ".$this->datos['user']." a hecho una solicitud para recuperar contraseña, el codigo para cambier la contraseña es: ".$codigo." tiene 24 horas para cambiar la contraseña solo de <a href=\"https://notariesdigital.000webhostapp.com/Public/views/ServiciosView/restaurarPass.php?_id=".$this->datos['userID']."\">Click Aqui</a> para recuperar sus contraseña.";

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


$recuperarPass = new RecuperarPassModel();

if (isset($_POST['datos'])) {
  $recuperarPass->RecibirDatos($_POST['datos']);
  echo $recuperarPass->resultado;
} else {
  echo json_encode("hola");
}
?>