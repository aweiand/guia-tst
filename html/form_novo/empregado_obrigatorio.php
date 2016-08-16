<html>
	<head>
		<?php
			require_once '../../processa/classes/utils.class.php';
			require_once '../../processa/classes/empregado.obrigatorio.class.php';
			require_once '../../processa/classes/risco.class.php';
		?>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; chaset=utf-8" />
	</head>
	<body class="fundo_home">
		<form class="home" method="GET" action="../processa/processa_grava.php">
			<br><label><b>Risco</b></label><br>
				<select name="id_risco" required="required"/>
				<option value="">id risco</option>
				</select><br>

			<br><label><b>Intervalo</b></label><br>
				<select name="id_intervalo" required="required"/>
				<option value="">id intervalo</option>
				</select><br>

			<br><label><b>Empregado</b></label><br>
				<select name="id_empregado" required="required"/>
				<option value="">id empregado</option>
				</select><br>

			<br><label><b>Observação</b></label><br>
				<select name="id_observacao" required="required"/>
				<option value="">id observação</option>
				</select><br>

			<br><label><b>Quantidade</b></label><br>
				<textarea name="quantidade" required="required"></textarea><br><br>
			<button>Enviar</button><br><br>
	</body>
</html>
