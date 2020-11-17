<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class EditarPerfil extends ModelFather
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
      case 'editar':
        $this->EditarUser();
        break;
    }
  }

  private function EditarUser()
  {
    session_start();
    
    $sqlUser = "UPDATE `usuarios` SET `user`='".$this->datos['user']."',`email`='".$this->datos['correo']."' WHERE `usuario_id` = '".$_SESSION['USER_ID']."'";

    if ($this->Query($sqlUser) == true) {
      $sqlCLiente = "UPDATE `abogados` SET `telefono`='".$this->datos['telefono']."',`direccion`='".$this->datos['direccion']."' WHERE `usuario_id` = '".$_SESSION['USER_ID']."'";

      if ($this->Query($sqlCLiente) == true) {
        $this->PrintJSON(['result' => 1]);
      } else {
        $this->PrintJSON(['result' => 0]);
      }
    } else {
      $this->PrintJSON(['result' => 0]);
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$editarPerfil = new EditarPerfil();

if(isset($_POST['datos'])) {
  $editarPerfil->RecibirDatos($_POST['datos']);
  echo $editarPerfil->resultado;    
}

?>