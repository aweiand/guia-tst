<html>
	<head>
		<?php require_once '../../processa/classes/grupo.class.php' ?>
		<link rel="stylesheet" href="../estilos/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../estilos/style.css">
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
						<strong>Lista de Grupos<strong>
					</td>
				</tr>
			</thead>
			<tbody>
			 <tr class="topo_tabela">
				<!--Nomes Campos-->
				<th style='color: #FFF;'>CIPA</th>
				<th style='color: #FFF;'>Descrição</th>
				<th colspan="2">
					<a href="../form_novo/grupo.php?tipo=cadastrar" style='text-decoration: none text-align:center' title='Adicionar um novo CNAE'>
						<i class='fa fa-2x fa-plus-square-o fa-lg' style='color: black;'></i>
					</a>
				</th>
			  </tr>
				 <?php
					$resultado = $bd->get_all('grupo');
					$cor = "#FFF";
					while($linha = mysqli_fetch_array($resultado)){
						$cor == "#c7efc3" ? $cor = "#FFF" : $cor = "#c7efc3";
						echo "<tr style='background-color: $cor;' >
									<td style='width: 10%;'>".
										utf8_encode($linha['cipa'])
									."</td>
									<td style='width: 80%;'>".
										utf8_encode($linha['descricao'])
									."</td>
									<td class='td' style='width: 5%;'>
										<a href='edita_tst.php?COD=".$linha['cipa']."'>
											<i class='fa fa-1g fa-trash fa-lg' style='color:black' title='Excluir CNAE'></i>
										</a>
									</td>
									<td style='width: 5%;'>
										<a href='deleta_tst.php?menu=grupo&COD=".$linha['cipa']."&descricao=". $linha['descricao']."' onclick='confirma()'>
											<i class='fa fa-1g fa-pencil fa-lg' style='color:black' title='Editar CNAE'></i>
										</a>
									</td>
								</tr>";
						}
					?>
			  </tr>
		  </tbody>
		</table>
	</body>
</html>
