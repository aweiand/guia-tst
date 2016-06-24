<?php require_once '../processa/bd.class.php' ?>
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
<<<<<<< HEAD
					<a href="novo_tst.php?tipo=cadastra" style='text-decoration: none;'>Novo</a>
=======
				<a href="novo_tst.php" style='text-decoration: none text-align:center' title='Adicionar um novo CNAE'>
					<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
				</a>
			</th>
>>>>>>> 962870ee0976eafacbe3c3e2f5896a4de1854626

		 </tr>
			<?php
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
<<<<<<< HEAD
								<a href='../processa/novo.php?tipo=editar&num_cnae=".$linha['num_cnae'].'&id_risco= '.$linha_risco['risco'].""."'>Edita</a>
=======
								<a href='edita_tst.php?COD=".$linha['num_cnae']."'>
									<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir CNAE'></i>
								</a>
>>>>>>> 962870ee0976eafacbe3c3e2f5896a4de1854626
							</td>
							<td class='td' style='width: 5%;'>
								<a href='deleta_tst.php?menu=cnae&COD=".$linha['num_cnae']."' onclick='confirma()'>
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
