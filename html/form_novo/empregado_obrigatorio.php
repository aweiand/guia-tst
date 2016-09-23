<html>
<head>
	<link rel="stylesheet" href="../estilos/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../estilos/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cadastro Empregado Ori</title>
</head>
<body class="fundo_home">
	<div class="home">
		<!--  Botão voltar-->
		<div class="engrenagem">
			<a href="../listas/" style='text-decoration: none;'>
				<i class='fa fa-chevron-left' style='color:black;'></i>
			</a>
		</div>
		<!-- Formulario  -->
		<form  method="GET" action="../../processa/processa_grava.php">
		</br><label><b>Empregado Obrigatório (Preencha todos os campos!)</b></label>
			<p>Risco</p>
				<input type="text" name="num_cnae" required="required"/>
			<p>Intervalo</p>
				<textarea name="descricao" required="required"></textarea>
			<p>Empregado</p>
				<select name='id_risco' selected='selecionado'=>
					<?php	$resultado = $risco->get_allRisco();
					while($linha = mysqli_fetch_array($resultado)):
						echo "<option value=".$linha['id_risco'].">". $linha['risco']." </option> ";
					endwhile; ?>
				</select>
				<!-- Campo para enviar para o arquivo de cadatro para identificar qual tabela inserir -->
			<input type='hidden' name='menu' value='cnae' />
			<p><button>Cadastrar</button></p><br>
		</form>
	</div>
</body>
</html>
