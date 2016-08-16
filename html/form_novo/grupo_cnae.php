novo_grupo_cnae.php

<html>
	<head>
		<?php
			require_once '../../processa/classes/cnae.class.php';
			require_once '../../processa/classes/utils.class.php';
			require_once '../../processa/classes/risco.class.php';
		?>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<form method="GET" action="">
		cipa
		<br />
		<select name="cipa" required="required"/>
				<option value="">cipa</option>
		</select>
		<br />

		numero do cnae
		<br />
		<select name="num_cnae" required="required"/>
				<option value="">numero do cnae</option>
		</select>
		<br />

		<button>Enviar</button>
	</body>
</html>
