
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

		 function get_one($tabela, $id = NULL){
				 $resultado = $this->get_all($tabela, $id);
				 $linha = mysqli_fetch_array($resultado);
				//  var_dump($linha);
					return $linha;
		 }

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

		function deleta($tabela, $where){
			$consulta = "DELETE FROM ". $tabela." WHERE ".$where;
			// echo $consulta;
			$deleta = mysqli_query($this->conexao, $consulta);
			return $deleta;
		}

		function query_sql(){
		}

		function value_edita($tipo, $value){
			if($tipo == 'editar'){
				echo $value;
			}
		}

		function get_empregadoObrig($where){
			$consulta = "
				SELECT eo.id_emp_obg,eo.quantidade,r.risco,i.minimo,i.maximo,ep.descricao,obs.observacao FROM empregado_obrigatorio eo
					INNER JOIN risco r ON (eo.id_risco=r.id_risco)
						INNER JOIN intervalo i ON(eo.id_intervalo=i.id_intervalo)
						INNER JOIN empregado ep ON (eo.id_empregado=ep.id_empregado)
						LEFT OUTER JOIN observacao obs ON (eo.id_observacao=obs.id_observacao)".
						$where;
			$consulta_completa = mysqli_query($this->conexao, $consulta);
			$consulta_completa = mysqli_fetch_array($consulta_completa);
			return $consulta_completa;
		}

	}

	//Adicione os dados nessas variaveis para fazer a conexão no banco de dados
	$usuario = "root";
	$senha = "1234";
	$endereco = "localhost";
	$nome_bd = "tst";

	//Conecta ao banco
	$bd = new bd();
	$bd->add_banco($usuario, $senha, $endereco, $nome_bd);
