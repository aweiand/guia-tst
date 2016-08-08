<?php

require_once '../processa/classes/bd.class.php';
require_once '../processa/classes/risco.class.php';
function confirma_deleta($retorno){
	if($retorno == true){
		echo "Excluído com sucesso!!";
	}else{
		echo "Impossível excluir!!";
	}
}
switch ($_GET['menu']) {
	case 'cnae':
		$cnae = new cnae();
		$retorno = $cnae->deleta('cnae', "num_cnae =". $_GET['num_cnae']);
		var_dump($retorno);
		confirma_deleta($retorno);
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
		$bd->deleta('grupo', 'cipa = "'.$_GET["COD"].'" AND descricao = "'.$_GET['descricao'] .'"');
		echo "Excluído com sucesso!!";
		break;

	case 'grupo_cipa':
		$bd->deleta('grupo_cipa', 'cipa = "'.$_GET["cipa"].'" AND tipo = '.$_GET['tipo']);
		echo "Excluído com sucesso!!";
		break;

}

?>
