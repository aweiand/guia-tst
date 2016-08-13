<html>
	<head>
		<?php  require_once '../../processa/classes/observacao.class.php' ?>
		<link rel="stylesheet" href="../estilos/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../estilos/style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script>
			function confirma(){
				if (!confirm('Deseja Excluir')){
					return false;
				}
			}
		</script>
	</head>
	<body class="fundo_home">
		<?php include "menu.php"; ?>
		<p class="centraliza">
			<table>
				<thead class="topo_lista_min">
					<tr class="topo_tabela">
						<th>ID</th> <th>Observação</th> <th colspan="2">
							<a href="novo_obs.php" style='text-decoration: none text-align:center ' title='Adicionar um novo CNAE'>
								<i class='fa fa-1g fa-plus-square-o fa-lg' style='color: black; '></i>
							</a>
					</th>
				</tr>
			</thead>
		  <?php
			$resultado = $bd->get_all('observacao');
			$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)){
				$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";
					echo "<tr tr style='background-color: $cor;' >
							<td>".
								$linha['id_observacao']
							."</td>
							<td>".
								$linha['observacao']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['id_observacao']."'>Edita</a>
							</td>
							<td>
								<a href='deleta_tst.php?menu=observacao&COD=".$linha['id_observacao']."' onclick='confirma()'>Deleta</a>
							</td>
						</tr>";
				}
			?>
		</table>
	</body>
</html>
