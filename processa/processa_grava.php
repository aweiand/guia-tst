<?php
	require_once 'bd.class.php';

	//grava form cnae
	$bd->insere('cnae', "$_GET['cnae'], $_GET['id_risco'], $_GET['descricao']");

	//grava form risco
	$bd->insere('risco', " '', $_GET['risco'], $_GET['descricao'] " );

	//grava form empregado
	$bd->insere('empregado', );
	switch($_GET['menu'){
			
			case DEFAULT:
				echo 'Nenhum cadastro encontrado';
				break;
	}
