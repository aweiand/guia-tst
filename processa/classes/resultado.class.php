<?php

  require_once 'bd.class.php';

  //Essa classe é para tratar das consultas sql para mostrar o resultado
  class resultadoGuia extends bd{
    function __CONSTRUCT($host, $user, $pass, $db){
      bd::__CONSTRUCT($host, $user, $pass, $db);
    }
    function getResultadoTabelaNR4($numero_cnae, $numero_empregados){
      $consulta_sql = "SELECT c.num_cnae, c.descricao as cnae_descricao, i.minimo, i.maximo, e.descricao, eo.quantidade, r.risco FROM cnae c
      			INNER JOIN risco r ON (c.id_risco=r.id_risco)
      			INNER JOIN intervalo i ON ($numero_empregados>=i.minimo AND $numero_empregados<=i.maximo)
      			INNER JOIN empregado_obrigatorio eo ON(eo.id_risco=r.id_risco AND eo.id_intervalo=i.id_intervalo)
      			INNER JOIN empregado e ON (e.id_empregado=eo.id_empregado)
      			WHERE num_cnae = '$numero_cnae' ORDER BY e.descricao";
      $resultadoConsulta = bd::consulta_sql($consulta_sql);
      return $resultadoConsulta;
    }
    function getResultadoTabelaNR5($numero_cnae, $numero_empregados){
      $consulta_sql = "SELECT gcn.cipa, gci.quantidade, gci.tipo, g.descricao FROM grupo_cnae gcn
      INNER JOIN grupo g ON (gcn.cipa=g.cipa)
      INNER JOIN intervalo i ON ($numero_empregados>=i.minimo AND $numero_empregados<=i.maximo)
      INNER JOIN grupo_cipa gci ON (gcn.cipa=gci.cipa AND gci.id_intervalo=i.id_intervalo)
      WHERE gcn.num_cnae = '$numero_cnae'";
      $resultadoConsulta = bd::consulta_sql($consulta_sql);
      return $resultadoConsulta;
    }
  }

  $resultadoGuia = new resultadoGuia($host, $user, $pass, $db);
