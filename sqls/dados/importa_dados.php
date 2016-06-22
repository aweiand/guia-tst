<<<<<<< HEAD
<?php
require "../../processa/bd.class.php";

$a = new bd();

$cnae = "cnae.csv";
$intervalo = " intervalo.csv";
$risco = "risco.csv";
$grupo = "grupo.csv";
$observacao = "observacao.csv";
$empregado = "empregado.csv";

$csv = array_map ("str_getcsv",file($cnae));

foreach ($csv as $campo){
	$campo[0]
}
=======
﻿<?php
$impdados = "dados.sql";
$fp = fopen($impdados,"wr+");

$cnae = "cnae.csv";
$grupo = "grupos.csv";
$grupo2 = "grupo.csv";


$sql="-- INICIO DA SQL PARA INSERIR RISCOS --\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (1, 1, 'Baixo Risco');\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (2, 2, 'Médio-Baixo Risco');\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (3, 3, 'Médio-Alto Risco');\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (4, 4, 'Alto Risco');\n";
$sql.="-- FIM DA SQL PARA INSERIR RISCOS --\n\n";

fwrite($fp, $sql);

$sql="-- INICIO DA SQL PARA INSERIR empregados --\n";
$sql.="INSERT INTO empregado (id_empregado, descricao) VALUES (1, 'Técnico Seg. Trabalho');\n";
$sql.="INSERT INTO empregado (id_empregado, descricao) VALUES (2, 'Engenheiro Seg. Trabalho');\n";
$sql.="INSERT INTO empregado (id_empregado, descricao) VALUES (3, 'Aux. Enfermagem Trabalho');\n";
$sql.="INSERT INTO empregado (id_empregado, descricao) VALUES (4, 'Enfermeiro do Trabalho');\n";
$sql.="INSERT INTO empregado (id_empregado, descricao) VALUES (5, 'Médico do Trabalho');\n";
$sql.="-- FIM DA SQL PARA INSERIR empregados --\n\n";

fwrite($fp, $sql);

$sql="-- INICIO DA SQL PARA INSERIR observacoes --\n";
$sql.="INSERT INTO observacao (id_observacao, observacao) VALUES (1, 'Tempo parcial (mínimo de três horas)');\n";
$sql.="INSERT INTO observacao (id_observacao, observacao) VALUES (2, 'O dimensionamento total deverá ser feito levando-se em consideração o dimensionamento da faixa de 3.501 a 5.000 mais o dimensionamento do(s) grupo(s) de 4.000 ou fração de 2.000.');\n";
$sql.="INSERT INTO observacao (id_observacao, observacao) VALUES (3, 'Hospitais, Ambulatórios, Maternidades, Casas de Saúde e Repouso, Clínicas e estabelecimentos similares com mais de 500 (quinhentos) empregados deverão contratar um Enfermeiro do Trabalho em tempo integral.');\n";
$sql.="-- FIM DA SQL PARA INSERIR observacoes --\n\n";

fwrite($fp, $sql);

$sql="-- INICIO DA SQL PARA INSERIR intervalo --\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (1, 50, 100);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (2, 101, 250);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (3, 251, 500);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (4, 501, 1000);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (5, 1001, 2000);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (6, 2001, 3500);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (7, 3501, 5000);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (8, 5000, 99999);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (9, 0, 19);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (10, 20, 29);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (11, 30, 50);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (12, 51, 80);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (13, 81, 100);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (14, 101, 120);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (15, 121, 140);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (16, 141, 300);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (17, 301, 500);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (18, 501, 1000);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (19, 1001, 2500);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (20, 2501, 5000);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (21, 5001, 10000);\n";
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (22, 10001, 99999);\n";
$sql.="-- FIM DA SQL PARA INSERIR intervalo --\n\n";

fwrite($fp, $sql);


$csv = array_map ("str_getcsv",file($cnae));

foreach ($csv as $campo){
	if ($campo[0]!=null and $campo[1]!=null and $campo[2]!=null){
		$pontos = array(".","-", " ");
		$result = str_replace ($pontos, "",$campo[0]);
		$sql="INSERT INTO cnae (num_cnae, descricao, id_risco) VALUES ('".$result."', '".$campo[1]."', ".$campo[2].");";
		fwrite($fp, $sql. "\n");
	}
}

$csv = array_map ("str_getcsv",file($grupo2));

foreach ($csv as $campo){
	
	$sql="INSERT INTO grupo (cipa, descricao) VALUES ('".$campo[0]."', '".utf8_encode($campo[1])."');";
	fwrite($fp, $sql. "\n");
}


$csv = array_map ("str_getcsv",file($grupo));

foreach ($csv as $campo){
	$pontos = array("-"," ");
	$result = str_replace ($pontos, "",$campo[2]);
	$pontos2 = array(".","-"," ");
	$result2 = str_replace ($pontos2, "",$campo[0]);
	$sql="INSERT INTO grupo_cnae (cipa, num_cnae) VALUES ('".$result."', '".$result2."');";
	fwrite($fp, $sql. "\n");
}

fclose($fp);
?>

>>>>>>> eb272be475d6cac1118c5e3df412015e34c95662
