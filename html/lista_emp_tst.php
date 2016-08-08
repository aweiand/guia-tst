<?php require_once '../processa/classes/empregado.class.php' ?>
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
			<thead class="topo_lista">
				<tr>
					<td colspan="4">
						<strong>Lista de Grupos<strong>
					</td>
				</tr>
			</thead>

		   <tr class="topo_tabela">
		    <!--Nomes Campos-->



		    <th> <style='width: 50% color: #FFF;'>Empregado</th>
			<th> <style='width: 50% color: #FFF;'>Descrição</th>
			<th colspan="2">
			<a href="novo_tst.php" style='text-decoration: none' title='Adicionar um novo CNAE> <style='width: 50%'>
			<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
			</a>
			</th>
		  </tr>
			<?php


				$cor = "#FFF";
				$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";
					echo "<tr>
							<td>
								dado1
								</td>
							<td>
								dado2
							</td>
							<td class='td'>
								<a href='edita_tst.php?COD='>
								<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir Empregado'></i>
								</a>
							</td>
							<td>
								<a href='deleta_tst.php?COD=' onclick='confirma()'>Deleta
								<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar Empregado'></i>
								</a>
							</td>
						</tr>";
						echo "<tr>
							<td>
								dado1
								</td>
							<td>
								dado2
							</td>
							<td class='td'>
								<a href='edita_tst.php?COD='>
								<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir Empregado'></i>
								</a>
							</td>
							<td>
								<a href='deleta_tst.php?COD=' onclick='confirma()'>Deleta
								<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar Empregado'></i>
								</a>
							</td>
						</tr>";

			?>
		  </tr>
		</table>
	</body>
</html>
