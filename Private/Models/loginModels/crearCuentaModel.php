<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");
require_once("../../Libs/PHPMailer/class.phpmailer.php");
require_once("../../Libs/PHPMailer/class.smtp.php");

class CrearCuentaModel extends ModelFather
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
    
  }
}

?>