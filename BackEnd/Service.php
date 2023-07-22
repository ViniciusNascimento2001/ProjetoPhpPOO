<?php


//CRUD
class ProfessorService {

	private $conexao;
	private $model;

	public function __construct(Conexao $conexao, ProfessorModel $model) {
		$this->conexao = $conexao->conectar();
		$this->model = $model;
	}

	public function login() { 
		$query = '
			select 
				id
			from 
				professores
			where
				email = :email and senha = :senha
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(":email", $this->model->__get('email'));
		$stmt->bindValue(":senha", $this->model->__get('senha'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

}



class AlunoService {

	private $conexao;
	private $model;

	public function __construct(Conexao $conexao, AlunoModel $model) {
		$this->conexao = $conexao->conectar();
		$this->model = $model;
	}

	public function login() { 
		$query = '
			select 
				id
			from 
				alunos
			where
				email = :email and senha = :senha
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(":email", $this->model->__get('email'));
		$stmt->bindValue(":senha", $this->model->__get('senha'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function buscarAluno() { 
		$query = '
			select 
			nome,nota1,nota2,nota3,media,aprovado,professorId 
			from 
				alunos
			where
				id = ?
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->model->__get('id'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function inserir() { 
		$query = '
				insert into 
					alunos(nome,nota1,nota2,nota3,media,aprovado,professorId)
				values
					(:nome,:nota1,:nota2,:nota3,:media,:aprovado,:professorId)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->model->__get('nome'));
		$stmt->bindValue(':nota1', $this->model->__get('nota1'));
		$stmt->bindValue(':nota2', $this->model->__get('nota2'));
		$stmt->bindValue(':nota3', $this->model->__get('nota3'));
		$stmt->bindValue(':media', $this->model->__get('media'));		
		$stmt->bindValue(':aprovado', $this->model->__get('aprovado'));
		$stmt->bindValue(':professorId', $this->model->__get('professorId'));
		$stmt->execute();
	}

	public function atualizar() { 
		$query = '
			update
				alunos 
			set
				nome = :nome, nota1 = :nota1, nota2 = :nota2, nota3 = :nota3, media = :media, aprovado = :aprovado, professorId = :professorId
			where
				Id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->model->__get('id'));
		$stmt->bindValue(':nome', $this->model->__get('nome'));
		$stmt->bindValue(':nota1', $this->model->__get('nota1'));
		$stmt->bindValue(':nota2', $this->model->__get('nota2'));
		$stmt->bindValue(':nota3', $this->model->__get('nota3'));
		$stmt->bindValue(':media', $this->model->__get('media'));		
		$stmt->bindValue(':aprovado', $this->model->__get('aprovado'));
		$stmt->bindValue(':professorId', $this->model->__get('professorId'));
		$stmt->execute();
	}

	public function buscarAlunos() { 
		$query = '
			select 
				*
			from 
				alunos
			where
				professorId = ?
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->model->__get('professorId'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function removerAluno() { 
		$query = '
			delete from
				alunos
			where
				id = ?
		';		
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->model->__get('id'));
		$stmt->execute();		
	}

}
?>