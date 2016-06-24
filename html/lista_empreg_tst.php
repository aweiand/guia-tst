<?php  require_once '../processa/bd.class.php' ?>
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
					<td colspan="3">
						<strong>Empregado<strong>
							<a href="novo_tst.php" style='text-decoration: none text-align:center ' title='Adicionar um novo CNAE'>
							<i class='fa fa-1g fa-plus-square-o fa-lg' style='color: black; float:right'></i>
							</a>
					</td>
				</tr>
			</thead>
				<?php
				$bd = new bd();
				$resultado = $bd->get_all('empregado');
				$cor = "#FFF";
				while($linha = mysqli_fetch_array($resultado)){
				$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";
						echo "<tr style='background-color: $cor;' >
									<td  style='width: 60%;'>".
										$linha['descricao']
									."</td>
									<td class='td' style='width: 5%;'>
										<a href='edita_tst.php?COD=".$linha['id_empregado']."'>
										<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir CNAE'></i>
										</a>
									</td>
									<td class='td' style='width: 5%;'>
										<a href='deleta_tst.php?menu=empregado&COD=".$linha['id_empregado']."' onclick='confirma()'>
										<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar CNAE'></i>
										</a>
									</td>
							</tr>";
					}
				?>
		</table>
	</body>
</html>
