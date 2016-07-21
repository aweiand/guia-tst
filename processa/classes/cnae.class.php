<?php
	require_once 'bd.class.php';

	class cnae extends risco{
		private $tabela = 'cnae';
		private $num_cnae;
		private $id_risco;
		private $descricao;

		function __CONSTRUCT(){
			bd::__CONSTRUCT();
		}

		function set_cnae($num_cnae, $id_risco, $descricao){
			$this->num_cnae = "'".$num_cnae."'";
			$this->descricao = "'".$descricao."'";
			$this->id_risco = $id_risco;
		}

		function grava_bd_cnae(){
			$retorno = bd::insere($this->tabela, $this->num_cnae.','.$this->id_risco.','.$this->descricao);
			var_dump($retorno);
		}

		function get_allCnae(){
			$dados = bd::get_all('cnae');
			return $dados;
		}

		function get_oneCnae($num_cnae){
			$dados = bd::get_all('cnae', 'num_cnae = '. $num_cnae);
			return $dados;
		}

		function atualiza_cnae($num_cnae){
			$retorno = 	bd::atualiza($this->tabela, 'num_cnae = ' . $this->num_cnae.', id_risco = '.$this->id_risco.', descricao = '.$this->descricao, 'num_cnae = '." '".$num_cnae."' ");
			return $retorno;
		}

		function deleta_cnae($num_cnae){
			$retorno = bd::deleta($this->tabela, 'num_cnae = '. $num_cnae);
			return $retorno;
		}

		function apresenta_cnae($cnae){
			$cnae = str_split($cnae);

			if(count($cnae) <= 4 ){
				$result = $cnae[0] . $cnae[1] . "." . $cnae[2];
			}elseif(count($cnae) <= 6){
				$result = $cnae[0] . $cnae[1] . "." . $cnae[2] . $cnae[3] . "-" . $cnae[4];
			}
			return $result;
		}
	}
