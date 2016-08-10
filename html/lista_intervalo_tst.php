<?php require_once '../processa/classes/bd.class.php' ?>
<html>
	<head>
		<link rel="stylesheet" href="font-awesome-4.6.2/css/font-awesome.min.css">
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
	<body class="fundo_home">
		<?php include "menu.php"; ?>
		<p class="centraliza">
		<table>
			<thead class="topo_lista_min">
				<tr>
					<th>Intervalo</th> <th>Máximo</th> <th>Mínimo</th> <th colspan="2">
						<a href="novo_intervalo.php" style='text-decoration: none text-align:center ' title='Adicionar um novo CNAE'>
							<i class='fa fa-1g fa-plus-square-o fa-lg' style='color: black; '></i>
						</a>
				</th>
					</tr>
			</thead>
		  <?php
			$resultado = $bd->get_all('intervalo');
			$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)){
			$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";
					echo "<tr tr style='background-color: $cor;'>
							<td style='width: 60%;'>".
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
