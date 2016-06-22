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
					echo '<tr>';
					echo "<td>".$linha['cnae']."</td> <td>".$linha['cipa'].'</td>';
					echo '<td class="td"><a href="edita_tst.php?COD=$linha['cipa'] . $linha['cnae']">Edita</a></td><td> <a href="deleta_tst.php?COD=$linha['cipa'] . $linha['cnae']" onclick="confirma()">Deleta</a></td>';
					echo '</tr>';
				}
			?>
		  </tr>
		</table>
	</body>
</html>
