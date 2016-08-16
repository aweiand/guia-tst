

<html>
	<head>
		<?php
			require_once '../../processa/classes/cnae.class.php';
			require_once '../../processa/classes/utils.class.php';
			require_once '../../processa/classes/risco.class.php';
		?>
		<link rel="stylesheet" href="../estilos/style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body class="fundo_home">

		<form class="home" method="GET" action="">

			<br><label><b>CIPA</b></label><br>
				<select name="cipa" required="required"/>
				<option value="">cipa</option>
			</select><br>

			<br><label><b>Tipo</b></label><br>
				<input type="text" name="tipo" required="required"/><br>

			<br><label><b>Intervalo</b></label><br>
				<select name="id_intervalo" required="required"/>
				<option value="">Id Intervalo</option>
				</select><br>

			<br><label><b>Quantidade</b></label><br>
				<textarea name="quantidade" required="required"></textarea><br>

			<br><button>Enviar</button><br><br><br>

	</body>
</html>
