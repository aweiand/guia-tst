
<?php
	// cadastra
// altera
// seleciona
	class bd{
	var $nome_bd ;
	var $usuario;
	var $senha ;
	var $endereco;
	var $conexao;
		function __CONSTRUCT(){
			$this->add_banco("root", "1234",'', "tst");
		}
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
				// echo $consulta;
				return $insere;
			}else{
				$consulta = "INSERT INTO ($campos) $tabela VALUES ($dados)";
				$insere = mysqli_query($this->conexao, $consulta);
			}
		}

		 function get_one($tabela, $id = NULL){
				 $resultado = $this->get_all($tabela, $id);
				 $linha = mysqli_fetch_array($resultado);
				//  var_dump($linha);
					return $linha;
		 }

		function get_all($tabela, $id = NULL){
			if(is_null($id)){
				// echo "teste<br>";
				// $bd = new bd;
				$consulta = "SELECT * FROM $tabela";
				// echo $consulta;
				// echo "<br>";
				$resultado = mysqli_query($this->conexao, $consulta);
				return $resultado;
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
				return $resultado;

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
			$consulta = "UPDATE $tabela SET $campos WHERE $where";
			// var_dump($consulta);
			$atualiza = mysqli_query($this->conexao, $consulta);
			return $atualiza;
		}

		function deleta($tabela, $id){
			$consulta = "DELETE FROM ". $tabela." WHERE ".$id;
			// echo $consulta;
			$deleta = mysqli_query($this->conexao, $consulta);
			// var_dump($deleta);
			return $deleta;
		}
		function aspas($dado){
			return "'".$dado."'";
		}

		function query_sql(){
		}



	}
