<?php require_once '../processa/bd.class.php' ?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script>
			function confirma(){
				if (!confirm('Deseja Excluir')){
					return false;
				}
			}
		</script>
	</head>
	<body>
		<?php include "menu.php"; ?>	
		<p class="centraliza">
		<a href="novo_tst.php" style='text-decoration: none;'>Novo</a>
	<table style="width:50%">
		  <tr>
		    <!--Nomes Campos-->

		

			<th> Cód CNAE</th> <th>Risco</th> <th>Descrição</th>

		  </tr>
			<?php
			$resultado = $bd->get_all('cnae');
			while($linha = mysqli_fetch_array($resultado)){
				$resultado_risco = $bd->get_all('risco', "id_risco = '".$linha['id_risco']."'");
				while($linha_risco = mysqli_fetch_array($resultado_risco)){
					echo "<tr>
							<td>".
								$linha['cnae']
							."</td>
							<td>".
								$linha_risco['risco'].
							"</td>
							<td>".
								$linha['descricao']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['cnae']."'>Edita</a>
							</td>
							<td class='td'>
								<a href='deleta_tst.php?COD=".$linha['cnae']."' onclick='confirma()'>Deleta</a>
								</td>
						</tr>";
				}
			}
			?>
		</table>
	</body>
