<?php 
class conexionC{
	public $con="";

	public function _conexion(){				
		try
		{
			$this->con=new PDO('mysql:=localhost;dbname=contratos','root', '');
			return $this->con;
		}catch(PDOException $e){
			echo 'Falló la conexión: ' . $e->getMessage();
		}
	}
}