<?php
$cnae = "cnae.csv";
$intervalo = " intervalo.csv";
$risco = "risco.csv";
$grupo = "grupo.csv";
$observacao = "observacao.csv";
$empregado = "empregado.csv";

$csv = array_map ("str_getcsv",file($cnae));

foreach ($csv as $campo){
	$campo[0];
}

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
$sql.="INSERT INTO intervalo (id_intervalo, minimo, maximo) VALUES (8, 5001, 99999);\n";
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

$sql="-- INICIO DA SQL PARA INSERIR cnae --\n";
$sql.="INSERT INTO cnae (num_cnae, descricao, id_risco) VALUES ('10694', 'Moagem e fabricação de produtos de origem vegetal não especificados', 3);\n";
$sql.="-- FIM DA SQL PARA INSERIR cnae --\n\n";

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

$sql="-- INICIO DA SQL PARA INSERIR empregado_obrigatorio --\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 1, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 1, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 1, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 1, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 1, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 2, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 2, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 2, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 2, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 2, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 3, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 3, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 3, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 3, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 3, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 4, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 4, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 4, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 4, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 4, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 5, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 5, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 5, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 5, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (1, 5, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 6, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (1, 6, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 6, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 6, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (1, 6, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 7, 1, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 7, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 7, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (1, 7, 4, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 7, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 8, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (1, 8, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 8, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (1, 8, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (1, 8, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 1, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 1, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 1, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 1, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 1, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 2, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 2, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 2, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 2, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 2, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 3, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 3, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 3, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 3, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 3, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 4, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 4, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 4, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 4, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 4, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 5, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (2, 5, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 5, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 5, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (2, 5, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 6, 1, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 6, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 6, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 6, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 6, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 7, 1, 5);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 7, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 7, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 7, 4, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 7, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 8, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (2, 8, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 8, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 8, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (2, 8, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 1, 1, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 1, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 1, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 1, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 1, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 2, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 2, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 2, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 2, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 3, 1, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 3, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 3, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 3, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 3, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 4, 1, 3);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (3, 4, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 4, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 4, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (3, 4, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 5, 1, 4);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 5, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 5, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 5, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 5, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 6, 1, 6);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 6, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 6, 3, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 6, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 6, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 7, 1, 8);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 7, 2, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 7, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 7, 4, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 7, 5, 2);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 8, 1, 3);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 8, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 8, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 8, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (3, 8, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 1, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 1, 2, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 1, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 1, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 1, 5, 0);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 2, 1, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (4, 2, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 2, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 2, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (4, 2, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 3, 1, 3);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (4, 3, 2, 1, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 3, 3, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 3, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade, id_observacao) VALUES (4, 3, 5, 1, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 4, 1, 4);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 4, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 4, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 4, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 4, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 5, 1, 5);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 5, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 5, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 5, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 5, 5, 1);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 6, 1, 8);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 6, 2, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 6, 3, 2);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 6, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 6, 5, 2);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 7, 1, 10);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 7, 2, 3);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 7, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 7, 4, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 7, 5, 3);\n";

$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 8, 1, 3);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 8, 2, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 8, 3, 1);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 8, 4, 0);\n";
$sql.="INSERT INTO empregado_obrigatorio (id_risco, id_intervalo, id_empregado, quantidade) VALUES (4, 8, 5, 1);\n";

$sql.="-- FIM DA SQL PARA INSERIR empregado_obrigatorio --\n\n";

fwrite($fp, $sql);

$sql="-- INICIO DA SQL PARA INSERIR grupo_cipa --\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C1', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C1', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C1', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C1', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C1', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C1', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C1', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C1', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C1', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C1', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C1', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C1', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C1', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C1', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C1', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C1', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C1', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C1', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C1', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C1', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C1', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C1', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C1', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C1', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C1', 0, 15);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C1', 1, 12);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C1', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C1', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C1a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C1a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C1a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C1a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C1a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C1a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C1a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C1a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C1a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C1a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C1a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C1a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C1a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C1a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C1a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C1a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C1a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C1a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C1a', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C1a', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C1a', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C1a', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C1a', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C1a', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C1a', 0, 15);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C1a', 1, 12);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C1a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C1a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C2', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C2', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C2', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C2', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C2', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C2', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C2', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C2', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C2', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C2', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C2', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C2', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C2', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C2', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C2', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C2', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C2', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C2', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C2', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C2', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C2', 0, 7);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C2', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C2', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C2', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C2', 0, 11);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C2', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C2', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C2', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C3', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C3', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C3', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C3', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C3', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C3', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C3', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C3', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C3', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C3', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C3', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C3', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C3', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C3', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C3', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C3', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C3', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C3', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C3', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C3', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C3', 0, 7);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C3', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C3', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C3', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C3', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C3', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C3', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C3', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C3a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C3a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C3a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C3a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C3a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C3a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C3a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C3a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C3a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C3a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C3a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C3a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C3a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C3a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C3a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C3a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C3a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C3a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C3a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C3a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C3a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C3a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C3a', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C3a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C3a', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C3a', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C3a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C3a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C4', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C4', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C4', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C4', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C4', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C4', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C4', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C4', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C4', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C4', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C4', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C4', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C4', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C4', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C4', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C4', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C4', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C4', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C4', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C4', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C4', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C4', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C4', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C4', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C4', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C4', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C4', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C4', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C5', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C5', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C5', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C5', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C5', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C5', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C5', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C5', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C5', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C5', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C5', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C5', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C5', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C5', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C5', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C5', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C5', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C5', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C5', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C5', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C5', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C5', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C5', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C5', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C5', 0, 11);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C5', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C5', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C5', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C5a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C5a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C5a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C5a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C5a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C5a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C5a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C5a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C5a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C5a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C5a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C5a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C5a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C5a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C5a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C5a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C5a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C5a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C5a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C5a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C5a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C5a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C5a', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C5a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C5a', 0, 7);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C5a', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C5a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C5a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C6', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C6', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C6', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C6', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C6', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C6', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C6', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C6', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C6', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C6', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C6', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C6', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C6', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C6', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C6', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C6', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C6', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C6', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C6', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C6', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C6', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C6', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C6', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C6', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C6', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C6', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C6', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C6', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C7', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C7', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C7', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C7', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C7', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C7', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C7', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C7', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C7', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C7', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C7', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C7', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C7', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C7', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C7', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C7', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C7', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C7', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C7', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C7', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C7', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C7', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C7', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C7', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C7', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C7', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C7', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C7', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C7a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C7a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C7a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C7a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C7a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C7a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C7a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C7a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C7a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C7a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C7a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C7a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C7a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C7a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C7a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C7a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C7a', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C7a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C7a', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C7a', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C7a', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C7a', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C7a', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C7a', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C7a', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C7a', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C7a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C7a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C8', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C8', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C8', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C8', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C8', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C8', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C8', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C8', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C8', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C8', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C8', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C8', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C8', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C8', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C8', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C8', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C8', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C8', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C8', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C8', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C8', 0, 7);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C8', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C8', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C8', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C8', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C8', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C8', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C8', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C9', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C9', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C9', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C9', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C9', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C9', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C9', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C9', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C9', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C9', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C9', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C9', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C9', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C9', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C9', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C9', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C9', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C9', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C9', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C9', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C9', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C9', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C9', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C9', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C9', 0, 7);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C9', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C9', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C9', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C10', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C10', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C10', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C10', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C10', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C10', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C10', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C10', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C10', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C10', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C10', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C10', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C10', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C10', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C10', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C10', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C10', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C10', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C10', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C10', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C10', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C10', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C10', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C10', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C10', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C10', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C10', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C10', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C11', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C11', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C11', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C11', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C11', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C11', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C11', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C11', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C11', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C11', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C11', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C11', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C11', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C11', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C11', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C11', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C11', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C11', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C11', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C11', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C11', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C11', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C11', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C11', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C11', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C11', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C11', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C11', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C12', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C12', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C12', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C12', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C12', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C12', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C12', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C12', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C12', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C12', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C12', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C12', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C12', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C12', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C12', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C12', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C12', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C12', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C12', 0, 7);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C12', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C12', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C12', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C12', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C12', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C12', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C12', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C12', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C12', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C13', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C13', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C13', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C13', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C13', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C13', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C13', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C13', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C13', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C13', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C13', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C13', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C13', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C13', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C13', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C13', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C13', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C13', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C13', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C13', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C13', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C13', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C13', 0, 11);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C13', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C13', 0, 13);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C13', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C13', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C13', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C14', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C14', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C14', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C14', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C14', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C14', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C14', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C14', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C14', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C14', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C14', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C14', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C14', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C14', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C14', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C14', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C14', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C14', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C14', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C14', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C14', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C14', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C14', 0, 11);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C14', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C14', 0, 11);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C14', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C14', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C14', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C14a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C14a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C14a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C14a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C14a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C14a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C14a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C14a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C14a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C14a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C14a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C14a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C14a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C14a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C14a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C14a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C14a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C14a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C14a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C14a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C14a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C14a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C14a', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C14a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C14a', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C14a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C14a', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C14a', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C15', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C15', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C15', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C15', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C15', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C15', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C15', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C15', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C15', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C15', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C15', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C15', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C15', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C15', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C15', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C15', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C15', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C15', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C15', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C15', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C15', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C15', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C15', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C15', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C15', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C15', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C15', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C15', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C16', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C16', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C16', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C16', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C16', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C16', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C16', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C16', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C16', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C16', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C16', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C16', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C16', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C16', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C16', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C16', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C16', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C16', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C16', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C16', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C16', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C16', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C16', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C16', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C16', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C16', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C16', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C16', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C17', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C17', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C17', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C17', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C17', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C17', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C17', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C17', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C17', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C17', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C17', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C17', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C17', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C17', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C17', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C17', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C17', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C17', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C17', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C17', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C17', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C17', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C17', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C17', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C17', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C17', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C17', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C17', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C18', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C18', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C18', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C18', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C18', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C18', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C18', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C18', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C18', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C18', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C18', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C18', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C18', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C18', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C18', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C18', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C18', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C18', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C18', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C18', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C18', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C18', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C18', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C18', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C18', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C18', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C18', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C18', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C18a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C18a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C18a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C18a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C18a', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C18a', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C18a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C18a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C18a', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C18a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C18a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C18a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C18a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C18a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C18a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C18a', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C18a', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C18a', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C18a', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C18a', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C18a', 0, 9);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C18a', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C18a', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C18a', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C18a', 0, 15);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C18a', 1, 12);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C18a', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C18a', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C19', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C19', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C19', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C19', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C19', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C19', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C19', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C19', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C19', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C19', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C19', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C19', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C19', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C19', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C19', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C19', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C19', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C19', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C19', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C19', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C19', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C19', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C19', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C19', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C19', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C19', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C19', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C19', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C20', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C20', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C20', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C20', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C20', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C20', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C20', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C20', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C20', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C20', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C20', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C20', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C20', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C20', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C20', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C20', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C20', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C20', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C20', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C20', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C20', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C20', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C20', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C20', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C20', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C20', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C20', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C20', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C21', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C21', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C21', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C21', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C21', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C21', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C21', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C21', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C21', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C21', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C21', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C21', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C21', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C21', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C21', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C21', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C21', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C21', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C21', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C21', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C21', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C21', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C21', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C21', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C21', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C21', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C21', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C21', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C22', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C22', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C22', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C22', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C22', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C22', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C22', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C22', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C22', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C22', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C22', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C22', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C22', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C22', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C22', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C22', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C22', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C22', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C22', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C22', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C22', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C22', 1, 6);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C22', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C22', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C22', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C22', 1, 9);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C22', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C22', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C23', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C23', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C23', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C23', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C23', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C23', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C23', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C23', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C23', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C23', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C23', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C23', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C23', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C23', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C23', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C23', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C23', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C23', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C23', 0, 3);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C23', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C23', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C23', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C23', 0, 5);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C23', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C23', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C23', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C23', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C23', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C24', 0, 0);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (9, 'C24', 1, 0);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C24', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (10, 'C24', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C24', 0, 1);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (11, 'C24', 1, 1);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C24', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (12, 'C24', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C24', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (13, 'C24', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C24', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (14, 'C24', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C24', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (15, 'C24', 1, 3);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C24', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (16, 'C24', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C24', 0, 4);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (17, 'C24', 1, 4);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C24', 0, 6);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (18, 'C24', 1, 5);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C24', 0, 8);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (19, 'C24', 1, 7);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C24', 0, 10);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (20, 'C24', 1, 8);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C24', 0, 12);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (21, 'C24', 1, 10);\n";

$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C24', 0, 2);\n";
$sql.="INSERT INTO grupo_cipa (id_intervalo, cipa, tipo, quantidade) VALUES (22, 'C24', 1, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 12, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 12, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 13, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 13, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 14, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 14, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 15, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 15, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 17, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 17, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 18, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 18, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 19, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 20, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 20, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 21, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24a', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 10, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 10, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 11, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 11, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 12, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 12, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 13, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 13, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 14, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 14, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 15, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 15, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 16, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 16, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 17, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 17, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 18, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 18, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 19, 9);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 19, 7);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 20, 12);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 20, 9);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 21, 15);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 21, 12);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 0, 22, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C24b', 1, 22, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 12, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 12, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 13, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 13, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 14, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 14, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 15, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 15, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 17, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 17, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 18, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 18, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 19, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 20, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 20, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 21, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C25', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 12, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 12, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 13, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 13, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 14, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 14, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 15, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 15, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 16, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 16, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 17, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 17, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 18, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 18, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 19, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 20, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 20, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 21, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 21, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C26', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 12, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 12, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 13, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 13, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 14, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 14, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 15, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 15, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 17, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 17, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 18, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 18, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 19, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 19, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 20, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 20, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 21, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C27', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 12, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 12, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 13, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 13, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 14, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 14, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 15, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 15, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 17, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 17, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 18, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 18, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 19, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 19, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 20, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 20, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 21, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C28', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 12, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 12, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 13, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 13, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 14, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 14, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 15, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 15, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 16, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 16, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 17, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 17, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 18, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 18, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 19, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 20, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 20, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 21, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 21, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C29', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 10, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 10, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 11, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 11, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 12, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 12, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 13, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 13, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 14, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 14, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 15, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 15, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 16, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 16, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 17, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 17, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 18, 7);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 18, 6);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 19, 8);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 19, 7);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 20, 9);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 20, 8);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 21, 10);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 21, 9);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 0, 22, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C30', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 12, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 12, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 13, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 13, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 14, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 14, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 15, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 15, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 17, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 17, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 18, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 18, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 19, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 20, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 20, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 21, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C31', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 12, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 12, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 13, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 13, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 14, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 14, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 15, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 15, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 17, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 17, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 18, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 18, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 19, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 20, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 20, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 21, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C32', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 12, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 12, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 13, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 13, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 14, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 14, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 15, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 15, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 16, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 16, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 17, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 17, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 18, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 18, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 19, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 20, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 20, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 21, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 21, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C33', 1, 22, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 10, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 10, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 11, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 11, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 12, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 12, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 13, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 13, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 14, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 14, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 15, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 15, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 16, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 16, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 17, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 17, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 18, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 18, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 19, 8);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 19, 7);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 20, 10);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 20, 8);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 21, 12);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 21, 9);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 0, 22, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C34', 1, 22, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 9, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 9, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 10, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 10, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 11, 0);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 11, 0);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 12, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 12, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 13, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 13, 1);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 14, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 14, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 15, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 15, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 16, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 16, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 17, 2);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 17, 2);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 18, 3);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 18, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 19, 4);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 19, 3);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 20, 5);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 20, 4);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 21, 6);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 21, 5);\n";

$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 0, 22, 1);\n";
$sql.="INSERT INTO grupo_cipa (cipa, tipo, id_intervalo, quantidade) VALUES ('C35', 1, 22, 1);\n";

$sql.="-- FIM DA SQL PARA INSERIR grupo_cipa --\n\n";

fwrite($fp, $sql);

fclose($fp);

?>
