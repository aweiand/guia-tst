
<?php
/*
*Classe para auxiliar a utilizar banco de dados.
*Criado com mysqli usando estilo orientado a objetos.
*Insere = ok
*Deleta = ok
*Atualiza = ok
*consulta =
*/

    class bd extends mysqli
    {
        private $nome_bd;
        private $usuario;
        private $senha;
        private $endereco;
        private $conexao;

        public function __CONSTRUCT($host, $user, $pass, $db)
        {
            parent::__CONSTRUCT($host, $user, $pass, $db);
            //Verifica se a conexão funcionou
            if (mysqli_connect_error()) {
                die('Erro de conexão ('.mysqli_connect_errno().')'.mysqli_connect_error());
            }
        }
        //faz uma consulta sql ao banco personalizada. É preciso digitar todo a consulta.
        public function consulta_sql($sql)
        {
              // echo $sql.'</br>';
            $resultado = parent::query($sql);
            if ($resultado == false) {
                $resultado = 'Erro ao processar';
                echo $resultado;
            }
            return $resultado;
        }

        //Função para inserir dados ao banco de dados. o atributo dados deve ser passado como array. Ex: $dados ["campo" => "dados", "nome" => 'Tiago'].
        //O atributo $campo serve para indicar se haverá campos, para tal indique como TRUE para adicionado dessa forma;
        public function insere($tabela, $dados, $campos = false)
        {
            foreach ($dados as $campo => $dado) {
                $campos_bd[] = $campo;
                $dados_bd[] = $dado;
            }
            $campos_bd = '( '.implode(', ', $campos_bd).' )';
            $dados_bd = '( '.implode(', ', $dados_bd).' )';
            if ($campos === false) {
                $consulta = "INSERT INTO $tabela VALUES $dados_bd";
            } else {
                $consulta = "INSERT INTO $tabela $campos_bd  VALUES $dados_bd";
            }
            $resultado = $this->consulta_sql($consulta);

            return $resultado;
        }
        public function atualiza($tabela, $campos, $where)
        {
            foreach ($campos  as $campo => $dado) {
                $dados[] = $campo.' = '.$dado;
            }
            foreach ($where as  $id => $id2) {
                $where2[] = $id.' = '.$id2;
            }
            $dados = implode(', ', $dados);
            $where2 = implode(' ', $where2);
            $consulta = "UPDATE $tabela SET $dados WHERE $where2";
            $resultado = $this->consulta_sql($consulta);

            return $resultado;
        }
        //Função para deletar, passar o nome da tabela e a identificação
        public function deleta($tabela, $where)
        {
            foreach ($where  as $campo => $dado) {
                $where2[] = $campo.' = '.$dado;
            }
            $where2 = implode(' ', $where2);
            $consulta = "DELETE FROM $tabela WHERE $where2";
            // echo $consulta;
            $resultado = $this->consulta_sql($consulta);

            return $resultado;
        }

        public function get_one($tabela, $id = null)
        {
            $resultado = $this->get_all($tabela, $id);
            $linha = mysqli_fetch_array($resultado);
                //  var_dump($linha);
                    return $linha;
        }

        public function get_all($tabela, $id = null)
        {
            if (is_null($id)) {
                $consulta = "SELECT * FROM $tabela";
            } else {
                foreach ($id  as $campo => $dado) {
                    $where[] = $campo.' = '.$dado;
                    $where = implode(' ', $where);
                }
                $consulta = "SELECT * FROM $tabela WHERE $where";
            }
            $resultado = $this->consulta_sql($consulta);

            return $resultado;
        }

        public function get_all_array($tabela, $id = null)
        {
            if (is_null($id)) {
                // echo "teste<br>";
                $bd = new self();
                $consulta = "SELECT * FROM $tabela";
                // echo $consulta;
                // echo "<br>";
                $resultado = mysqli_query($this->conexao, $consulta);
                $resultado = mysqli_fetch_array($resultado);

                return $resultado;
            } else {
                // echo "teste id";
                $bd = new self();
                $consulta = "SELECT * FROM $tabela WHERE $id";
                // echo $consulta;
                // echo $this->conexao;
                $resultado = mysqli_fetch_array($resultado);
            }

            return $resultado;
        }

        //Adiciona aspas ao dado enviado.
        public function aspas($dado)
        {
            return "'".$dado."'";
        }
    }

//Adicione aqui as configurações para o banco de dados
//local do servidor
$host = 'localhost';
//usuario
$user = 'root';
//senha
$pass = '';
//nome do banco de dados

//Nome do banco de dados
$db = 'tst';
$bd = new bd($host, $user, $pass, $db);
