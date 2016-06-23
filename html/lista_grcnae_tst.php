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
		<a href="novo_tst.php" style='text-decoration: none;'>Novo</a>
		<table style="width:50%">
		  <tr>
		    <!--Nomes Campos-->
			<th>CNAE</th> <th>CIPA</th>
		  </tr>
		  <?php
			$resultado = $bd->get_all('grupo_cnae');
			while($linha = mysqli_fetch_array($resultado)){
					echo "<tr>
							<td>".
								$linha['num_cnae']
							."</td>
							<td>".
								$linha['cipa']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['cipa']."&COD2=".$linha['num_cnae']."'>Edita</a>
							</td>
							<td>
								<a href='deleta_tst.php?menu=grupo_cnae&COD=".$linha['cipa']."&COD2=".$linha['num_cnae']."' onclick='onfirma()'>Deleta</a>
							</td>
						</tr>";
				}
			?>
		  </tr>
		</table>
	</body>
</html>
