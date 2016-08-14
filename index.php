<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="html/estilos/style.css">
			<link rel="stylesheet" href="html/estilos/font-awesome/css/font-awesome.min.css">
		<title>Pesquisa CNAE</title>
	</head>
	<body class="fundo_home">

		<form  class="home" method="GET" action="html/">

			<img class="logo" src="html/img/logo1.png" alt="logo">

			<div class="engrenagem">
				<a href="html/listas">
				<i class="fa fa-2x fa-cog" aria-hidden="true" style='color:black;'></i>
			</a>
			</div>
				<br><label><b>Código CNAE</b></label><br>
			<input type="text" class="pesquisa-codigo" autofocus="autofocus" name="num_cnae" required="required" placeholder="00.00-0" maxlength="5" minlength="5"/><br>
				<label><b>Funcionários</b></label><br>
			<input type="text" class="pesquisa-funcionario" name="id_intervalo" required="required" placeholder="000000" maxlength="6"/>
			<br><br><button class="bt"> <i  class="fa fa-3x fa-check-square-o fa-lg"></i></button><br><br>
			<b></b>
		</form>
	</body>
</html>
