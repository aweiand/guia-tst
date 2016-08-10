<html>
	<head>
		<?php
			require_once '../processa/classes/cnae.class.php';
			require_once '../processa/classes/utils.class.php';
			require_once '../processa/classes/risco.class.php';
		?>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body class="fundo_home">
		<form class="home" method="GET" action="../processa/processa_grava.php" required="required">

			<br><b>Risco</b><br>
			<input type="number" name="minimo" required="required"/><br><br>

			<b>Máximo</b><br>
			<input type="number" name="maximo" required="required"/><br>

			<br><button>Enviar<?php @edita_cadastra($_GET['menu']); ?></button><br><br>
	</body>
</html>
