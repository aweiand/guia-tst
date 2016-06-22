<?php
class risco{
	private $risco;
	
	function setrisco($r){
		$this->risco = $r;
	}
	function getrisco(){
		return $this->risco;
	}
}
//------------------------------------------------------
class cnae extends risco{
	private $codigo;
	private $descricao;
	
	function cria_cnae ($cod, $desc){
		$this->codigo = cod;
		$this->descricao = desc;
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
class empregado_obs extends obs{
	private $quantidade;
	
	function setquantidade ($qtd){
		$this->quantidade=$qtd;
	}
	function getquantidade (){
		return $this->quantidade;
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