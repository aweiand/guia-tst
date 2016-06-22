<?php require_once '../processa/bd.class.php'?>
<html>
	<head>
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
	<body>
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
			
			<th>Cód CNAE</th> 
			<th>Risco</th> 
			<th>Descrição</th>
			<th colspan="2">
				<a href="novo_tst.php" style='text-decoration: none;'>Novo</a>
			</th>
		</tr>
			<?php
			$resultado = $bd->get_all('cnae');
			while($linha = mysqli_fetch_array($resultado)){
				$resultado_risco = $bd->get_all('risco', "id_risco = '".$linha['id_risco']."'");
				while($linha_risco = mysqli_fetch_array($resultado_risco)){
					echo "<tr>
							<td style='width: 10%;'>".
								$linha['cnae']
							."</td>
							<td style='width: 10%;'>".
								$linha_risco['risco']
							."</td>
							<td style='width: 40%;'>".
								$linha['descricao']
							."</td>
							<td class='td' style='width: 5%;'>
								<a href='edita_tst.php'>Edita</a>
							</td>
							<td class='td' style='width: 5%;'>
									<a href='deleta_tst.php' onclick='confirma()';>Deleta</a>
							</td>
						</tr>";
				}
			}
			?>
		</table>
	</body>
</html>