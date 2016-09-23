<?php
	require_once 'bd.class.php';

	class empregado extends bd{
		private $tabela = 'empregado';
		private $id_empregado = '';
		private $descricao;

		function __CONSTRUCT($host, $user, $pass, $db){
			bd::__CONSTRUCT($host, $user, $pass, $db);
		}

		function set_empregado($descricao ,$id_empregado = ''){
			$this->descricao = "'$descricao'";
			$this->id_empregado = $id_empregado;
		}

		function insere_empregado(){
			$dados = ['id_empregado' => $this->id_empregado, 'descricao' => $this->descricao];
			$retorno = bd::insere($this->tabela, $dados);
			var_dump($retorno);
		}

		function get_allEmpregado(){
			$resultado = bd::get_all($this->tabela);
			return $resultado;
		}
		function atualiza_empregado($id_empregado){
			$dados = ['descricao' => $this->descricao];
			$where = ['id_empregado' => $this->id_empregado];
			$retorno = 	bd::atualiza($this->tabela,$dados, $where);
			return $retorno;
		}

		function deleta_empregado($id_empregado){
			$where = ['id_empregado' => $id_empregado];
			$retorno = bd::deleta($this->tabela,$where);
			return $retorno;
		}
	}
$empregado = new empregado($host, $user, $pass, $db);
