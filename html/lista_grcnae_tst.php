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
					<td colspan="4">
						<strong>Lista de CNAE<strong>
					</td>
				</tr>
			</thead>
		 <tr class="topo_tabela">
		    <!--Nomes Campos-->
			<th style='color: #FFF;'>CNAE</th>
			<th style='color: #FFF;'>CIPA</th>
			<th colspan="2">
				<a href="novo_tst.php" style='text-decoration: none text-align:center' title='Novo'>
					<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
				</a>
			</th>
		  </tr>
		  <?php
			$resultado = $bd->get_all('grupo_cnae');
			$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)){
				$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";
					echo "<tr style='background-color: $cor;' >
							<td style='width: 40%;'>".
								$linha['num_cnae']
							."</td>
							<td style='width: 40%;'>".
								$linha['cipa']
							."</td>
							<td class='td' style='width: 10%;'>
								<a href='edita_tst.php?COD=".$linha['cipa']."&COD2=".$linha['num_cnae']."'>
								<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir'></i>
								</a>
							</td>
							<td class='td' style='width: 10%;'>
								<a href='deleta_tst.php?menu=grupo_cnae&COD=".$linha['cipa']."&COD2=".$linha['num_cnae']."' onclick='onfirma()'>
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
