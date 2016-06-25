<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="font-awesome-4.6.2/css/font-awesome.min.css">
	<style>
		.tbl-consulta {
			width: 50%;
			border: 1px solid black;
			margin: 0 auto;
		}
	</style>
	<title>Resultado da Pesquisa</title>
  </head>
  <body>
	<?php require_once '../processa/bd.class.php' ?>
	<div>
		<img class="logo" src="img/logo1.png" alt="logo" style="width: 10%; float: right; margin-right: 10%; margin-top: 1%;"/>
	</div>
	
    <table class="tbl-consulta">
		<thead>
			<tr>
				<td colspan="3">
					CNAE 000-000-00
				</td>
			</tr>
			<tr>
				<td colspan="2">
					Descrição
				</td>
				<td colspan="2">
					Risco
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="3">
					Descrição Descrição Descrição Descrição
				</td>
			</tr>
			<tr>
				<td colspan="3">
					Intervalo de funcionários 0 à 50
				</td>
			</tr>
			<tr>
				<td>
					-->
				</td>
				<td>
					Técnico em Segurança do Trabalho
				</td>
				<td>
					4
				</td>
			</tr>
			<tr>
				<td>
					-->
				</td>
				<td>
					Técnico em Segurança do Trabalho
				</td>
				<td>
					1
				</td>
			</tr>
			<tr>
				<td>
					-->
				</td>
				<td>
					Técnico em Segurança do Trabalho
				</td>
				<td>
					0
				</td>
			</tr>
		</tbody>
	</table>
	
	<hr />
	
	<table class="tbl-consulta">
		<thead>
			<tr>
				<td colspan="3">
					CIPA
				</td>
			</tr>
			<tr>
				<td colspan="3">
					Grupo CNAE C1-a
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					-->
				</td>
				<td>
					Efetivo
				</td>
				<td>
					1
				</td>
			</tr>
			<tr>
				<td>
					-->
				</td>
				<td>
					Suplente
				</td>
				<td>
					1
				</td>
			</tr>
		</tbody>
	</table>
	
    <a href="pesquisa_tst.php">
		<i  class="fa fa-3x fa-check-square-o fa-lg"></i>
		Nova Consulta
	</a>
  </body>
</html>