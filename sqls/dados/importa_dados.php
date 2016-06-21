<?php
$impdados = "dados.sql";
$fp = fopen($impdados,"wr+");

$cnae = "cnae.csv";
$grupo = "grupo.csv";


$sql="-- INICIO DA SQL PARA INSERIR RISCOS --\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (1, 1, 'Baixo Risco');\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (2, 2, 'Médio-Baixo Risco');\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (3, 3, 'Médio-Alto Risco');\n";
$sql.="INSERT INTO risco (id_risco, risco, descricao) VALUES (4, 4, 'Alto Risco');\n";
$sql.="-- FIM DA SQL PARA INSERIR RISCOS --\n\n";

fwrite($fp, $sql);


$csv = array_map ("str_getcsv",file($cnae));

foreach ($csv as $campo){
	if ($campo[0]!=null and $campo[1]!=null and $campo[2]!=null){
		$pontos = array(".","-");
		$result = str_replace ($pontos, "",$campo[0]);
		$sql="INSERT INTO cnae (cnae, descricao, id_risco) VALUES (".$result.", '".$campo[1]."', ".$campo[2].");";
		fwrite($fp, $sql. "\n");
	}
}

$csv = array_map ("str_getcsv",file($grupo));

foreach ($csv as $campo){
	if ($campo[1]!=null and $campo[2]!=null){
		$pontos = array(".","-");
		$result = str_replace ($pontos, "",$campo[0]);
		$sql="INSERT INTO cnae (cipa, descricao) VALUES (".$result.", '".$campo[1]."', ".$campo[2].");";
		fwrite($fp, $sql. "\n");
	}
}



fclose($fp);
?>

