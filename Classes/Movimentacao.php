<?php 
	class Movimentacao{
		private $id;
		private $tipo;
		private $dataInicio;
		private $dataTermino;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}
		public function getTipo(){
			return $this->tipo;
		}
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}

		public function getDataInicio(){
			return $this->dataInicio;
		}
		public function setDataInicio($data){
			$this->dataInicio = $data;
		}
		public function getDataTermino(){
			return $this->dataTermino;
		}
		public function setDataTermino($data){
			$this->dataTermino = $data;
		}
	}
 ?>