<?php
require_once 'bd.class.php';
//---------------------------------------------------------
class observacao extends bd{
	private $tabala = 'observacao';
	private $observacao;
	private $id_observacao = '';

	function __CONSTRUCT($host, $user, $pass, $db){
		bd::__CONSTRUCT($host, $user, $pass, $db);
	}
	function set_observacao($observacao){
		$this->observacao = "'$observacao'";
	}
	function insere_observacao(){
		$dados = ['id_observacao' => $this->observacao, 'observacao' => $this->observacao];
		$resultado = bd::insere($this->tabela, $dados);
		return $resultado;
	}
	function get_allObservacao(){
		$resultado = bd::get_all($this->tabela);
		return $resultado;
	}
	function deleta_risco($id_observacao){
		$where = ['id_observacao' => $id_observacao];
		$resultado = bd::deleta($this->tabela,$where);
		return $resultado;
	}
	function atualiza_risco($id_risco){
		$campos = ['observacao' => $this->observacao];
		$where = ['observacao.id_observacao' => $id_observacao];
		$resultado = bd::atualiza($this->tabela, $campos, $where);
		return $resultado;
	}
}
$observacao = new observacao($host, $user, $pass, $db);
?>
