<?php

class ProfessorModel {
	private $id;
	private $email;
	private $senha;
	private $nome;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

class AlunoModel {
	private $id;
	private $nome;
	private $nota1;
	private $nota2;
	private $nota3;
	private $media;
	private $aprovado;
	private $professorId;
	private $email;
	private $senha;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>