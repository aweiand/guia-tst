<html>
	<head>
		<?php require_once '../../processa/classes/empregado.class.php' ?>
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
				<thead class="topo_lista">
					<tr>
						<td colspan="4">
							<strong>Lista empregados<strong>
						</td>
					</tr>
				</thead>
				<!--Nomes Campos-->
				<tr class="topo_tabela">
					<th style='width: 50% color: #FFF;'>Descrição</th>
					<th colspan="2">
						<a href="../form_novo/empregado.php" style="text-decoration: none; width: 50%;" title="Adicionar um novo CNAE">
							<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
						</a>
					</th>
			  </tr>
				<?php
				$resultado = $empregado->get_allEmpregado();
				$cor = "#FFF";
				while($linha = mysqli_fetch_array($resultado)):
					$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3"; ?>
						<tr style='background-color: <?php echo $cor ?>;' >
							<td style='width: 60%;'>
								<?php echo utf8_encode($linha['descricao']); ?>
							</td>
							<td class='td'  style='width: 5%;'>
										<a href='../../processa/processos/deleta.php' onclick='confirma()'>
										<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir Empregado'></i>
										</a>
							</td>
							<td class='td'  style='width: 5%;'>
								<a href='../../processa/processos/editar.php' >
									<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar Empregado'></i>
								</a>
							</td>
						</tr>
					<?php endwhile; ?>
			</table>
	</p>
	</body>
</html>
