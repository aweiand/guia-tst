
<?php
require_once 'classes/bd.class.php';
require_once 'classes/risco.class.php';
require_once 'classes/cnae.class.php';

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
	case 'grupo':
		$grupo->set_grupo($_GET['cipa'], $_GET['descricao']);
		$grupo->insere_grupo();
		echo "</br><a href='../html/lista_grupo_tst.php' > Listar </a>";
		break;
	case 'grupo_cipa':
		$grupo->set_grupo($_GET['cipa'], $_GET['tipo'], $_GET['id_intervalo'], $_GET['quantidade'] );
		$grupo->insere_grupoCipa();
		echo "</br><a href='../html/lista_grcipa_tst.php' > Listar </a>";
		break;
	case 'empregado_obrigatorio':
		$grupo->set_empregadoObrigatorio($_GET['id_risco'], $_GET['id_intervalo'], $_GET['id_empregado'], $_GET['id_observacao'],
	 		$_GET['quantidade']);
		$grupo->insere_empregadoObrigatorio();
		echo "</br><a href='../html/lista_empreg_tst.php' > Listar </a>";
		break;
}
?>
