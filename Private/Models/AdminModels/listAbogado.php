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
      case 'buscar':
        $this->query = true;
        $this->Buscar();
        break;
    }
  }

  private function Mostrar()
  {
    if ($this->query == true) {
      $sql = "SELECT abogados.abogado_id, usuarios.foto, abogados.nombres, abogados.apellidos, abogados.telefono, usuarios.email FROM `abogados` INNER JOIN `usuarios` ON abogados.usuario_id=usuarios.usuario_id";
      
      $this->PrintJSON($this->Read($sql));
      $this->query = false;      
    }
  }

  private function Buscar()
  {
    if ($this->query == true) {
      $sql = "SELECT abogados.abogado_id, usuarios.foto, abogados.nombres, abogados.apellidos, abogados.telefono, usuarios.email FROM `abogados` INNER JOIN `usuarios` ON abogados.usuario_id=usuarios.usuario_id WHERE abogados.nombres LIKE '%".$this->datos['sql']."%' OR abogados.apellidos LIKE '%".$this->datos['sql']."%' OR usuarios.email LIKE '%".$this->datos['sql']."%'";
      
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