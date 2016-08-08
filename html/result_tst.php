<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="font-awesome-4.6.2/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
	<title>Resultado da Pesquisa</title>
  </head>
  <style media="screen">
  .td-result {
      border: 6px solid black;
      background-color: #ffffff;
      font-size: 25;
              }
  td {
      border-collapse: collapse;
      width: auto;
      padding: 20px;
    	height: 50px;
    	border: 5px solid white;
    }
  </style>
  <body class="fundo_home">
	<?php require_once '../processa/classes/bd.class.php' ?>
  <img class="logo_resultado" src="img/logo1.png" alt="logo"/>
    <table class="tbl-consulta">
    <thead>
			<tr>
				<td style="text-align: center; font-size: 30px; background-color: #ffffff;"colspan="3">
					CNAE 000-000-00
				</td>
			</tr>

      <tr>
				<td style=" font-size: 25px; background-color: #ffffff;" colspan="1">
					Descrição
				</td>
				<td style="text-align: center; font-size: 25px; background-color: #ffffff;" colspan="1">
					Risco
				</td>
        <td class="td-result">
            0
        </td>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td colspan="3">
					Descrição Descrição
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
