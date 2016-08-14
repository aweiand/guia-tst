<html>
	<head>
		<?php 	require_once '../processa/classes/utils.class.php'; ?>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	</head>
	<body>
		<form method="GET" action="../processa/processa_grava.php">
			Risco
				<br />
				<input type="number" name="risco" required="required" value='<?php echo @value_edita($_GET['tipo'], $_GET['risco']); ?>'/>
				<br />
				<br/>
			Descrição
				<br />
				<input type="text" name="descricao" required="required" value='<?php echo @value_edita($_GET['tipo'], $_GET['descricao']) ?>'/></textarea>
				<br />
			<input type='hidden' name='menu' value='risco'/>
				<br/>
				<?php
					if($_GET['tipo'] == 'cadastra'){
						$tipo =  'Cadastrar';
					}elseif($_GET['tipo'] == 'editar'){
						$tipo = 'Editar';
						echo "<input type='hidden' name='id_risco' value='".@$_GET['id_risco']."'/>";
					}
				?>
				<input type='hidden' name='tipo' value='<?php echo $tipo; ?>' />
			<button>
				<?php echo $tipo; ?>
			</button>
		</form>
	</body>
</html>
