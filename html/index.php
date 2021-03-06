<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="estilos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="estilos/style.css">
	<title>Resultado da Pesquisa</title>
  <?php require_once '../processa/classes/resultado.class.php';?>
  <style media="screen">
  td {
    width: auto;
    padding: 10px;
    height: 40px;
  }
  </style>
  </head>
  <?php

  $numero_empregados = $_GET['numero_empregados'];
  $numero_cnae = $_GET['num_cnae'];

  $resultado_consulta_nr4 = $resultadoGuia->getResultadoTabelaNR4($numero_cnae, $numero_empregados);
  $resultado_consulta_nr4_empregado = $resultadoGuia->getResultadoTabelaNR4($numero_cnae, $numero_empregados);
  $DadosTabelaNR4 = $resultado_consulta_nr4->fetch_array();

  ?>
  <body class="fundo_home">
    <table class="cabecalho-result">
      <tr>
        <td colspan="3">
          <div>
          <img class="logo_resultado" src="img/logo1.png" alt="logo" />
          <a href="../index.php"></a>
          </div>
          <div class="check">
    			<a href="../index.php">
    			<i class="fa fa-2x fa-arrow-left fa-lg" title='Pesquisar novo CNAE'></i>
    			</a>
    		  </div>
        </td>
      </tr>
      <tr>
        <td colspan="3"><h3>CNAE</h3> <?php echo $numero_cnae; ?></td>
			</tr>
    </table>
    <br><br><br><br>
    <table class="tabela1">
      <tr>
				<td colspan="1">Descrição</td>
				<td colspan="1">Risco</td>
        <td class="td-borda"><?php echo utf8_encode($DadosTabelaNR4['risco']) ?></td>
			</tr>

      <tr>
				<td class="td-borda" colspan="3"> <?php echo utf8_encode($DadosTabelaNR4['cnae_descricao']); ?></td>
			</tr>

      <tr>
			<?php echo '<td colspan="3">Intervalo de funcionários '.utf8_encode($DadosTabelaNR4['minimo']).' à '.utf8_encode($DadosTabelaNR4['maximo']).'</td>'  ?>
			</tr>
    </table>
    <br>
    <table class="tabela2">
      <?php
      while ($dados_tabela_EmpregadoObrigatorio = mysqli_fetch_array($resultado_consulta_nr4_empregado)):
        echo "<tr>
        				<td colspan='2'>". utf8_encode($dados_tabela_EmpregadoObrigatorio['descricao']) ."</td>
        				<td> ".utf8_encode($dados_tabela_EmpregadoObrigatorio['quantidade'])." </td>
        			</tr>";

      endwhile;
       ?>
	  </table>

    <br><br>
    <!-- Dados sobre a cipa -->
	  <table class="tabela3">
			<tr>
				<td colspan="3">CIPA</td>
			</tr>

      <tr>
        <?php $DadosCipa = $resultadoGuia->getResultadoTabelaNR5($numero_cnae, $numero_empregados);
        $DadoCipaTratado = mysqli_fetch_assoc($DadosCipa);
        ?>
				<td colspan="3">Grupo <?php echo utf8_encode($DadoCipaTratado['cipa']).' '.utf8_encode($DadoCipaTratado['descricao']) ?></td>
			</tr>
    </table>
    <table class="tabela2">
      <?php
      $DadosCipa = $resultadoGuia->getResultadoTabelaNR5($numero_cnae, $numero_empregados);
      while($dados_cipa = mysqli_fetch_array($DadosCipa)):
         if($dados_cipa['tipo'] === '0'):
          echo "<tr>
                  <td colspan='3'> Efetivo</td>
                  <td>".utf8_encode($dados_cipa['quantidade']).'</td>
                </tr>';
          elseif($dados_cipa['tipo'] === '1'):
          echo "<tr>
                  <td colspan='3'> Suplente</td>
                  <td>".utf8_encode($dados_cipa['quantidade']).'</td>
                </tr>';
          endif;
         endwhile;
        ?>
    </table>
    <br><br><br>
  </body>
</html>
