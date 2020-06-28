<?php
class conexion{

	public $con="";

	public function _conexion(){				
		try
		{
			$this->con=new PDO('mysql:=localhost;dbname=licitaciones','root', '');
			return $this->con;
		}catch(PDOException $e){
			echo 'Falló la conexión: ' . $e->getMessage();
		}
	}
	public function _conexionD1(){				
		try
		{
			$this->con=new PDO('mysql:=localhost;dbname=requejudiricos','root', '');
			return $this->con;
		}catch(PDOException $e){
			echo 'Falló la conexión: ' . $e->getMessage();
		}
	}
	public function _consultastablasGenerales($tabla){
		$pdo=new conexion;
		$query=$pdo->_conexion();
		$execute=$query->query("SELECT * FROM $tabla");
		return $execute;
	}
	public function _consultatablaEjecutivos(){
		$pdo=new conexion;
		$query = $pdo->_conexion();
		// Aqui Vamos a poner el inner Join pues.

		$execute=$query->query("SELECT ejecutivos.id_ejecutivo,ejecutivos.nombre,ejecutivos.consultor,sect.nombre_concepto,region.nombre_reg FROM ejecutivos
		left outer JOIN sect on ejecutivos.id_sector = sect.id
		left outer JOIN region on ejecutivos.id_regional = region.id
		order by ejecutivos.id_ejecutivo asc");

		return $execute;

	}

	public function insertarRegistros($tabla,$campos){
		$id=1;

					//print_r($campos);

		/*se consulta y se describen los campos de la bd*/
		$pdo=new conexion;
		$query=$pdo->_conexion();
		$rs=$query->query("SELECT * FROM $tabla");
		$describe	=   $query->query("DESCRIBE $tabla");
		/* se llena el vector con los campos de la bd*/
		$v_colum=array();
		$i=1;
		foreach($describe as $row){						
			$v_colum[$i]=$row['Field'];
			$i=$i+1;
		}
		$consultas 		= " INSERT INTO $tabla (";

		foreach($v_colum as $Kcampo){
			$consultas.= $Kcampo.',';				  
		}

		$consultas= substr($consultas,0,-1).")";
		$consultas.= " VALUES (".'null,';			  
		foreach($campos as $valores){
			$consultas.="'".$valores."'".", ";
		}
		$consultas	= substr($consultas,0,-2).")";
		$query->query($consultas);
		echo $consultas;
	}

	public function insertar($tabla,$nombre,$valido_id){
		$pdo=new conexion;
		$query=$pdo->_conexion();
		$consultas = "INSERT INTO $tabla (nombre_sp,valido_id)  VALUES ('$nombre',$valido_id)";
		$query->query($consultas);

	}
	public function _comboboxdinamicoR($tabla,$campo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		$campo_id='<select class="form-control"name='.$campo.' id='.$campo.' required>';
		$campo_id.='<option value="9"> Pendiente </option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';     
		}
		$campo_id.='</select>';

		return $campo_id;
	}
	public function _comboboxdinamicoC($tabla,$campo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		$campo_id='<select class="form-control"name='.$campo.' id='.$campo.' required>';
		$campo_id.='<option value="14"> Pendiente </option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';     
		}
		$campo_id.='</select>';

		return $campo_id;
	}
	public function _comboboxdinamicoP($tabla,$campo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		$campo_id='<select class="form-control"name='.$campo.' id='.$campo.' required>';
		$campo_id.='<option value="5"> Pendiente </option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';     
		}
		$campo_id.='</select>';

		return $campo_id;
	}
	public function _comboboxdinamicoSC($tabla,$campo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		$campo_id='<select class="form-control"name='.$campo.' id='.$campo.' required>';
		$campo_id.='<option value="3"> Pendiente </option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';     
		}
		$campo_id.='</select>';

		return $campo_id;
	}
	public function _comboboxdinamico($tabla,$campo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		$campo_id='<select class="form-control"name='.$campo.' id='.$campo.' required>';
		$campo_id.='<option value=""> Seleccione </option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';     
		}
		$campo_id.='</select>';

		return $campo_id;
	}

	public function _comboboxdinamic_campos($tabla,$campo,$id,$campo_resultado,$idCampo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		
		$rs_2=$execute->query("SELECT TBG.".$campo." FROM seguimiento SGI LEFT OUTER JOIN $tabla TBG ON SGI.".$campo_resultado." = TBG.id WHERE SGI.id='$id'");
		$campo_id='<select class="form-control"   name='.$campo.' id='.$campo.' required>';
		foreach($rs_2 as $key)
		{
			$id_principal =$key[$campo_resultado];			
		}
		$campo_id.='<option value="'.$idCampo.'">'.$id_principal.'</option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';                                                                                  
		}
		$campo_id.='</select>';
		
		return $campo_id;
	}



	public function _comboboxdinamic_camposO($tabla,$campo,$id,$campo_resultado,$idCampo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla");
		
		$rs_2=$execute->query("SELECT TBG.".$campo." FROM oportunidades SGI LEFT OUTER JOIN $tabla TBG ON SGI.".$campo_resultado." = TBG.id WHERE SGI.id='$id'");
		$campo_id='<select class="form-control"   name='.$campo.' id='.$campo.' required>';
		foreach($rs_2 as $key)
		{
			$id_principal =$key[$campo_resultado];			
		}
		$campo_id.='<option value="'.$idCampo.'">'.$id_principal.'</option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';                                                                                  
		}
		$campo_id.='</select>';
		
		return $campo_id;
	}

	public function soporte2($tabla,$campo,$id,$campo_resultado,$idCampo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla where valido_id = '1'");
		
		$rs_2=$execute->query("SELECT TBG.".$campo." FROM seguimiento SGI LEFT OUTER JOIN $tabla TBG ON SGI.".$campo_resultado." = TBG.id WHERE SGI.id='$id'");
		$campo_id='<select class="form-control"   name='.$campo.' id='.$campo.' required>';
		foreach($rs_2 as $key)
		{
			$id_principal =$key[$campo_resultado];			
		}
		$campo_id.='<option value="'.$idCampo.'">'.$id_principal.'</option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';                                                                                  
		}
		$campo_id.='</select>';
		
		return $campo_id;
	}

		public function _soportes($tabla,$campo){
		$i=1;
		$pdo=new conexion;
		$execute=$pdo->_conexion();
		$rs=$execute->query("SELECT * FROM $tabla where valido_id = '1'");
		$campo_id='<select class="form-control"name='.$campo.' id='.$campo.' required>';
		$campo_id.='<option value=""> Seleccione </option>';
		foreach($rs as $key)
		{
			$campo_id.='<option  value="'.$key['id'].'">'.$key[$campo].'</option>';
		}
		$campo_id.='</select>';                                                   
		return $campo_id;
	}

}

?>