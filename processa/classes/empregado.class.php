<?php
	require_once 'bd.class.php';

	class empregado extends bd{
		private $tabela = 'empregado';
		private $id_empregado;
		private $descricao;

		function __CONSTRUCT(){
			bd::__CONSTRUCT();
		}

		function set_empregado($id_empregado, $id_empregado = "'"."'", $descricao){
			$this->descricao = "'".$descricao."'";
			$this->id_empregado = $id_empregado;
		}

		function grava_bd_empregado(){
			$retorno = bd::insere($this->tabela, $this->id_empregado.','.$this->descricao);
			var_dump($retorno);
		}

		function get_allCnae(){
			$dados = bd::get_all('empregado');
			return $dados;
		}

		function get_oneCnae($id_empregado){
			$dados = bd::get_all('empregado', 'id_empregado = '. $id_empregado);
			return $dados;
		}

		function atualiza_empregado($id_empregado){
			$retorno = 	bd::atualiza($this->tabela, ',  descricao = '.$this->descricao, 'id_empregado = '." '".$id_empregado."' ");
			return $retorno;
		}

		function deleta_empregado($id_empregado){
			$retorno = bd::deleta($this->tabela, 'id_empregado = '. $id_empregado);
			return $retorno;
		}

	}
