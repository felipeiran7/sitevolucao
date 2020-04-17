<?php
	require_once("config.php");

	$aluno= new Aluno();
	//$aluno->setDados("JOAO CASTRO","60897222374","MEDICINA","COHAB");
	//$aluno->insereAluno($aluno);

	//$aluno->pesquisaAluno("60897255364");
	$aluno->deletaAluno("60897255374");
	
?>