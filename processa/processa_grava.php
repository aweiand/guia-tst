
<?php
	require_once 'classes/bd.class.php';
	require_once 'classes/risco.class.php';
	require_once 'classes/cnae.class.php';


	if($_GET['tipo'] == 'Cadastrar'){
		switch($_GET['menu']){
			case 'risco':
				$risco->set_risco($_GET['risco'], $_GET['descricao']);
				$risco->insere_risco();
				echo "<a href='../html/lista_risco_tst.php' > Listar </a>";
				break;
			case 'intervalo':
				$intervalo->set_intervalo($_GET['maximo'], $_GET['minimo']);
				$intervalo->insere_intervalo();
				echo "</br><a href='../html/lista_intervalo_tst.php' > Listar </a>";
				break;				
			case 'observacao':
				$observacao->set_observacao($_GET['observacao']);
				$observacao->insere_observacao();
				echo "</br><a href='../html/lista_obs_tst.php' > Listar </a>";
			case 'empregado':
				$empregado->set_empregado($_GET['descricao']);
				$empregado->insere_empregado();
				echo "</br><a href='../html/lista_empreg_tst.php' > Listar </a>";
				break;
			case 'cnae':
				$cnae->set_cnae($_GET['num_cnae'], $_GET['id_risco'], $_GET['descricao']);
				$cnae->insere_cnae();
				echo "</br><a href='../html/lista_cnae.php' > Listar </a>";
				break;
		}
	}elseif($_GET['tipo'] == 'Editar'){
		switch($_GET['menu']){
			case 'risco':
				$risco->set_risco($_GET['risco'], $_GET['descricao']);
				$resultado = $risco->atualiza_risco($_GET['id_risco']);
				echo "</br><a href='../html/lista_risco_tst.php' > Listar </a>";
				break;
			case 'intervalo':
				$intervalo->set_intervalo($_GET['maximo'], $_GET['minimo']);
				$intervalo->atualiza_intervalo($_GET['id_intervalo']);
				echo "</br><a href='../html/lista_intervalo_tst.php' > Listar </a>";
				break;
			case 'observacao':
				$observacao->set_observacao($_GET['observacao']);
				$observacao->atualiza_observacao($_GET['id_observacao']);
				echo "</br><a href='../html/lista_obs_tst.php' > Listar </a>";
				break;
			case 'empregado':
				$empregado->set_empregado($_GET['descricao']);
				$empregado->atualiza_empregado($_GET['id_empregado']);
				echo "</br><a href='../html/lista_empreg_tst.php' > Listar </a>";
				break;
			case 'cnae':
				$cnae->set_cnae($_GET['num_cnae'], $_GET['id_risco'], $_GET['descricao']);
				$cnae->atualiza_cnae($_GET['where']);
				echo "</br><a href='../html/lista_cnae.php' > Listar </a>";
				break;
		}
	}
?>
