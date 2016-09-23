<?php
require_once 'bd.class.php';

class grupo_cipa extends bd{
	private $tabela = 'grupo_cipa';
	private $cipa;
	private $tipo;
	private $id_intervalo;
	private $quantidade;

	function __CONSTRUCT($host, $user, $pass, $db){
		bd::__CONSTRUCT($host, $user, $pass, $db);
	}
	function set_grupoCipa($cipa, $tipo, $id_intervalo, $quantidade){
		$this->cipa = $cipa;
		$this->descricao = "'".$descricao."'";
		$this->id_risco = $id_risco;
	}
	function insere_grupoCipa(){
		$dados = ['cipa' => $this->cipa, 'tipo' => $this->tipo, 'id_intervalo' => $this->id_intervalo,
			'quantidade' => $this->quantidade];
		$resultado = bd::insere($this->tabela, $dados);
		return $resultado;
	}
	function get_allgrupoCipa(){
		$resultado = bd::get_all($this->tabela);
		return $resultado;
	}
	/*
	function get_onegrupoCipa($id_risco){
		$dados = bd::get_all('risco', 'id_risco = '. $id_risco);
		return $dados;
	}
	*/
	function atualiza_grupoCipa($cipa, $tipo, $id_intervalo){
		$dados = ['cipa' => $this->cipa, 'tipo' => $this->tipo, 'id_intervalo' => $this->id_intervalo,
			'quantidade' => $this->quantidade];
		$where = ['grupo_cipa.cipa' => $cipa, 'grupo_cipa.tipo' => $tipo, 'grupo_cipa.id_intervalo' => $id_intervalo ];
		$resultado = bd::atualiza($this->tabela,$campos, $where);
		return $resultado;
	}
	function deleta_grupoCipa($cipa, $tipo, $id_intervalo){
		$dados = ['cipa' => $this->cipa, 'tipo' => $this->tipo, 'id_intervalo' => $this->id_intervalo,
			'quantidade' => $this->quantidade];
		$retorno = bd::deleta($this->tabela,$where);
		return $retorno;
	}

}
$grupo_cipa = new grupo_cipa($host, $user, $pass, $db);
	?>
