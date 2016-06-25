<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php require_once '../processa/tst.classe.php'; ?>
	</head>
	<body>
		<form method="GET" action="../processa/processa_grava.php" required="required">
		Minimo
		<br />
		<input type="number" name="minimo" required="required"/>
		<br />
		Maximo
		<br />
		<input type="number" name="maximo" required="required"/>
		<br />
		
		<button><?php @edita_cadastra($_GET['menu']); ?></button>
	</body>
</html>
