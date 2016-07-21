<?php
	require_once 'bd.class.php';

	/*
	* ------------------------------------------------risco----------------------------------------
	*/
	class risco extends bd{
		private $tabela = 'risco';
		private $id_risco;
		private $risco;
		private $descricao;

		function __CONSTRUCT(){
			bd::__CONSTRUCT();
		}
		function set_risco($risco, $descricao, $id_risco = 'NULL' ){
			$this->risco = $risco;
			$this->descricao = "'".$descricao."'";
			$this->id_risco = $id_risco;
		}
		function grava_bd_risco(){
			bd::insere($this->tabela, $this->id_risco.','.$this->risco.','.$this->descricao);
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
			bd::atualiza('risco','risco = '.$this->risco.', descricao = '.$this->descricao ,'risco.id_risco = '. $id_risco);
		}
		function deleta_risco($id_risco){
			$retorno = bd::deleta($this->tabela,'id_risco = '. $id_risco);
			return $retorno;
		}
	}
	?>
