<html>
	<head>
		<?php
			require_once '../../processa/classes/cnae.class.php';
			require_once '../../processa/classes/utils.class.php';
			require_once '../../processa/classes/risco.class.php';
		?>
		<link rel="stylesheet" href="../estilos/font-awesome-4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="../estilos/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Novo CNAE</title>
	</head>
	<body class="fundo_home">
		<!---->
		<?php
			@$dados = $_GET['dados'];
			@$dados = explode("()", $dados);
			// echo $dados[1];
		?>
		<form class="home" method="GET" action="../../processa/processa_grava.php">
			<br><label><b>CNAE (Preencha todos os campos!)</b></label><br>
			<p>Código</p>
				<input type="text" name="num_cnae" value=" <?php echo @value_edita($_GET['tipo'], $dados[0]); ?> " required="required"/>
			<p>Descrição</p>
				<textarea name="descricao" required="required"><?php echo @value_edita($_GET['tipo'], $dados[2]); ?> </textarea>
			<p>Grau do risco</p>
				<!-- <input type="number" name="id_risco" value="<?php echo @value_edita($_GET['tipo'], $dados[1]); ?>"  required="required"/> -->
				<select name='id_risco' selected='selecionado'>
					<?php
						$resultado = $risco->get_allRisco();
						while($linha = mysqli_fetch_array($resultado)){

							//echo "<option value='".$linha['id_risco']."' required>". $linha['risco']." </option> ";

							if($dados[1] == $linha['id_risco']){
								echo "<option value=".$linha['id_risco']." required selected>". $linha['risco']." </option> ";
								// echo 'select';
							}else{
								echo "<option value=".$linha['id_risco']." required>". $linha['risco']." </option> ";
							}
						}
					?>

				</select>
			<input type='hidden' name='tipo' value='<?php echo edita_cadastra($_GET['tipo']); ?>' />
			<input type='hidden' name='menu' value='cnae' />
			<input type='hidden' name='where' value='<?php echo @value_edita($_GET['tipo'], $dados[0]); ?>' />
			<p><button><?php echo edita_cadastra($_GET['tipo']); ?></button></p><br>
		</form>
		<p><a href="lista_cnae.php" style='text-decoration: none;'><i class='fa fa-chevron-left' style='color:black;'></i></a></p>
