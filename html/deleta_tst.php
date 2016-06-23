
<?php
	require_once '../processa/bd.class.php';
	switch ($_GET['menu']) {
		case 'cnae':
			$bd->deleta('cnae', "num_cnae =". $_GET["COD"]);
			echo "Excluído com sucesso!!";

			break;

		case 'risco':
			$bd->deleta('risco','id_risco = '. $_GET["COD"]);
			echo "Excluído com sucesso!!";
			break;

		case 'observacao':
			$bd->deleta('observacao', 'id_observacao = '. $_GET["COD"]);
			echo "Excluído com sucesso!!";
			break;

		case 'intervalo':
			$bd->deleta('intervalo', 'id_intervalo = ' .$_GET["COD"]);
			echo "Excluído com sucesso!!";
			break;

		case 'empregado':
			$bd->deleta('empregado', 'id_empregado = ' .$_GET["COD"]);
			echo "Excluído com sucesso!!";
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
