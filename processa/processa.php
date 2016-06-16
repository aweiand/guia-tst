

<?php
	// cadastra 
// altera
// seleciona
	class bd{
	var $nome_bd;
	var $usuario;
	var $senha;
	var $endereco;
		function conecta($usuario, $senha, $endereco = "'localhost'"){
			$this->usuario = $usuario;
			$this->senha = $senha;
			$this->nome_bd = $nome_bd;
			$conexao = mysql_connect($endereco) OR DIE ("Erro ao conectar!");
		}
		function salva_bd(){

		}
		function consulta_bd(){

		}
	}