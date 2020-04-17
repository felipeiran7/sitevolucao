<?php
	
	class Sql extends PDO{
		private $connection;



		public function __construct(){
			$this->connection= new PDO("mysql:host=localhost; dbname=sitevolucao","root","");
		}

		public function query($query, $parametros=array()){
			$stmt= $this->connection->prepare($query);
			$this->setParametros($stmt,$parametros);
			$stmt->execute();
			return $stmt;
		}


		public function setParametros($stmt, $parametros=array()){
				foreach($parametros as $key => $value){
				$this->setParam($stmt, $key, $value);
			}	
		}


		private function setParam($statement, $key, $value){
			$statement->bindParam($key, $value);
		}

		public function select($query, $parametros=array()):array{
				$stmt= $this->query($query,$parametros);
				return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}
	}

?>