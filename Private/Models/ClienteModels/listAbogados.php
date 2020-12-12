<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class ListAbogado extends ModelFather
{
  public $resultado;
  private $datos;
  private $query = false;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

  private function Accion()
  {
    switch ($this->datos['accion']) {
      case 'mostrar':
        $this->query = true;
        $this->Mostrar();
        break;
      case 'perfil':
        $this->query = true;
        $this->Perfil();
        break;
    }
  }

  private function Mostrar()
  {
    if ($this->query == true) {
      $sql = "SELECT abogados.abogado_id, usuarios.foto, abogados.nombres, abogados.apellidos, abogados.despacho FROM `abogados` INNER JOIN `usuarios` ON abogados.usuario_id=usuarios.usuario_id";
      
      $this->PrintJSON($this->Read($sql));
      $this->query = false;      
    }
  }

  private function Perfil()
  {
    if ($this->query == true) {
      $sql = "SELECT abogados.nombres, abogados.apellidos, abogados.genero, abogados.fech_naci, abogados.telefono, abogados.despacho, usuarios.foto, usuarios.user, usuarios.email FROM usuarios INNER JOIN abogados ON usuarios.usuario_id=abogados.usuario_id WHERE usuarios.usuario_id = '".$this->datos['abogadoId']."'";

      $this->PrintJSON($this->Read($sql));
      $this->query = false;      
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }

}

$listAbogados = new ListAbogado();

if (isset($_POST['datos'])) {
  $listAbogados->RecibirDatos($_POST['datos']);
  echo $listAbogados->resultado;
}

?>