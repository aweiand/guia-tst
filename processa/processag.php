<?php
	require_once 'bd.class.php';

	//grava form cnae
	$bd->insere('cnae', "$_GET['cnae'], $_GET['id_risco'], $_GET['descricao']");

	//grava form risco
	$bd->insere('risco', " '', $_GET['risco'], $_GET['descricao'] " );

	//grava form empregado
	$bd->insere('empregado', );

	//lista cnae
	?>

	<table style="width:50%">
		  <tr>
		    <!--Nomes Campos-->
			<th> Cód CNAE</th> <th>Risco</th> <th>Descrição</th>
		  </tr>
		<?php
		$resultado = $bd->get_all('cnae');
		while($linha = mysql_fetch_array($resultado)){
			$resultado_risco = $bd->get_all('risco', "id_risco = '$linha['id_risco']'");
			while($linha_risco = mysql_fetch_array($resultado_risco)){
			echo '<tr>';
			echo "<td>$linha['cnae']</td> <td>$linha['id_risco']</td> <td>$linha['descricao']</td>";
			echo '<td class="td"><a href="edita_tst.php">Edita</a> <a href="deleta_tst.php">Deleta</a></td>';
			echo '</tr>';
			}
		}
		?>
		</table>
