<?php
require_once 'bd.class.php';
class intervalo extends bd{
	private $tabela = 'intervalo';
	private $id_intervalo = '';
	private $maximo;
	private $minimo;

	function __CONSTRUCT($host, $user, $pass, $db){
		bd::__CONSTRUCT($host, $user, $pass, $db);
	}

	function set_intervalo($maximo, $minimo, $id_intervalo = 'NULL' ){
		$this->minimo = $minimo;
		$this->maximo = $maximo;
		$this->id_intervalo = $id_intervalo;
	}
	function insere_intervalo(){
		$dados = ['id_intervalo' => $this->id_intervalo, 'maximo' => $this->maximo, 'minimo' => $this->minimo];
		$resultado = bd::insere($this->tabela, $dados, TRUE);
		return $resultado;
	}
	function get_allintervalo(){
		$dados = bd::get_all('intervalo');
		return $dados;
	}
	function atualiza_intervalo($id_intervalo){
		$campos = ['maximo' => $this->maximo, 'minimo' => $this->minimo];
		$where = ['intervalo.id_intervalo' => $id_intervalo];
		$resultado = bd::atualiza($this->tabela,$campos, $where);
		return $resultado;
	}
	function deleta_intervalo($id_intervalo){
		$where = ['id_intervalo' => $id_intervalo];
		$retorno = bd::deleta($this->tabela,$where);
		return $retorno;
	}

}
$intervalo = new intervalo($host, $user, $pass, $db);
?>