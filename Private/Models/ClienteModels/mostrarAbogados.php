<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class MostrarAbogados extends ModelFather
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
      $sql = "SELECT usuarios.foto, abogados.abogado_id, abogados.nombres, abogados.apellidos FROM usuarios INNER JOIN abogados ON usuarios.usuario_id=abogados.usuario_id ";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    }
  }

  private function Buscar()
  {
    if ($this->query == true) {
      $sql = "SELECT abogado_id, nombres, apellidos FROM `abogados` WHERE LIKE '%".$this->datos['sql']."%' OR LIKE '%".$this->datos['sql']."%'";
      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$mostrarAbogados = new MostrarAbogados();

if (isset($_POST['datos'])) {
  $mostrarAbogados->RecibirDatos($_POST['datos']);
  echo $mostrarAbogados->resultado;
} 

?>