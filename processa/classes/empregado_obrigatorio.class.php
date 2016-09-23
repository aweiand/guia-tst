<?php
require_once 'bd.class.php';

class empregado_obrigatorio extends bd{
	private $tabela = 'empregado_obrigatorio';
	private $id_emp_obg;
	private $id_risco;
	private $id_intervalo;
	private $id_empregado;
	private $id_observacao;
	private $quantidade;

	function __CONSTRUCT($host, $user, $pass, $db){
		bd::__CONSTRUCT($host, $user, $pass, $db);
	}
	function set_empregadoObrigatorio($id_risco, $id_intervalo, $id_empregado, $id_observacao, $quantidade, $id_emp_obg = 'NUthis->LL' ){
		$this->id_risco = $id_risco;
		$this->id_intervalo =  $id_intervalo;
		$this->id_empregado =  $id_empregado;
		$this->id_observacao =  $id_observacao;
		$this->quantidade =  $quantidade;
	}
	function insere_empregadoObrigatorio(){
		$dados = ['id_risco' => $id_risco, 'intervalo' =>  $id_intervalo, 'empregado' =>  $id_empregado,
			'observacao' =>  $id_observacao, 'quantidade' =>  $quantidade];
		$resultado = bd::insere($this->tabela, $dados);
		return $resultado;
	}
	function get_allempregadoObrigatorio(){
		$consulta_sql = "SELECT eo.id_emp_obg,eo.quantidade,r.risco,i.minimo,i.maximo,ep.descricao,obs.observacao FROM empregado_obrigatorio eo
			INNER JOIN risco r ON (eo.id_risco=r.id_risco)
		    INNER JOIN intervalo i ON(eo.id_intervalo=i.id_intervalo)
		    INNER JOIN empregado ep ON (eo.id_empregado=ep.id_empregado)
		    LEFT OUTER JOIN observacao obs ON (eo.id_observacao=obs.id_observacao)";
		$resultado = bd::consulta_sql($consulta_sql);
		return $resultado;
	}
	function get_oneEmpregadoObrigatorio($id_risco, $id_intervalo){
		$consulta_sql = "SELECT eo.id_emp_obg,eo.quantidade,r.risco,i.minimo,i.maximo,ep.descricao,obs.observacao FROM empregado_obrigatorio eo
					INNER JOIN risco r ON (eo.id_risco=r.id_risco)
						INNER JOIN intervalo i ON(eo.id_intervalo=i.id_intervalo)
						INNER JOIN empregado ep ON (eo.id_empregado=ep.id_empregado)
						LEFT OUTER JOIN observacao obs ON (eo.id_observacao=obs.id_observacao)
						WHERE eo.id_risco = $id_risco AND eo.id_intervalo = $id_intervalo ORDER BY descricao";
		$resultado = bd::consulta_sql($consulta_sql);
		return $resultado;
	}


	function deleta_empregadoObrigatorio($id_emp_obg){
		$where = ['id_emp_obg' => $id_emp_obg];
		$retorno = bd::deleta($this->tabela,$where);
		return $retorno;
	}
	function atualiza_risco($id_emp_obg){
		$dados = ['id_risco' => $id_risco, 'intervalo' =>  $id_intervalo, 'empregado' =>  $id_empregado,
			'observacao' =>  $id_observacao, 'quantidade' =>  $quantidade];
		$where = ['id_emp_obg' => $id_emp_obg];
		$resultado = bd::atualiza($this->tabela,$campos, $where);
		return $resultado;
	}
}
$empregado_obrigatorio = new empregado_obrigatorio($host, $user, $pass, $db);
?>
