<?php 
/**
 * Clase modelo
 */
class ModelFather extends Conection
{
	protected $result;

	protected function Read($sql)
	{
		$this->OpenConection();

		$consulta = $this->conn->query($sql);

		if ($consulta->num_rows > 0) 
		{

			if ($consulta->num_rows === 1) 
			{
				$this->result = $consulta->fetch_object();
			} 
			else if ($consulta->num_rows > 0)
			{
				while($row = $consulta->fetch_object()) 
				{
                   $this->result[] = $row;
                }
			}
			
		} else {
			$this->result = 0;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function LastID($sql)
	{
		$this->result = 0;

		if ($this->conn->query($sql) === TRUE) {
			$last_id = $this->conn->insert_id;
			$this->result = $last_id;
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function Query($sql)
	{
		
		if ($this->conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
		} 
		else
		{
			 echo "Error: " . $sql . "<br>" . $conn->error;
		}

		return $this->result;
		$this->conn->close();
	}
	
	protected function EncriptarPass($clave)
	{
		$nivel_0 = strip_tags($clave);
		$nivel_1 = md5 ($nivel_0);
		$nivel_2 = crc32($nivel_1); 
		$nivel_3 = crypt($nivel_2, "xtemp"); 
		$clave_encriptada = sha1("xtemp".$nivel_3);
		
		return $clave_encriptada;
	}

	protected function calcularEdad($fecha) 
	{
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}
/*
	public function GenerarPass() 
	{//obtenemos la contraseña
		$key = 'pav';
		$pattern = '0123456789';
		$max = strlen($pattern)-1;
		for($i=0;$i < 5;$i++) $key .= $pattern{mt_rand(0,$max)};		   
		return $key;
	}
*/
}

?>