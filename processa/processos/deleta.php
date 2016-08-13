<?php

require_once '../processa/classes/risco.class.php';
require_once '../processa/classes/cnae.class.php';

function confirma_deleta($retorno){
	if($retorno == true){
		echo "Excluído com sucesso!!";
	}else{
		echo "Impossível excluir!!";
	}
}
switch ($_GET['menu']) {
	case 'cnae':
		$cnae->deleta_cnae("'".$_GET['num_cnae']."'");
		echo "<a href='../html/lista_cnae.php' > Listar </a>";
		break;

	case 'risco':
		$retorno = $risco->deleta_risco($_GET["id_risco"]);
		confirma_deleta($retorno);
		echo "<a href='../html/lista_risco_tst.php' > Listar </a>";
		break;

	case 'observacao':
		$observacao->deleta($_GET["COD"]);
		break;

	case 'intervalo':
		$intervalo->deleta_intervalo($_GET["COD"]);
		echo "<a href='../html/lista_intervalo_tst.php' > Listar </a>";
		break;

	case 'empregado':
		$empregado->deleta($_GET["COD"]);
		break;

	case 'grupo_cnae':
		$bd->deleta('grupo_cnae', "num_cnae = ".$_GET["COD2"]." AND cipa = '".$_GET['COD']."'");
		echo "Excluído com sucesso!!";
		break;

	case 'grupo':
		$grupo->deleta_grupo($_GET["COD"]);
		//echo "Excluído com sucesso!!";
		break;

	case 'grupo_cipa':
		$grupo->deleta_grupoCipa($_GET['cipa'], $_GET['tipo'], $_GET['id_intervalo'] );
		break;

}

?>
