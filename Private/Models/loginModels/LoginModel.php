<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class LoginModel extends ModelFather
{
    private $datos;
    private $validacion = 'incorrecto';
    public $resultado;

    public function RecibirDatos($datos)
    {
        $this->datos = $datos;
        $this->Proceso();
    }

    private function Proceso()
    {
        switch ($this->datos['accion']) 
        {
            case 'buscarUser':
                $this->BuscarUsuario();
                break;
            
            case 'ingresar':
                $this->ValidarDatos();
                break;
            
            default:
                echo json_encode("error");
                break;
        }
    }

    private function ValidarDatos()
    {
    if (
        preg_match("/^[a-zA-Z0-9\_\-]{3,10}$/", $this->datos['user']) && 
        preg_match("/^[a-zA-Z0-9]{6,10}$/", $this->datos['pass'])
        ) {
        $this->validacion = "correcto";
    } 

    $this->ProcesarDatos();
    }

    private function ProcesarDatos()
    {
        if ($this->validacion === 'correcto') {
            $pass = $this->EncriptarPass($this->datos['pass']);
            $sql = "SELECT usuarios.usuario_id, usuarios.tipo_userid FROM usuarios WHERE usuarios.user = '".$this->datos['user']."' AND usuarios.pass = '".$pass."'";
            
            $this->PrintJSON($this->Read($sql));       
        } else {
            $this->resultado = array("resultado" => 0);
        }

    }

    private function BuscarUsuario()
    {
        $sql = "SELECT usuarios.user FROM `usuarios` WHERE usuarios.user = '" . $this->datos['query'] . "'";
        $this->resultado = $this->Read($sql);
        
    }

    private function PrintJSON($stringJson) {
        header('Content-Type: application/json');
        $this->resultado = json_encode($stringJson);
    }
}

$login = new LoginModel();
if(isset($_POST['datos'])) {
    $login->RecibirDatos($_POST['datos']);
    echo $login->resultado;    
}

?>