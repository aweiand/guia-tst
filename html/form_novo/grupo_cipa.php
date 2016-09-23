<html>
<head>
	<link rel="stylesheet" href="../estilos/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../estilos/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cadastro Grupo Cipa</title>
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
		</br><label><b>Grupo Cipa (Preencha todos os campos!)</b></label>
			<p>Cipa</p>
				<input type="text" name="cipa" required="required"/>
			<p>Tipo</p>
				<input type='text' name="tipo" required="required">
			<p>Quantidade</p>
				<input name='quantidade' tpe='number' required="required" />
				<!-- Campo para enviar para o arquivo de cadatro para identificar qual tabela inserir -->
			<input type='hidden' name='menu' value='grupo_cipa' />
			<p><button>Cadastrar</button></p><br>
		</form>
	</div>
</body>
</html>
