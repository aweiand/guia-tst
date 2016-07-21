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
		function atualiza_risco(){

		}
		function deleta_risco($id_risco){
			$retorno = bd::deleta($this->tabela,'id_risco = '. $id_risco);
			return $retorno;
		}
	}
	//
	//---------------------------------------------------cnae-------------------------------------------
	//
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
	}


	//--------------------------------------------------------------------
	class empregado extends risco{
		private $descricao_empregado;

		function setdescricao_empregado($d){
			$this->descricao=$d;
		}
		function getdescricao(){
			return $this->descricao;
		}
	}
	//--------------------------------------------------------
	class intervalo_func extends empregado{
		private $maximo;
		private $minimo;

		function setmaximo($max){
			$this->maximo=$max;
		}
		function getmaximo(){
			return $this->maximo;
		}
		function setminimo($min){
			$this->minimo=$min;
		}
		function getminimo(){
			return $this->minimo;
		}
	}
	//---------------------------------------------------------
	class obs extends intervalo_func{
		private $obs;

		function setobs($o){
			$this->obs=$o;
		}
		function getobs(){
			return $this->obs;
		}
	}
	//-----------------------------------------------------------
	class empregado_obrigatorio extends obs{
		private $quantidade;

		function setquantidade ($qtd){
			$this->quantidade=$qtd;
		}
		function getquantidade (){
			return $this->quantidade;
		}
		function get_empregadoObrig($where){
			$consulta = "
				SELECT eo.id_emp_obg,eo.quantidade,r.risco,i.minimo,i.maximo,ep.descricao,obs.observacao FROM empregado_obrigatorio eo
					INNER JOIN risco r ON (eo.id_risco=r.id_risco)
						INNER JOIN intervalo i ON(eo.id_intervalo=i.id_intervalo)
						INNER JOIN empregado ep ON (eo.id_empregado=ep.id_empregado)
						LEFT OUTER JOIN observacao obs ON (eo.id_observacao=obs.id_observacao)".
						$where;
			$consulta_completa = mysqli_query($this->conexao, $consulta);
			$consulta_completa = mysqli_fetch_array($consulta_completa);
			return $consulta_completa;
		}
	}
	//----------------------------------------------------------------
	class grupo extends intervalo_func{
		private $descricao;

		function setdesc ($desc){
			$this->descricao=$desc;
		}
		function getdesc(){
			return $this->descricao;
		}
	}
	//---------------------------------------------------------------------
	class dimen_cipa extends grupo{
		private $tipo_sup;
		private $tipo_efe;
		private $qtd;

		function settipo_sup($sup){
			$this->tipo_sup=$sup;
		}
		function settipo_efe($efe){
			$this->tipo_efe=$efe;
		}
		function gettipo_sup(){
			return $this->tipo_sup;
		}
		function gettipo_efe(){
			return $this->tipo_efe;
		}
	}
	//------------------------------------------------------------------


	function edita_cadastra($menu){
		if($menu == 'cadastrar'){
			return 'Cadastrar';
		}elseif($menu == 'editar'){
			return 'Editar';
		}
	}


	function value_edita($tipo, $value){
		if($tipo == 'editar'){
			return $value;
		}
	}
	?>
