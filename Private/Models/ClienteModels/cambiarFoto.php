<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class CambiarFoto extends ModelFather
{
  
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
      case 'foto':
        $this->upFoto();
        break;
    }
  }

  private function upFoto()
  {
    session_start();    
    $sql = "UPDATE `usuarios` SET `foto`='".$this->datos['nomFoto']."' WHERE `usuario_id`='".$_SESSION['USER_ID']."'";

    if ($this->Query($sql) == true) {
      if (move_uploaded_file($this->datos['tmpName'], "../../../Public/img/".$this->datos['nomFoto'])) {
        $_SESSION['FOTO_USER'] = $this->datos['nomFoto'];
        $this->PrintJSON(1);
      } else {
        $this->PrintJSON(0);
      }
    } else {
      $this->PrintJSON(0);
    }
    
  }
  
  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$cambiarFoto = new CambiarFoto();

if (isset($_FILES["file"])) {
  if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")) 
  {

    $datos = array(
      'accion'=>'foto',
      'nomFoto'=>$_FILES['file']['name'],
      'tmpName'=>$_FILES["file"]["tmp_name"]
    );

    $cambiarFoto->RecibirDatos($datos);
    echo $cambiarFoto->resultado;

  }
  
}

?>