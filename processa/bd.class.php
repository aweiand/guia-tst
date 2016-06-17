

<?php
	// cadastra 
// altera
// seleciona
	class bd{
	var $nome_bd;
	var $usuario;
	var $senha;
	var $endereco;
		function add_user($usuario, $senha, $endereco = "localhost"){
			$this->usuario = "'$usuario'";
			$this->senha = "'$senha'";
			$this->endereco = "'$endereco'";		
			}
		function conecta_bd($nome_bd){
			$this->nome_bd = $nome_bd;
			$conecta = mysqli_connect($this->endereco, $this->usuario, $this->senha, $this->nome_bd);
			// var_dump($this->usuario);
			// var_dump($this->senha);
			// var_dump($this->endereco);
			
		}
		function salva_bd(){

		}
		function consulta_bd(){

		}
	}