SELECT eo.quantidade, r.risco, i.minimo, i.maximo, e.descricao ,o.observacao
 FROM empregado_obrigatorio eo
     INNER JOIN cnae c ON (eo.id_risco = c.id_risco)
     INNER JOIN risco r ON (c.id_risco = r.id_risco)
     INNER JOIN intervalo i ON (eo.id_intervalo = i.id_intervalo)
     INNER JOIN empregado e ON (eo.id_empregado = e.id_empregado)
     LEFT OUTER JOIN observacao o ON (eo.id_observacao = o.id_observacao)
 WHERE c.num_cnae = 46141 AND
    (i.minimo = 50 AND i.maximo = 100)