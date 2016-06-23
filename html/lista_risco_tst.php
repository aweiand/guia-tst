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
			<th>id</th> <th>risco</th> <th>descrição</th>
		  </tr>
		  <?php
			$resultado = $bd->get_all('risco');
			while($linha = mysqli_fetch_array($resultado)){
					echo "<tr>
							<td>".
								$linha['id_risco']
							."</td>
							<td>".
								$linha['risco']
							."</td>
							<td>".
								$linha['descricao']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['id_risco']."'>Edita</a>
							</td>
							<td>
								<a href='deleta_tst.php?menu=risco&COD=".$linha['id_risco']."' onclick='confirma()'>Deleta</a>
							</td>
						</tr>";
				}
			?>
		  </tr>
		</table>
	</body>
</html>
