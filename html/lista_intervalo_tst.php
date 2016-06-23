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
			<th>intervalo</th> <th>maximo</th> <th>minimo</th>
		  </tr>
		  <?php
			$resultado = $bd->get_all('intervalo');
			while($linha = mysqli_fetch_array($resultado)){
					echo "<tr>
							<td>".
								$linha['id_intervalo']
							."</td>
							<td>".
								$linha['maximo']
							."</td>
							<td>".
								$linha['minimo']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['id_intervalo']."'>Edita</a>
							</td>
							<td>
								<a href='deleta_tst.php?menu=intervalo&COD=".$linha['id_intervalo']."' onclick='confirma()'>Deleta</a>
							</td>
						</tr>";
				}
			?>
		  </tr>
		</table>
	</body>
</html>
