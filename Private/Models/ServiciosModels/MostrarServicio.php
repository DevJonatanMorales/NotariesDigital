<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class BuscarServicio extends ModelFather
{
  public $resultado;
  private $datos;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

  private function Accion()
  {
    switch ($this->datos['accion']) {
      case 'buscar':
        $this->BuscarServicios();
        break;
      
      case 'mostrar':
        $this->MostrarServicios();
        break;
      case 'buscarTramites':
        $this->BuscarTramites();
        break;
      
      case 'mostrarTramites':
        $this->MostrarTramites();
        break;
    }
  }

  private function MostrarServicios()
  {
    $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, areas.nom_areas FROM areas INNER JOIN servicios on areas.areas_id=servicios.areas_id WHERE servicios.estado_servicio = '1'";

    $this->PrintJSON($this->Read($sql));
  }

  private function BuscarServicios()
  {
    # code...
    $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, areas.nom_areas FROM areas INNER JOIN servicios on areas.areas_id=servicios.areas_id WHERE servicios.estado_servicio ='1' AND servicios.nom_servicio LIKE '%". $this->datos['sql'] . "%' OR areas.nom_areas LIKE '%". $this->datos['sql'] . "%'";

    $this->PrintJSON($this->Read($sql));
  }

  private function MostrarTramites()
  {
    $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, categorias.categoria, servicios.des_servicio FROM categorias INNER JOIN servicios on categorias.categoria_id=servicios.categoria_id  WHERE categorias.categoria_id = '".$this->datos['categoria']."'";

    $this->PrintJSON($this->Read($sql));
  }
  
  private function BuscarTramites(){
    $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, categorias.categoria, servicios.des_servicio FROM categorias INNER JOIN servicios on categorias.categoria_id=servicios.categoria_id  WHERE categorias.categoria_id = '".$this->datos['categoria']."' AND servicios.nom_servicio LIKE '%". $this->datos['sql'] . "%'";

    $this->PrintJSON($this->Read($sql));
  }
  
  private function PrintJSON($stringJson) {
    header('Content-Type: application/json');
    $this->resultado = json_encode($stringJson);
  }

}

$BuscarServicio = new BuscarServicio();

if(isset($_POST['datos']))
{
  $BuscarServicio->RecibirDatos($_POST['datos']);
  echo $BuscarServicio->resultado;
}

?>