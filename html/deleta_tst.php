
<?php
require_once '../processa/bd.class.php'
switch ($_GET['COD']) {
	case ($_GET['cnae']):
	$d=($db->deleta('cnae'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case ($_GET['risco']):
	$d=($db->deleta('risco'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case ($_GET['observacao']):
	$d=($db->deleta('observacao'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case ($_GET['intervalo']):
	$d=($db->deleta('intervalo'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case ($_GET['empregado']):
	$d=($db->deleta('empregado'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case ($_GET['grupo_cnae']):
	$d=($db->deleta('grupo_cnae'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case ($_GET['grupo']):
	$d=($db->deleta('grupo'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	case $_GET['grupo_cipa']):
	$d=($db->deleta('grupo_cipa'[$_GET["COD"]]);
	echo "excluido com sucesso!!";
		break;

	default :
	echo "Esse iten não pode ser excluido!!"
		break;
}

?>

