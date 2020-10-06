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
        $this->ValidarDatos();
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
}


$conexion = new Conection();

$sql = 'SELECT * FROM `tipos_usuarios`';
print_r($conexion->Read($sql));
?>