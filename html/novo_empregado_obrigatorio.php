novo_empregado_obrigatorio.php

<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	</head>
	<body>
		<form method="GET" action="">
		Risco
		<br />
		<select name="id_risco" required="required"/>
				<option value="">id risco</option>
		</select>
		<br />
		
		intervalo
		<br />
		<select name="id_intervalo" required="required"/>
				<option value="">id intervalo</option>
		</select>
		<br />

		empregado
		<br />
		<select name="id_empregado" required="required"/>
				<option value="">id empregado</option>
		</select>
		<br />

		observação
		<br />
		<select name="id_observacao" required="required"/>
				<option value="">id observação</option>
		</select>
		<br />
		
		Quantidade
		<br />
		<textarea name="quantidade" required="required" />
		
		<br />
		<button>Enviar</button>
	</body>
</html>