<?php 
/** - Comentario: Archivos requeridos - **/
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");
/**
*
* Comentario: Clase que se encarga de recuperar la contraseña
*
**/
class RecuperarPass extends ModelFather
{
  private $datos;
  public $resultado;
  private $fecha = false;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->ProcesarDatos();
  }

  private function ProcesarDatos()
  {
    switch ($this->datos['accion']) {
      case 'restaurarPass':
        $this->ValidarPass();
        break;
      case 'valUser':
        $this->ValidarId();
        break;
    }
  }
  
  private function ValidarId()
  {
    
    if (preg_match("/^[0-9]{1,2}$/",$this->Decryption($this->datos['userId']))) {
      $this->BuscarUser();
    } else {      
      $this->PrintJSON(['result'=>'id invalid']);
    }
    
  }
  
  private function BuscarUser()
  {
    ini_set("date.timezone","America/El_Salvador");
    $y = date("Y");
    $d = date("d");
    $m = date("m");
    $fechaActual = $y."-".$m."-".$d;
    
    $sql = "SELECT usuarios.usuario_id, usuarios.codigo_pass, usuarios.fech_pass FROM `usuarios` WHERE usuarios.usuario_id = '".$this->Decryption($this->datos['userId'])."'";
    $query = $this->Read($sql);

    if ($query !=0) {
      if ($fechaActual <= $query[0]['fech_pass']) {
        $this->fecha = true;
      } 

      $respon = array(
        'userID'=> $query[0]['usuario_id'],
        'fecha'=> $this->fecha,
        'codigo'=> $query[0]['codigo_pass']
      );
      
      $this->PrintJSON($respon);
    } else {
      $this->PrintJSON($query);
    }
  }

  private function ValidarPass(){
    if (preg_match("/^[a-zA-Z0-9]{6,10}$/",$this->datos['pass'])) {
      $this->Restaurar();
    } else {
      $this->PrintJSON(['result' => 0]);
    }    
  }
 
  private function Restaurar(){
    $pass = $this->Encryption($this->datos['pass']);
    $sql = "UPDATE `usuarios` SET `pass`='".$pass."',`codigo_pass`=NULL,`fech_pass`='0000-00-00' WHERE `usuario_id`='".$this->datos['id']."'";
    $this->resultado = $sql;
    $this->PrintJSON($this->Query($sql));
    
    if ($this->Query($sql) == true) {
      $this->PrintJSON(['result' => 1]);
    } else {
      $this->PrintJSON(['result' => 0]);
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