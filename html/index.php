<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="estilos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="estilos/style.css">
	<title>Resultado da Pesquisa</title>
  </head>
  <style media="screen">
  td {
      width: auto;
      padding: 10px;
    	height: 40px;
  }
  </style>
  <body class="fundo_home">
	<?php require_once '../processa/classes/bd.class.php' ?>

    <table class="cabecalho-result">

      <tr>
        <td colspan="3">
          <div>
          <img class="logo_resultado" src="img/logo1.png" alt="logo" />
          <a href="../index.php"></a>
          </div>
          <div class="check">
    			<a href="../index.php">
    			<i class="fa fa-2x fa-check-square-o fa-lg" title='Pesquisar novo CNAE'></i>
    			</a>
    		  </div>
        </td>
      </tr>
      <tr>
        <td colspan="3"><h3>CNAE</h3> 000-000-00</td>
			</tr>
    </table>
    <br><br><br><br>
    <table class="tabela1">
      <tr>
				<td colspan="1">Descrição</td>
				<td colspan="1">Risco</td>
        <td class="td-borda">0</td>
			</tr>

      <tr>
				<td class="td-borda" colspan="3"> DescriçãoDescrição Descrição</td>
			</tr>

      <tr>
				<td colspan="3">Intervalo de funcionários 0 à 50</td>
			</tr>
    </table>
    <br>
    <table class="tabela2">

      <tr>
				<td colspan="2">Técnico em Segurança do Trabalho</td>
				<td>4</td>
			</tr>

      <tr>
				<td colspan="2">Engenheiro Seg. Trabalho</td>
				<td>1</td>
			</tr>

      <tr>
				<td colspan="2">Aux. Enfermagem Trabalho</td>
				<td>0</td>
			</tr>

      <tr>
				<td colspan="2">Enfermeiro do Trabalho</td>
				<td>0</td>
			</tr>

      <tr>
				<td colspan="2">Médico do Trabalho</td>
				<td>0</td>
      </tr>
	  </table>
    <br><br><br><br>
	  <table class="tabela3">
			<tr>
				<td colspan="3">CIPA</td>
			</tr>

      <tr>
				<td colspan="3">Grupo CNAE C1-a</td>
			</tr>
    </table>
    <table class="tabela2">
			<tr>
				<td colspan="3">Efetivo</td>
        <td>1</td>
			</tr>

      <tr>
				<td colspan="3">Suplente</td>
				<td>1</td>
			</tr>
    </table>
  </body>
</html>
