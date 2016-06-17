CREATE DATABASE tst DEFAULT CHARACTER set utf8;

USE tst;

CREATE TABLE risco(
	
	id_risco INT(4)NOT NULL AUTO_INCREMENT,
	risco INT(1)NOT NULL,
	descricao TEXT NOT NULL,
	
	CONSTRAINT PrKrisco PRIMARY KEY (id_risco)
);

CREATE TABLE intervalo(
	
	id_intervalo INT(4)NOT NULL AUTO_INCREMENT,
	minimo INT(5)NOT NULL,
	maximo INT(5)NOT NULL,
	
	CONSTRAINT PrKintervalo PRIMARY KEY (id_intervalo)
);

CREATE TABLE observacao(
	
	id_observacao INT(4)NOT NULL AUTO_INCREMENT,
	observacao TEXT NOT NULL,
	
	CONSTRAINT PrKobservacao PRIMARY KEY (id_observacao)
);

CREATE TABLE empregado(
	
	id_empregado INT(2)NOT NULL  AUTO_INCREMENT,
	descricao TEXT NOT NULL,
	
	CONSTRAINT PrKempregado PRIMARY KEY (id_empregado)
);

CREATE TABLE grupo(
	
	cipa CHAR(4)NOT NULL,
	descricao TEXT NOT NULL,
	
	CONSTRAINT PrKgrupo PRIMARY KEY (cipa)
);

CREATE TABLE cnae(
	
	cnae INT(5)NOT NULL,
	id_risco INT(1)NOT NULL,
	descricao TEXT NOT NULL,
	
	CONSTRAINT PrKcnae PRIMARY KEY (cnae),
	CONSTRAINT FrKrisco_cnae FOREIGN KEY (id_risco) REFERENCES risco (id_risco)
);

CREATE TABLE grupo_cipa(
	
	cipa CHAR(4)NOT NULL,
	tipo BOOLEAN NOT NULL,
	id_intervalo INT(4)NOT NULL,
	quantidade INT(2)NOT NULL,
	
	CONSTRAINT PrKgrupo_cipa PRIMARY KEY (cipa,tipo),
	CONSTRAINT FrKgrupo_cipa_grupo FOREIGN KEY (cipa) REFERENCES grupo (cipa),
	CONSTRAINT FrKgrupo_cipa_intervalo FOREIGN KEY (id_intervalo) REFERENCES intervalo (id_intervalo)
);

CREATE TABLE empregado_obrigatorio(
	
	id_emp_obg INT(4)NOT NULL AUTO_INCREMENT,
	id_risco INT(4)NOT NULL,
	id_intervalo INT(4)NOT NULL,
	id_empregado INT(2)NOT NULL,
	id_observacao INT(4)NOT NULL,
	quantidade INT(2)NOT NULL,
	
	CONSTRAINT PrKempregado_obrigatorio PRIMARY KEY (id_emp_obg),
	CONSTRAINT FrKempregado_obrigatorio_risco FOREIGN KEY (id_risco) REFERENCES risco (id_risco),
	CONSTRAINT FrKempregado_obrigatorio_intervalo FOREIGN KEY (id_intervalo) REFERENCES intervalo (id_intervalo),
	CONSTRAINT FrKempregado_obrigatorio_empregado FOREIGN KEY (id_empregado) REFERENCES empregado (id_empregado),
	CONSTRAINT FrKempregado_obrigatorio_observacao FOREIGN KEY (id_observacao) REFERENCES observacao (id_observacao)
);