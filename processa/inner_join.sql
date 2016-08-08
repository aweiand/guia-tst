-- o eo é um alias, para nao ser necessario digitar todo nome da tabela
SELECT eo.id_emp_obg,eo.quantidade,r.risco,i.minimo,i.maximo,ep.descricao,obs.observacao FROM empregado_obrigatorio eo
	INNER JOIN risco r ON (eo.id_risco=r.id_risco)
    INNER JOIN intervalo i ON(eo.id_intervalo=i.id_intervalo)
    INNER JOIN empregado ep ON (eo.id_empregado=ep.id_empregado)
    -- o left outer nao da erro se o campo for NOT NULL e estiver vazio
    LEFT OUTER JOIN observacao obs ON (eo.id_observacao=obs.id_observacao)
	WHERE id_emp_obg = 2

SELECT c.num_cnae, c.descricao, r.risco FROM cnae c
	INNER JOIN risco r ON (c.id_risco=r.id_risco)


