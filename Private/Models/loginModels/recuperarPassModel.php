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
         $this->RecuperarPass();
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
    $sql = "SELECT clientes.nombres, usuarios.usuario_id FROM usuarios INNER JOIN clientes ON usuarios.usuario_id=clientes.usuario_id WHERE usuarios.email = '" . $this->datos['input'] . "'";
    $this->resultado = $this->Read($sql);
  }

  private function RecuperarPass(){
    /* - Comentario: Se genra el codigo - */
    $codigo = $this->GenerarPass();
    
    ini_set("date.timezone","America/El_Salvador");
    $fecha = date("Y")."-".date("m")."-".(date("d") + 1)." ".date("g:i");
    /* - Comentario: Creamos la consulta - */
    $sql = "UPDATE `usuarios` SET `codigo_pass`='".$codigo."',`fech_pass`='".$fecha."' WHERE `usuario_id`='".$this->datos['userID']."'";
    
    if ($this->Query($sql)) {
      
      $contenido = "Estimado/a ".$this->datos['nombre']." a hecho una solicitud para recuperar contraseña, el codigo para cambier la contraseña es: ".$codigo." tiene 24 horas para cambiar la contraseña solo de <a href=\"http://localhost:8080/NotariesDigital/Public/views/ServiciosView/recuperar.php\">Click Aqui</a>. Notaries Digital.";

      $contenido = wordwrap($contenido, 70, "\r\n");
      
      if ($this->resultado = EnviarEmail('Bienvenido','h28631053@gmail.com',$contenido)) {
        $this->resultado = ['resultato' => 1];
      } else {
        $this->resultado = ['resultato' => 0];
      }
    } else {
      $this->resultado = ['resultado' => 0];
    }
  }
}

if (isset($_POST['datos'])) {
  $recuperarPass = new RecuperarPassModel();
  $recuperarPass->RecibirDatos($_POST['datos']);
  print_r(json_encode($recuperarPass->resultado));
} else {
  echo json_encode("hola");
}
?>