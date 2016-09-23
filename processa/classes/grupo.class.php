<?php
require_once 'bd.class.php';
class grupo extends bd{
	private $tabela = 'grupo';
	private $cipa;
	private $descricao;

	function __CONSTRUCT($host, $user, $pass, $db){
		bd::__CONSTRUCT($host, $user, $pass, $db);
	}

	function set_grupo($cipa, $descricao){
		$this->cipa = "'$cipa'";
		$this->descricao = "'$descricao'";
	}

	function insere_grupo(){
		$dados = ['cipa' => $this->cipa, 'descricao' => $this->descricao];
		$resultado = bd::insere($this->tabela, $dados);
		return $resultado;
	}
	function getNumeroCnaeECipa(){
		bd::consulta_sql('SELECT cn.num_cnae, ci.cipa FROM grupo_cnae gc
			INNER JOIN grupo ci ON (gc.cipa=ci.cipa)
			INNER JOIN cnae cn ON (gc.num_cnae=cn.num_cnae)
');
	}
	function get_allGrupo(){
		$resultado = bd::get_all($this->tabela);
		return $resultado;
	}

	/*
	function get_oneRisco($id_risco){
		$dados = bd::get_all('risco', 'id_risco = '. $id_risco);
		return $dados;
	}
	*/

	function atualiza_grupo($cipa){
		$campos = ['cipa' => $this->cipa, 'descricao' => $this->descricao];
		$where = ['grupo.cipa' => $cipa];
		$resultado = bd::atualiza($this->tabela, $campos, $where);
		return $resultado;
	}

	function deleta_grupo($cipa){
		$where = ['cipa' => $cipa];
		$retorno = bd::deleta($this->tabela,$where);
		return $retorno;
	}
}
$grupo = new grupo($host, $user, $pass, $db);
?>
