<?php require_once '../processa/classes/cnae.class.php' ?>
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
			if(@$_GET['deleta'] == 'sim'){
				$cnae = new cnae();
				$retorno = $cnae->deleta('cnae', "num_cnae =". $_GET['num_cnae']);
				// / var_dump($retorno);
				// confirma_deleta($retorno);
			}
			$bd = new bd();
			$resultado = $bd->get_all('cnae');
			$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)){
				$resultado_risco = $bd->get_all('risco', "id_risco = '".$linha['id_risco']."'");
				while($linha_risco = mysqli_fetch_array($resultado_risco)){

					// var_dump($linha);

					$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";

					echo "<tr style='background-color: $cor;' >
							<td style='width: 10%;'>".
								$linha['num_cnae']
							."</td>
							<td style='width: 10%;'>".
								$linha_risco['risco'].
							"</td>
							<td style='width: 40%;'>".
								$linha['descricao']
							."</td>
							<td class='td' style='width: 5%;'>
								<a href='lista_cnae.php?deleta=sim&num_cnae=".$linha['num_cnae']."' onclick='confirma()'>
									<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir CNAE'></i>
								</a>
							</td>
							<td class='td' style='width: 5%;'>
								<a href='novo_cnae.php?tipo=editar&menu=cnae&num_cnae=".$linha['num_cnae'].'&dados='.$linha['num_cnae'].'()'.$linha_risco['risco'].'()'.$linha['descricao']."' >
								<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar CNAE'></i>
								</a>
							</td>
						</tr>";
				}
			}
			?>
		</table>
	</body>
</html>
