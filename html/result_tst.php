<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="font-awesome-4.6.2/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
	<title>Resultado da Pesquisa</title>
  </head>
  <style media="screen">
  .td-result-borda {
      border: 6px solid black;
      background-color: #ffffff;
      font-size: 25;
              }
  .td-result {
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
    .gambiarra {
      background-color: #ffffff;
      height: 50px;
    }
  </style>
  <body class="fundo_home">
	<?php require_once '../processa/classes/bd.class.php' ?>

    <table class="tbl-consulta">
    <thead>
      <tr>
        <td class="td-result" colspan="3">
          <img class="logo_resultado" src="img/logo1.png" alt="logo"/>
        <div class="engrenagem">
    			<a href="cadastro_tst.php">
    			     <i class="fa fa-2x fa-cog" aria-hidden="true" style='color:black;'></i>
    			</a>
    		</div>
        </td>
      </tr>
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
        <td class="td-result-borda">
            0
        </td>
			</tr>
		</thead>

    <tr class="gambiarra" >
      <td colspan="3">
      </td>
    </tr>

			<tr>
        <tbody>
				<td class="td-result-borda" colspan="3">
					Descrição Descrição
				</td>
			</tr>

      <tr>
        <td class="gambiarra" colspan="3">
        </td>
      </tr>

      <tr>
				<td style="text-align: center; "class="td-result-borda" colspan="3">
					Intervalo de funcionários 0 à 50
				</td>
			</tr>

      <tr>
        <td class="gambiarra" colspan="3">
        </td>
      </tr>


      <tr>
				<td class="td-result" colspan="2">
					Técnico em Segurança do Trabalho
				</td>
				<td class="td-result-borda">
					4
				</td>
			</tr>
      <tr>
				<td class="td-result" colspan="2">
					Técnico em Segurança do Trabalho
				</td>
				<td class="td-result-borda">
					1
				</td>
			</tr>

      <tr>
				<td class="td-result" colspan="2">
					Técnico em Segurança do Trabalho
				</td>
				<td class="td-result-borda">
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

      <tr>
        <td class="gambiarra" colspan="3">
        </td>
      </tr>

      <tr>
        <td colspan="3">
          <a style="float: right;" href="../index.php">
          <i  style="float: right;" class="fa fa-3x fa-check-square-o fa-lg"></i>
      	</a>
        </td>
      </tr>
		</tbody>
	</table>
  </body>
</html>
