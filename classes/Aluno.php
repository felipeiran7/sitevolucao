<?php


	class Aluno{
		private $nome;
		private $cpf;
		private $turma;
		private $unidade;

		public function __construct($nome="",$cpf="",$turma="",$unidade=""){
				$this->nome= $nome;
				$this->cpf= $cpf;
				$this->turma= $turma;
				$this->unidade= $unidade;

		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
				$this->nome= $nome;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf= $cpf;
		}

		public function getTurma(){
			return $this->turma;
		}

		public function setTurma($turma){
			$this->turma= $turma;
		}

		public function getUnidade(){
			return $this->unidade;
		}

		public function setUnidade($unidade){
			$this->unidade= $unidade;
		}

		public function __toString(){
			return json_encode(array(
				"nome"=>$this->getNome(),
				"cpf"=>$this->getCpf(),
				"turma"=>$this->getTurma(),
				"unidade"=>$this->getUnidade()));


		}

		public function setDados($nome,$cpf,$turma,$unidade){
			$this->nome= $nome;
			$this->cpf= $cpf;
			$this->turma= $turma;
			$this->unidade= $unidade;
		}

		public function insereAluno(){
			$sql= new Sql();
			$query= "INSERT INTO tb_alunos(nome,cpf,turma,unidade) VALUES(:nome,:cpf,:turma,:unidade)";
			$sql->query($query, array(
				":nome"=> $this->getNome(),
				":cpf"=>$this->getCpf(),
				":turma"=>$this->getTurma(),
				":unidade"=>$this->getUnidade()));
		}

		public function pesquisaAluno($cpf){
			$sql= new Sql();
			$query="SELECT *FROM tb_alunos WHERE cpf=:cpf_aluno";
			$resultado= $sql->select($query, array(":cpf_aluno"=>$cpf));
			if(count($resultado)>0){
				echo json_encode($resultado);
				
			}else{
				echo "aluno não localizado";
			}
		}

		public function deletaAluno($cpf){
			$sql = new Sql();
			$query= "DELETE FROM tb_alunos WHERE cpf=:cpf_aluno";
			$resultado= $sql->query($query, array(":cpf_aluno"=>$cpf));
		}


	}


?>