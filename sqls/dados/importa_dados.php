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