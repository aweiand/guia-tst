<?php  require_once '../processa/bd.class.php'?>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	</head>
	<body>
		<?php include "menu.php"; ?>	
		<p class="centraliza">
		<a href="novo_tst.php" style='text-decoration: none;'>Novo</a>
	<table style="width:50%">
		  <tr>
		    <!--Nomes Campos-->
			<?php
			$resultado = $bd->get_all('empregado');
			while($linha = mysqli_fetch_array($resultado)){
					echo '<tr>';
					echo "<td>".$linha['empregado']."</td> <td>'.$linha['descricao'].'</td>';
					echo '<td class="td"><a href="edita_tst.php">Edita</a></td><td> <a href="deleta_tst.php">Deleta</a></td>';
					echo '</tr>';
				}
			}
			?>
		  </tr>
		</table>
	</body>
</html>
