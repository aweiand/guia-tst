<html>
	<head>
		<?php require_once '../../processa/classes/grupo_cipa.class.php' ?>
		<link rel="stylesheet" href="../estilos/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../estilos/style.css" />
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
		<table style="width:100%">

			<thead class="topo_lista">
				<tr>
					<td colspan="6">
						<strong>Lista de CIPA<strong>
					</td>
				</tr>
			</thead>
		  <tr class="topo_tabela">
		    <!--Nomes Campos-->
				<th style='color: #FFF;'>CIPA</th>
				<th style='color: #FFF;'>Tipo</th>
				<th style='color: #FFF;'>maximo</th>
				<th style='color: #FFF;'>minimo</th>
			<th colspan="2">
				<a href="../form_novo/grupo_cipa.php" style='text-decoration: none text-align:center' title='Adicionar um novo CNAE'>
					<i class="fa fa-2x fa-plus-square-o fa-lg" style='color: black;'></i>
				</a>
			</th>
		  </tr>
		  <?php
			$resultado = $bd->get_all('grupo_cipa');
				$cor = "#FFF";
			while($linha = mysqli_fetch_array($resultado)){
				//while($linha_intervalo = mysqli_fetch_array($resultado_intervalo)){
				$resultado_intervalo = $bd->get_all('intervalo', "id_intervalo = '".$linha['id_intervalo']."'");

						$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";

					echo "<tr style='background-color: $cor;'>
							<td style='width: 10%;'>".
								utf8_encode($linha['cipa'])
							."</td>
							<td style='width: 10%;'>".
								utf8_encode($linha['tipo'])
							."</td>
							<td style='width: 20%;'>".
								utf8_encode($linha_intervalo['maximo'])
							."</td>
							<td style='width: 20%;'>".
								utf8_encode($linha_intervalo['minimo'])
							."</td>
							<td class='td' style='width: 5%;'>
								<a href='edita_tst.php?COD=".$linha['cipa']."&COD2=".$linha['tipo']."'>
								<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir CNAE'></i>
								</a>
							</td>
							<td class='td' style='width: 5%;'>
								<a href='deleta_tst.php?menu=grupo_cipa&cipa=".$linha['cipa']."&tipo=".$linha['tipo']."' onclick='confirma()'>
								<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar CNAE'></i>
								</a>
							</td>
						</tr>";
				//}
			}
			?>

		</table>
	</body>
</html>
