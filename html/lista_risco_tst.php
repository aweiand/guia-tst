<?php
	require_once '../processa/classes/bd.class.php';
	require_once '../processa/classes/risco.class.php';
?>
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
					<td colspan="5">
						<strong>Lista de CNAE<strong>
					</td>
				</tr>
			</thead>
		  <tr class="topo_tabela">
		    <!--Nomes Campos-->
			<th style='color: #FFF;'>Id</th>
			<th style='color: #FFF;'>Risco</th>
			<th style='color: #FFF;'>Descrição</th>
			<th colspan="2">
				<a href="novo_risco.php?tipo=cadastra" style='text-decoration: none text-align:center' title='Adicionar'>
					<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
				</a>
			</th>

		  </tr>
		  <?php
			$risco = new risco();
			$resultado = $risco->get_allRisco();
			$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)){
				$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";

					echo "<tr style='background-color: $cor;' >
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
								<a href='deleta_tst.php?menu=risco&id_risco=".$linha['id_risco']."'>
								<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir'></i>
								</a>
							</td>
							<td>
								<a href='novo_risco.php?tipo=editar&menu=risco&id_risco=".$linha['id_risco'].'&risco='.$linha['risco'].'&descricao='.$linha['descricao']."'>
								<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar'></i>
								</a>
							</td>
						</tr>";
				}
			?>
		  </tr>
		</table>
	</body>
</html>
