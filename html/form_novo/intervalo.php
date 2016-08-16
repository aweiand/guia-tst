<html>
<head>
	<link rel="stylesheet" href="../estilos/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../estilos/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Intervalo Cnae</title>
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
		</br><label><b>Intervalo (Preencha todos os campos!)</b></label>
			<p>Minimo</p>
				<input type="number" name="minimo" required="required"/>
			<p>Maximo</p>
				<input type='number' name="maximo" required="required">
				<!-- Campo para enviar para o arquivo de cadatro para identificar qual tabela inserir -->
			<input type='hidden' name='menu' value='intervalo' />
			<p><button>Cadastrar</button></p><br>
		</form>
	</div>
</body>
</html>
