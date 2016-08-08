<?php
	require_once 'bd.class.php';
	class risco extends bd{
		private $tabela = 'risco';
		private $id_risco;
		private $risco;
		private $descricao;

		function __CONSTRUCT($host, $user, $pass, $db){
			bd::__CONSTRUCT($host, $user, $pass, $db);
		}
		function set_risco($risco, $descricao, $id_risco = 'NULL' ){
			$this->risco = $risco;
			$this->descricao = "'".$descricao."'";
			$this->id_risco = $id_risco;
		}
		function insere_risco(){
			$dados = ['id_risco' => $this->id_risco, 'risco' => $this->risco, 'descricao' => $this->descricao];
			$resultado = bd::insere($this->tabela, $dados);
			return $resultado;
		}
		function get_allRisco(){
			$dados = bd::get_all('risco');
			return $dados;
		}
		function get_oneRisco($id_risco){
			$dados = bd::get_all('risco', 'id_risco = '. $id_risco);
			return $dados;
		}
		function atualiza_risco($id_risco){
			$campos = ['risco' => $this->risco, 'descricao' => $this->descricao];
			$where = ['risco.id_risco' => $id_risco];
			$resultado = bd::atualiza('risco',$campos, $where);
			return $resultado;
		}
		function deleta_risco($id_risco){
			$where = ['id_risco' => $id_risco];
			$retorno = bd::deleta($this->tabela,$where);
			return $retorno;
		}
	}
	$risco = new risco($host, $user, $pass, $db);
	?>
