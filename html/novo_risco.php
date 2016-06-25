<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	</head>
	<body>
		<form method="GET" action="../processa/processa_grava.php">
			Risco
				<br />
				<input type="number" name="risco" required="required"/>
				<br />
				<br/>
			Descrição
				<br />
				<input type="text" name="descricao" required="required"/>
				<br />
			<input type='hidden' name='menu' value='risco'/>
				<br/>
			<button>
				<?php
					if($_GET['tipo'] == 'cadastra'){
						echo 'Cadastrar';
					}elseif($_GET['tipo'] == 'editar'){
						echo 'Editar';
					}
				?>
			</button>
		</form>
	</body>
</html>
