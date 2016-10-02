<html>
	<head>
	<link rel="stylesheet" href="/adrian/font-awesome-4.6.2/font-awesome-4.6.2/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cadastro</title>
		<?php require_once '../processa/bd.class.php'; ?>
	</head>
	<body>
		<!---->
    <?php
		$valores = $bd->get_one('cnae', 'num_cnae = '. $_GET['num_cnae']);
		$valores_risco = $bd->get_one('risco', 'id_risco = '. $_GET['id_risco']);

		//echo $_GET['tipo'] .$valores['num_cnae'];

      ?>
	   <form method="GET" action="../processa/processa_grava.php">
			<p class="centraliza">
			CNAE
			(Preencha todos os campos!)
			<br />
			<br />
			Código
			<br />
			<input type="text" name="num_cnae" value="<?php $bd->value_edita($_GET['tipo'], $valores['num_cnae']); ?>" required="required"/>
			<br />
			Denominação
			<br />
			<input type="text" name="descricao" value="<?php $bd->value_edita($_GET['tipo'], $valores['descricao']); ?>" required="required"/>
			<br />
			GR
			<br />
			<input type="number" name="id_risco" value="<?php $bd->value_edita($_GET['tipo'], $valores_risco['risco']); ?>"  required="required"/>
			<br />
			<br />
			<a href="lista_cnae.php" style='text-decoration: none;'>
				<i class='fa fa-2x fa-check-square-o fa-lg' style='color:black;'></i>
			<br />
