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
        //$this->resultado = $this->datos;
        $this->Proceso();
    }

    private function Proceso()
    {
        switch ($this->datos['accion']) 
        {
            case 'buscarUser':
                $this->BuscarUsuario($this->datos['query']);
                break;
            
            case 'ingresar':
                $this->ValidarDatos($this->datos['query']);
                break;
            
            default:
                echo json_encode("error");
                break;
        }
    }
    private function ValidarDatos()
    {
    if (preg_match("/^[0-9]{7}$/", $this->datos['usuario']) && preg_match("/^[a-z]{3}[0-9]{5}$/", $this->datos['password'])) 
    {
        $this->validacion = "correcto";
    } 

    $this->ProcesarDatos();
    }

    private function ProcesarDatos()
    {
        if ($this->validacion === 'correcto')
        {
            $sql = "";
        } 
        else
        {
            $this->resultado = array("resultado" => 0);
        }

    }

    private function BuscarUsuario()
    {
        $sql = "SELECT usuarios.user FROM `usuarios` WHERE usuarios.user = '" . $this->datos['query'] . "'";
        $this->resultado = $this->Read($sql);
        
    }
}
/*
echo 'Hola :)';
$datos = array('accion' => 'buscarUser', 'sql' => 'yona50');
$login = new LoginModel();
$login->RecibirDatos($datos);
print_r($login->resultado);
*/
if(isset($_POST['datos']))
{
    $login = new LoginModel();
    $login->RecibirDatos($_POST['datos']);
    print_r($login->resultado);

    // echo $_POST['datos']['sql'];
}
else
{
    echo json_encode('error :(');
}

?>