<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	</head>
	<body>
		<p class="centraliza">
		<a href="novo_tst.php" style='text-decoration: none;'>Novo</a>
		<table style="width:50%">
		  <tr>
		    <!--Nomes Campos-->
			<th>CIPA</th> <th>Tipo</th> <th>maximo</th><th>minimo</th>
		  </tr>
		  <?php
			$resultado = $bd->get_all('grupo_cipa');
			while($linha = mysqli_fetch_array($resultado)){
				$resultado_intervalo = $bd->get_all('intervalo', "id_intervalo = '".$linha['id_intervalo']."'");
				while($linha_intervalo = mysqli_fetch_array($resultado_intervalo)){
					echo '<tr>';
					echo "<td>".$linha['cipa']."</td> <td>".$linha['tipo'].'</td><td>'.$linha_intervalo['maximo'].'</td><td>'.$linha_intervalo['minimo'].'</td>';
					echo '<td class="td"><a href="edita_tst.php?COD=$idx">Edita</a></td><td class="td"> <a href="deleta_tst.php?COD=$idx" onclick="confirma()">Deleta</a></td>';
					echo '</tr>';
				}
			}
			?>
		  </tr>
		</table>
	</body>
</html>
