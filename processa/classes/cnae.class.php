<?php
    require_once 'bd.class.php';

    class cnae extends bd
    {
        private $tabela = 'cnae';
        private $num_cnae;
        private $id_risco;
        private $descricao;

        public function __CONSTRUCT($host, $user, $pass, $db)
        {
            bd::__CONSTRUCT($host, $user, $pass, $db);
        }

        public function set_cnae($num_cnae, $id_risco, $descricao)
        {
            $this->num_cnae = "'$num_cnae'";
            $this->descricao = "'$descricao'";
            $this->id_risco = $id_risco;
        }

        public function insere_cnae()
        {
            $dados = ['num_cnae' => $this->num_cnae, 'id_risco' => $this->id_risco, 'descricao' => $this->descricao];
            $resultado = bd::insere($this->tabela, $dados, true);
        }

        public function get_allCnae()
        {
            $consulta = 'SELECT c.num_cnae, c.descricao, r.risco FROM cnae c
				INNER JOIN risco r ON (c.id_risco=r.id_risco)';
            $resultado = bd::consulta_sql($consulta);

            return $resultado;
        }
        public function get_oneCnae($numero_cnae)
        {
          $consulta = "SELECT c.num_cnae, c.descricao, r.risco, c.id_risco   FROM cnae c
            INNER JOIN risco r ON (c.id_risco=r.id_risco) WHERE num_cnae = '$numero_cnae' ";
          $resultado = bd::consulta_sql($consulta);
            return $resultado;
        }

        public function atualiza_cnae($num_cnae)
        {
            $dados = ['num_cnae' => $this->num_cnae, 'id_risco' => $this->id_risco, 'descricao' => $this->descricao];
            $where = ['num_cnae' => $num_cnae];
            $resultado = bd::atualiza($this->tabela, $dados, $where);

            return $resultado;
        }

        public function deleta_cnae($num_cnae)
        {
            $where = ['num_cnae' => $num_cnae];
            $resultado = bd::deleta($this->tabela, $where);

            return $resultado;
        }

        public function apresenta_cnae($cnae)
        {
            $cnae = str_split($cnae);

            if (count($cnae) <= 4) {
                $result = $cnae[0].$cnae[1].'.'.$cnae[2];
            } elseif (count($cnae) <= 6) {
                $result = $cnae[0].$cnae[1].'.'.$cnae[2].$cnae[3].'-'.$cnae[4];
            }

            return $result;
        }
    }
$cnae = new cnae($host, $user, $pass, $db);
