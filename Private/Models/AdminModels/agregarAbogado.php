<?php 
/** - Comentario: Archivos requeridos - **/
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");
/* - Comentario Archivos para enviar correo - */
require_once("../../Libs/PHPMailer/Exception.php");
require_once("../../Libs/PHPMailer/PHPMailer.php");
require_once("../../Libs/PHPMailer/SMTP.php");
require_once("../../Libs/PHPMailer/enviarCorreo.php");

class AgregarAbogado extends ModelFather
{
  private $datos;
  private $validacion = 'incorrecto';
  public $resultado;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->ValidarDatos();
  }

  private function ValidarDatos()
  {
    if(
        preg_match("/^[a-zA-Z0-9\_\-]{3,10}$/",$this->datos['usuario']) && 
        preg_match("/^[a-zA-ZÀ-ÿ\s]{3,15}[a-zA-ZÀ-ÿ\s]{3,15}$/",$this->datos['nombres']) &&
        preg_match("/^[a-zA-ZÀ-ÿ\s]{3,15}[a-zA-ZÀ-ÿ\s]{3,15}$/",$this->datos['apellidos']) &&
        preg_match("/^\d{4}-\d{2}-\d{2}$/",$this->datos['fecha']) &&
        preg_match("/^[0-9]{8,14}$/",$this->datos['telefono']) &&
        preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$this->datos['correo']) &&
        $this->datos['genero'] == 'Femenino' || $this->datos['genero'] == "Masculino" &&
        strlen($this->datos['despacho']) > 50
      ) 
    {
      $this->validacion = 'correcto';
      $this->CrearCuentaAbogado();
    }
  }
  
  private function CrearCuentaAbogado() 
  {    
    if ($this->validacion === 'correcto') {
      $pass = $this->GenerarPass(); // se genera la contraseña.
      $pasEncrip = $this->Encryption($pass); // se encrpita la contraseña
      /** - Comentario: Creamos la consulta de la tb usuario - **/
      $sqlUser = "INSERT INTO `usuarios`(`tipo_userid`, `user`, `pass`, `email`) VALUES ('" . $this->datos['tipoUser'] . "','" . $this->datos['usuario'] . "','" . $pasEncrip . "','" . $this->datos['correo'] . "')";
      /** - Comentario: Insertamos en la tabla usuario - **/
      $usuario_id = $this->LastID($sqlUser);// se inserta en tbUsuaruio y recupera el ID del usuario.

      if ($usuario_id > 0) {
        /* - Comentario: Creamos la consulta de la tb cliente - */
        $sqlAbogado = "INSERT INTO `abogados`(`abogado_id`, `usuario_id`, `nombres`, `apellidos`, `genero`, `fech_naci`, `telefono`, `despacho`) VALUES ('" . $usuario_id . "','" . $usuario_id . "','" . $this->datos['nombres'] . "','" . $this->datos['apellidos'] . "','" . $this->datos['genero'] . "','" . $this->datos['fecha'] . "','" . $this->datos['telefono'] . "','" . $this->datos['despacho'] . "')";
        /** - Comentario: Insertamos en la tabla cliente - **/
        
        if ($this->Query($sqlAbogado) == true) {
          $contenido = "Estimado/a ".$this->datos['nombres']." ".$this->datos['apellidos']." su cuenta ha sido creada con exito, recuerde su usuario es: ". $this->datos['usuario'] ." y su contraseña es: ". $pass .", ya puedes entrar a Notaries Digital dando <a href=\"https://notariesdigital.000webhostapp.com/Public/views/ServiciosView/login.php\">Click Aqui</a>.";

          $contenido = wordwrap($contenido, 70, "\r\n");
          
          $this->PrintJSON(EnviarEmail('Bienvenido',$this->datos['correo'],$contenido));

        } else {
          $this->PrintJSON(['result'=>'error en cliente']);
        }
        
        
      } else {        
        $this->PrintJSON(['result'=>'error en user']);
      }

      $this->validacion = false;
    } else {
      $this->resultado = array("resultado" => "Formulario Invalido");
      $this->PrintJSON($this->resultado);
    }
  }

  private function PrintJSON($stringJson) 
  {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$agregarAbogado = new AgregarAbogado();

if (isset($_POST['Datos'])) {
  $agregarAbogado->RecibirDatos($_POST['Datos']);
  echo $agregarAbogado->resultado;
}

?>