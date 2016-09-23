<?php
require_once '../classes/resultado.class.php';

/* require_once '../classes/intervalo.class.php';
require_once '../classes/cnae.class.php';
require_once '../classes/empregado_obrigatorio.class.php';

/* pegar a cipa com o cnae no grupo_cnae
* pegar a descrição em grupo
*pegar restantes dados em grupo cipa
*/
/*
$resultado_consulta_intervalo = $intervalo->get_allintervalo_nr4();
while ($dados_tabela_intervalo = mysqli_fetch_array($resultado_consulta_intervalo)):
  if($numero_empregados>$dados_tabela_intervalo['minimo'] & $numero_empregados<$dados_tabela_intervalo['maximo']):
    $id_intervalo = $dados_tabela_intervalo['id_intervalo'];
  endif;
endwhile;

$resultado_consulta_cnae = mysqli_fetch_array($cnae->get_oneCnae($num_cnae));
$id_risco = $resultado_consulta_cnae['id_risco'];
 echo $id_risco;

$id_risco = 1;
$id_intervalo = 1;

$resultado_consulta_empregadoObrigatorio = $empregado_obrigatorio->get_oneEmpregadoObrigatorio($id_risco, $id_intervalo);
while ($dados_tabela_EmpregadoObrigatorio = mysqli_fetch_array($resultado_consulta_empregadoObrigatorio)):
  echo '</br>'.$dados_tabela_EmpregadoObrigatorio['descricao'];


endwhile; */
$numero_empregados = 80;
$numero_cnae = '01113';
$resultado_consulta_nr4 = $resultadoGuia->getResultadoTabelaNR4($numero_cnae, $numero_empregados);
//var_dump($dados_consulta_nr4);
while ($dados_consulta_nr4 = mysqli_fetch_array($resultado_consulta_nr4)):
  echo '</br>'.$dados_consulta_nr4[1];


endwhile;
$resultado_consulta_nr5 = $resultadoGuia->getResultadoTabelaNR5($numero_cnae, $numero_empregados);

 ?>


 <!-- <tr>
   <td colspan="2">Técnico em Segurança do Trabalho</td>
   <td>4</td>
 </tr>

 <tr>
   <td colspan="2">Engenheiro Seg. Trabalho</td>
   <td>1</td>
 </tr>

 <tr>
   <td colspan="2">Aux. Enfermagem Trabalho</td>
   <td>0</td>
 </tr>

 <tr>
   <td colspan="2">Enfermeiro do Trabalho</td>
   <td>0</td>
 </tr>

 <tr>
   <td colspan="2">Médico do Trabalho</td>
   <td>0</td>
 </tr>
-->
