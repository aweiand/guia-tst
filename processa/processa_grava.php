<?php
	require_once 'bd.class.php';
	require_once 'tst.classe.php';


	/*//grava form cnae
	$bd->insere('cnae', "$_GET['cnae'], $_GET['id_risco'], $_GET['descricao']");

	//grava form risco
	$bd->insere('risco', " '', $_GET['risco'], $_GET['descricao'] " );

	//grava form empregado
	$bd->insere('empregado', );
	*/
	switch($_GET['menu']){
			case 'risco':
				$risco = new risco();
				$risco->set_risco($_GET['risco'], $_GET['descricao']);
				$risco->grava_bd_risco();
				echo 'Cadastro com sucesso!';
	}
