<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php require_once '../processa/bd.class.php'; ?>
	</head>
	<body>
		<?php include "menu.php"; ?>
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
					echo "<tr>
							<td>".
								$linha['cipa']
							."</td>
							<td>".
								$linha['tipo']
							."</td>
							<td>".
								$linha_intervalo['maximo']
							."</td>
							<td>".
								$linha_intervalo['minimo']
							."</td>
							<td class='td'>
								<a href='edita_tst.php?COD=".$linha['cipa']."&COD2=".$linha['tipo']."'>Edita</a>
							</td>
							<td class='td'>
								<a href='deleta_tst.php?menu=grupo_cipa&cipa=".$linha['cipa']."&tipo=".$linha['tipo']."' onclick='confirma()'>Deleta</a>
							</td>
						</tr>";
				}
			}
			?>
		  </tr>
		</table>
	</body>
</html>
