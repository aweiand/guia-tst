<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="estilos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="estilos/style.css">
	<title>Resultado da Pesquisa</title>
  </head>
  <style media="screen">
  #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      width: 60%;
      margin: auto;
      box-shadow: 3px 2px 1px #999999;
  }

  #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
  }

  #customers tr:hover {background-color: #ddd;}
  #customers tr {
    background-color: #f2f2f2;
    border-bottom-color: #566857;
    border-bottom-style: solid;
    border-bottom-width: 5pt;
    font-size: 20;
  }

  #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
  	}

  .tbl-consulta {
  	width: 60%;
  	margin: auto;
  	position: relative;
  	top: 20px;
  	font-size: 20px;
  	box-shadow: 3px 2px 1px #999999;
  }

  .td-result-borda {
      border-top-color: #566857;
      border-top-style: solid;
      border-top-width: 5pt;
      border-right-color: #566857;
      border-right-style: solid;
      border-right-width: 5pt;
      border-bottom-color: #566857;
      border-bottom-style: solid;
      border-bottom-width: 5pt;
      border-left-color: #566857;
      border-left-style: solid;
      border-left-width: 5pt;
      background-color: #ffffff;
      font-size: 25;
  }

  .td-result-borda-down {

  }
  .td-result {
      background-color: #ffffff;
      font-size: 30;
      text-align: center;
    }

    .td-result-min {
        background-color: #ffffff;
        font-size: 20;
        text-align: center;
    }

  td {
      width: auto;
      padding: 10px;
    	height: 40px;
      border-radius: 10px;
  }
  .cnae{
      text-align: center;
      font-size: 25px;
      background-color: #ffffff;
  }

  </style>
  <body class="fundo_home">
	<?php require_once '../processa/classes/bd.class.php' ?>

    <table class="tbl-consulta">

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
        <td class="td-result" colspan="3">CNAE 000-000-00</td>
			</tr>
    </table>
    <br><br>
    <table id="customers1">
      <tr>
				<td class="td-result-min" colspan="1">Descrição</td>
				<td class="td-result-min" colspan="1">Risco</td>
        <td class="td-result-borda">0</td>
			</tr>

      <tr>
				<td class="" colspan="3">Descrição Descrição</td>
			</tr>

      <tr>
				<td class="" colspan="3">Intervalo de funcionários 0 à 50</td>
			</tr>
    </table>
    <br><br>
    <table class="" id="customers">

      <tr>
				<td class="" colspan="2">Técnico em Segurança do Trabalho</td>
				<td class="">4</td>
			</tr>

      <tr>
				<td class="" colspan="2">Engenheiro Seg. Trabalho</td>
				<td class="">1</td>
			</tr>

      <tr>
				<td class="" colspan="2">Aux. Enfermagem Trabalho</td>
				<td class="">0</td>
			</tr>

      <tr>
				<td class="" colspan="2">Enfermeiro do Trabalho</td>
				<td class="">0</td>
			</tr>

      <tr>
				<td class="" colspan="2">Médico do Trabalho</td>
				<td class="">0</td>
      </tr>
	  </table>
    <br><br><br>
	  <table class="tbl-consulta">
			<tr>
				<td colspan="3">CIPA</td>
			</tr>

      <tr>
				<td colspan="3">Grupo CNAE C1-a</td>
			</tr>

			<tr>
				<td>--></td>
				<td>Efetivo</td>
        <td>1</td>
			</tr>

      <tr>
				<td>--></td>
				<td>Suplente</td>
				<td>1</td>
			</tr>

      <tr>
        <td colspan="3">
          <a style="float: right;" href="../index.php">
          <i  style="float: right;" class="fa fa-3x fa-check-square-o fa-lg"></i>
      	  </a>
        </td>
      </tr>
    </table>
  </body>
</html>
