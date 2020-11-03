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

    $this->resultado = $this->Query($sql);
  }
  
  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$cambiarFoto = new CambiarFoto();

if (isset($_POST['accionActualizarFoto'])) {
  $nomTemp = $_FILES['foto']['tmp_name'];
  $nomFoto = $_FILES['foto']['name'];

  $datos = array(
    'accion'=>'foto',
    'nomFoto'=> $nomFoto
  );

  $cambiarFoto->RecibirDatos($datos);
  if ($cambiarFoto->resultado == true) {
      move_uploaded_file($nomTemp,'../../../Public/img/'.$nomFoto);
      $_SESSION['FOTO_USER'] = $nomFoto;
      header("Location: ../../../Public/views/ClienteView/cambiarFoto.php?alert=1");
  } else {
      header("Location: ../../../Public/views/ClienteView/cambiarFoto.php?alert=2");
  }

}

?>