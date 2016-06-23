<?php  require_once '../processa/bd.class.php' ?>
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
					<td colspan="4">
						<strong>Lista de Grupos<strong>
					</td>
				</tr>
			</thead>
	
		   <tr class="topo_tabela">
		    <!--Nomes Campos-->



		    <th> <style='width: 50%'>Empregado</th>
			<th><style='width: 50%'>Descrição</th>
			<th colspan="2">
			<a href="novo_tst.php" style='text-decoration: none;'> <style='width: 50%'>Novo</a>
			</th>
		  </tr>
			<?php
			$resultado = $bd->get_all('empregado');
			while($linha = mysqli_fetch_array($resultado)){
					echo "<tr>
							<td>". 
								$linha['empregado']
							."</td>
							<td>".
								$linha['descricao']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['id_empregado']."'>Edita</a>
							</td>
							<td>
								<a href='deleta_tst.php?COD=".$linha['id_empregado']."' onclick='confirma()'>Deleta</a>
							</td>
						</tr>";
				}
			?>
		  </tr>
		</table>
	</body>
</html>