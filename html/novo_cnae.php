<html>
	<head>
		<?php require_once '../processa/tst.classe.php' ?>
	<link rel="stylesheet" href="font-awesome-4.6.2/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cadastro</title>
	</head>
	<body>
		<!---->
		<?php
			@$dados = $_GET['dados'];
			@$dados = explode("()", $dados);
		?>
		<form method="GET" action="../processa/processa_grava.php">
			<p class="centraliza">
				CNAE (Preencha todos os campos!)
			</p>
			<p>Código</p>
				<input type="text" name="num_cnae" value=" <?php echo @value_edita($_GET['tipo'], $dados[0]); ?> " required="required"/>
			<p>Descrição</p>
				<textarea name="descricao" required="required"><?php echo @value_edita($_GET['tipo'], $dados[2]); ?></textarea>
			<p>Grau do risco</p>
				<!-- <input type="number" name="id_risco" value="<?php echo @value_edita($_GET['tipo'], $dados[1]); ?>"  required="required"/> -->

					<?php
					// echo $dados[1];
					echo "<select name='id_risco' selected='selecionado'>";
						$risco = new risco();
						$resultado = $risco->get_allRisco();
						while($linha = mysqli_fetch_array($resultado)){
							if($dados[1] == $linha['id_risco']){
								echo "<option value=".$linha['id_risco']." required selected>". $linha['risco']." </option> ";

								echo 'select';
					}else{
						echo "<option value=".$linha['id_risco']." required>". $linha['risco']." </option> ";
					}
						}
					?>

				</select>
			<input type='hidden' name='tipo' value='<?php echo edita_cadastra($_GET['tipo']); ?>' />
			<input type='hidden' name='menu' value='cnae' />
			<input type='hidden' name='where' value='<?php echo @value_edita($_GET['tipo'], $dados[0]); ?>' />

			<p><button><?php echo edita_cadastra($_GET['tipo']); ?></button></p>
		</form>

		<p><a href="lista_cnae.php" style='text-decoration: none;'><i class='fa fa-chevron-left' style='color:black;'></i></a></p>