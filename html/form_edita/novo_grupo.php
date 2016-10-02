<html>
<head>
	<?php 	require_once '../processa/classes/grupo.class.php';
			require_once '../processa/classes/utils.class.php'; ?>
	<link rel="stylesheet" href="font-awesome-4.6.2/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cadastro Grupo</title>
</head>
<body class="fundo_home">

	<?php 	@$dados = $_GET['dados'];
			@$dados = explode("()", $dados);	?>

	<form class="home" method="GET" action="../processa/processa_grava.php">
		<label><b>Grupo (Preencha todos os campos!)</b></label><br>
		<p>Cipa</p>
			<input type="text" name="cipa" value=" <?php echo @value_edita($_GET['tipo'], $dados[0]); ?> " required="required"/>
		<p>Descrição</p>
			<textarea name="descricao" required="required"><?php echo @value_edita($_GET['tipo'], $dados[2]); ?></textarea>
		<input type='hidden' name='tipo' value='<?php echo edita_cadastra($_GET['tipo']); ?>' />
		<input type='hidden' name='menu' value='grupo' />
		<input type='hidden' name='where' value='<?php echo value_edita(@$_GET['tipo'], $dados[0]); ?>' />
		<p><button><?php echo edita_cadastra($_GET['tipo']); ?></button></p><br>
		<i class='fa fa-chevron-left' style='color:black;'></i>
	</form>
	<p><a href="lista_grupo_tst.php" style='text-decoration: none;'></a></p>

</body>
</html>