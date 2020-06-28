<?php 
class conexionCert{

	public static function conectar() {
		try {
			$cnn = new PDO('mysql:=localhost;dbname=certificaciones','root', '');
			$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $cnn;
		} catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}