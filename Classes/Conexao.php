<?php 
	
	//Classe que gerencia a conexão com o banco de dados utilizando o padrão singleton.
	class Conexao{

		private static $instace;

		public static function getConn(){
			if(!isset(self::$instace)){
				self::$instace = new \PDO('mysql:host=localhost;dbname=porto1', 'root', 
					'', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			}
		
			return self::$instace;			
		}
	}

 ?>