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

SELECT cn.num_cnae, ci.cipa FROM grupo_cnae gc
	INNER JOIN grupo ci ON (gc.cipa=ci.cipa)
	INNER JOIN cnae cn ON (gc.num_cnae=cn.num_cnae)

SELECT * FROM cnae WHERE num_cnae = ''

SELECT * FROM intervalo

SELECT eo.id_emp_obg,eo.quantidade,r.risco,i.minimo,i.maximo,ep.descricao,obs.observacao FROM empregado_obrigatorio eo
			INNER JOIN risco r ON (eo.id_risco=r.id_risco)
				INNER JOIN intervalo i ON(eo.id_intervalo=i.id_intervalo)
				INNER JOIN empregado ep ON (eo.id_empregado=ep.id_empregado)
				LEFT OUTER JOIN observacao obs ON (eo.id_observacao=obs.id_observacao)
				WHERE eo.id_risco = 1 AND eo.id_intervalo = 1
-- consulta para pegar dados da nr5
SELECT gcn.num_cnae, gcn.cipa, g.descricao, gci.quantidade, gci.tipo FROM grupo_cnae gcn
	INNER JOIN grupo g ON (gcn.cipa=g.cipa)
	INNER JOIN grupo_cipa gci ON (gcn.cipa=gci.cipa)
		INNER JOIN intervalo i ON (gci.id_intervalo=i.id_intervalo)
					WHERE gcn.num_cnae = 41107 AND i.minimo<=100 AND i.maximo>=100
-- consulta para pegar dados para a consulta da nr4
SELECT c.num_cnae, c.descricao, i.minimo, i.maximo, e.descricao, eo.quantidade, r.risco  FROM cnae c
			INNER JOIN risco r ON (c.id_risco=r.id_risco)
			INNER JOIN intervalo i ON (115>=i.minimo AND 115<=i.maximo)
			INNER JOIN empregado_obrigatorio eo ON(eo.id_risco=r.id_risco AND eo.id_intervalo=i.id_intervalo)
			INNER JOIN empregado e ON (e.id_empregado=eo.id_empregado)
			WHERE num_cnae = '41107'


			SELECT gcn.cipa, gci.quantidade, gci.tipo, g.descricao FROM grupo_cnae gcn
			INNER JOIN grupo g ON (gcn.cipa=g.cipa)
			INNER JOIN intervalo i ON (999>=i.minimo AND 999<=i.maximo)
			INNER JOIN grupo_cipa gci ON (gcn.cipa=gci.cipa AND gci.id_intervalo=i.id_intervalo)

			WHERE gcn.num_cnae = '05003'
