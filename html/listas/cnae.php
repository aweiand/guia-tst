<html>
<head>
	<?php require_once '../../processa/classes/cnae.class.php';
				require_once '../../processa/classes/risco.class.php' ?>
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
					<td colspan="5">
						<strong>Lista de CNAE<strong>
					</td>
				</tr>
			</thead>
			<!--Nomes Campos-->
			<tr class="topo_tabela">
				<th style='color: #FFF;'> Cód CNAE</th>
				<th style='color: #FFF;'>Risco</th>
				<th style='color: #FFF;'>Descrição</th>
				<th colspan="2">
					<a href="novo_cnae.php?tipo=cadastrar&menu=cnae" style='text-decoration: none text-align:center' title='Adicionar um novo CNAE'>
						<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
					</a>
				</th>
			</tr>
			<?php
			$resultado = $cnae->get_allCnae();
			$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)):
				$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3"; ?>
				<tr style='background-color: <?php echo $cor ?>;' >
					<td style='width: 10%;'>
							<?php	$linha['num_cnae'] ?>
							."</td>
							<td style='width: 10%;'>".
								$linha['risco'].
							"</td>
							<td style='width: 40%;'>".
								$linha['descricao']
							."</td>
							<td class='td' style='width: 5%;'>
								<a href='deleta_tst.php?menu=cnae&deleta=sim&num_cnae=".$linha['num_cnae']."' onclick='confirma()'>
									<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir CNAE'></i>
								</a>
							</td>
							<td class='td' style='width: 5%;'>
								<a href='novo_cnae.php?tipo=editar&menu=cnae&num_cnae=".$linha['num_cnae'].'&dados='.$linha['num_cnae'].'()'.$linha['risco'].'()'.$linha['descricao']."' >
								<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar CNAE'></i>
								</a>
							</td>
						</tr>";
			<?php endwhile; ?>
		</table>
	</p>
</body>
</html>
