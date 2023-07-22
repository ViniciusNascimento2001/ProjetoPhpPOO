<?php

	 require "Model.php";
	 require "Service.php";
	 require "Conexao.php";


	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;    

    switch($acao){

        case "buscarAluno":
            $aluno = new AlunoModel();
            $conexao = new Conexao();            
            $aluno->__set('id', $_GET['id']);
            $alunoService = new AlunoService($conexao, $aluno);
            $aluno = $alunoService->buscarAluno();
            echo json_encode($aluno);
            break;

        case "buscarAlunos":
            $aluno = new AlunoModel();
            $conexao = new Conexao();            
            $aluno->__set('professorId', $_GET['id']);                
            $alunoService = new AlunoService($conexao, $aluno);
            $alunos = $alunoService->buscarAlunos();
            echo json_encode($alunos);
            break;

        case "removerAluno":
            $aluno = new AlunoModel();
            $conexao = new Conexao();            
            $aluno->__set('id', $_GET['id']);                
            $alunoService = new AlunoService($conexao, $aluno);
            $alunoService->removerAluno();
            echo true;
            break;

        case "inserirAluno":
            $aluno = new AlunoModel();
            $aluno->__set('nome', $_POST['nome']);
            $aluno->__set('nota1', $_POST['nota1']);
            $aluno->__set('nota2', $_POST['nota2']);
            $aluno->__set('nota3', $_POST['nota3']);                        
            $aluno->__set('professorId', $_POST['professorId']);
            $aluno->media = ($aluno->nota1 + $aluno->nota1 + $aluno->nota1) / 3;
            $aluno->aprovado = $aluno->media >= 7;            
            $conexao = new Conexao();
            $alunoService = new AlunoService($conexao, $aluno);            
            $alunoService->inserir();
            echo true;
            break;

        case "atualizarAluno":  
            $aluno = new AlunoModel();
            $aluno->__set('id', $_POST['id']);
            $aluno->__set('nome', $_POST['nome']);
            $aluno->__set('nota1', $_POST['nota1']);
            $aluno->__set('nota2', $_POST['nota2']);
            $aluno->__set('nota3', $_POST['nota3']);                        
            $aluno->__set('professorId', $_POST['professorId']);
            $aluno->media = ($aluno->nota1 + $aluno->nota1 + $aluno->nota1) / 3;
            $aluno->aprovado = $aluno->media >= 7;            
            $conexao = new Conexao();
            $alunoService = new AlunoService($conexao, $aluno);            
            $alunoService->atualizar();
            echo true;
            break;

        case "login":
            $professor = new ProfessorModel();
            $conexao = new Conexao();            
            $professor->__set('email', $_GET['email']);
            $professor->__set('senha', $_GET['senha']);
            $professorService = new  ProfessorService($conexao, $professor);
            $professor = $professorService->login();
            echo json_encode($professor);
            break;

        case "loginAluno":
            $aluno = new AlunoModel();
            $conexao = new Conexao();            
            $aluno->__set('email', $_GET['email']);
            $aluno->__set('senha', $_GET['senha']);
            $alunoService = new  AlunoService($conexao, $aluno);
            $aluno = $alunoService->login();
            echo json_encode($aluno);
            break;
    }

   
?>