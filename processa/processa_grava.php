
<?php
	require_once 'classes/bd.class.php';
	require_once 'classes/risco.class.php';

	if($_GET['tipo'] == 'Cadastrar'){
	switch($_GET['menu']){
			case 'risco':
				$risco = new risco();
				$risco->set_risco($_GET['risco'], $_GET['descricao']);
				$risco->grava_bd_risco();
				echo 'Cadastro com sucesso!';
				echo "<a href='../html/lista_risco_tst.php' > Listar </a>";
			/*
			case 'cnae':
				$cnae->set_cnae($_GET['num_cnae'], $_GET['id_risco'], $_GET['descricao']);
				$cnae->grava_bd_cnae();
				break;
				*/
	}
	}elseif($_GET['tipo'] == 'Editar'){
		switch($_GET['menu']){
				case 'risco':
					$risco = new risco();
					$risco->set_risco($_GET['risco'], $_GET['descricao']);
					$risco->atualiza_risco($_GET['id_risco']);
					echo "<a href='../html/lista_risco_tst.php' > Listar </a>";
					break;
				case 'cnae':
					$cnae->set_cnae($_GET['num_cnae'], $_GET['id_risco'], $_GET['descricao']);
					$i = $cnae->atualiza_cnae($_GET['where']);
					var_dump($i);
					break;
		}
	}
?>
