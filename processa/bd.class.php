
<?php
	// cadastra 
// altera
// seleciona
	class bd{
	var $nome_bd;
	var $usuario;
	var $senha;
	var $endereco;
	var $conexao;
		function add_banco($usuario, $senha, $endereco = "localhost", $nome_bd){
			$this->usuario = "$usuario";	
			// var_dump($this->usuario);
			$this->senha = "$senha";
			$this->endereco = "$endereco";	
			$this->nome_bd = "$nome_bd";		
			$this->conexao = mysqli_connect($this->endereco, $this->usuario, $this->senha, $this->nome_bd) or die ("Erro ao conectar");
			}
		function insere($tabela, $dados, $campos = NULL){
			if(is_null($campos)){
				$consulta = "INSERT INTO $tabela VALUES($dados)";
				$insere = mysqli_query($this->conexao, $consulta);
			}else{
				$consulta = "INSERT INTO ($campos) $tabela VALUES ($dados)";
				$insere = mysqli_query($this->conexao, $consulta);
			}
		}
		/* function get_one(){
		*
		 }*/
		function get_all($tabela, $id = NULL){
			if(is_null($id)){
				// echo "teste<br>";
				$bd = new bd;
				$consulta = "SELECT * FROM $tabela";
				// echo $consulta;
				// echo "<br>";
				$resultado = mysqli_query($this->conexao, $consulta);
			}else{
				// echo "teste id";
				$bd = new bd;
				$consulta = "SELECT * FROM $tabela WHERE $id";
				// echo $consulta;
				// echo $this->conexao;
				$resultado = mysqli_query($this->conexao, $consulta);
			}
			return $resultado;
		}
		function get_all_array($tabela, $id = NULL){
			if(is_null($id)){
				// echo "teste<br>";
				$bd = new bd;
				$consulta = "SELECT * FROM $tabela";
				// echo $consulta;
				// echo "<br>";
				$resultado = mysqli_query($this->conexao, $consulta);
				$resultado = mysqli_fetch_array($resultado);

			}else{
				// echo "teste id";
				$bd = new bd;
				$consulta = "SELECT * FROM $tabela WHERE $id";
				// echo $consulta;
				// echo $this->conexao;
				$resultado = mysqli_fetch_array($resultado);
			}
			return $resultado;
		}


		function atualiza($tabela, $campos, $where){
			$consulta = "UPDATE carro SET $campos WHERE $where";
			$atualiza = mysqli_query($this->conexao, $consulta);
			return $atualiza;
		}
		function deleta(){

		}
		function query_sql(){

		}
	}
	//Adicione os dados nessas variaveis para fazer a conexão no banco de dados
	$usuario = "root";
	$senha = "1234";
	$endereco = "localhost";
	$nome_bd = "tst";

	$bd = new bd();
	$bd->add_banco($usuario, $senha, $endereco, $nome_bd);
	// $a = $bd->get_all("carro");
	// var_dump($a);

	// $resultado = $bd->get_all("carro", "placa = '123-1re'");
	// var_dump($resultado);
	// var_dump($bd->atualiza("carro", "modelo='unsso', placa='esddsee',cor='zs',	tamanho=5, marca='x'", "placa = 'csasdasd'"));
	// while($linha = mysqli_fetch_assoc($resultado)){
	// var_dump($linha["modelo"]);
	// }
	//::::::::::::::::::::::::::::::::::::Testes::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;


