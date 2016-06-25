<?php
	require_once 'bd.class.php';
	require_once 'tst.classe.php';
	
	$risco = new risco()
	if($_GET['tipo'] == 'cadastrar'){
	switch($_GET['menu']){
			case 'risco':
				$risco->set_risco($_GET['risco'], $_GET['descricao']);
				$risco->grava_bd_risco();
				echo 'Cadastro com sucesso!';
	}
	}elseif($_GET['tipo'] == 'editar'){
		switch($_GET['menu']){
				case 'risco':
				$risco->set_risco($_GET['risco'], $_GET['descricao']);
				$risco->atualiza_risco($_GET['id_risco']);
		}
	}
