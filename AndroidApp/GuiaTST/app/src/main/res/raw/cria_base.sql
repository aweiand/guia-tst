CREATE TABLE cnae (  num_cnae char(5) NOT NULL PRIMARY KEY,  id_risco int(1) NOT NULL,  descricao text NOT NULL);
CREATE TABLE empregado (  id_empregado int(2) NOT NULL PRIMARY KEY,  descricao text NOT NULL);
CREATE TABLE empregado_obrigatorio (  id_emp_obg int(4) NOT NULL PRIMARY KEY,  id_risco int(4) NOT NULL,  id_intervalo int(4) NOT NULL,  id_empregado int(2) NOT NULL,  id_observacao int(4),  quantidade int(2) NOT NULL);
CREATE TABLE grupo (  cipa char(4) NOT NULL PRIMARY KEY,  descricao text NOT NULL);
CREATE TABLE grupo_cipa (  cipa char(4) NOT NULL,  tipo tinyint(1) NOT NULL,  id_intervalo int(4) NOT NULL,  quantidade int(2) NOT NULL);
CREATE TABLE grupo_cnae (  cipa char(4) NOT NULL,  num_cnae char(5) NOT NULL);
CREATE TABLE intervalo (  id_intervalo int(4) NOT NULL PRIMARY KEY,  minimo int(5) NOT NULL,  maximo int(5) NOT NULL);
CREATE TABLE observacao (  id_observacao int(4) NOT NULL PRIMARY KEY,  observacao text NOT NULL);
CREATE TABLE risco (  id_risco int(4) NOT NULL PRIMARY KEY,  risco int(1) NOT NULL,  descricao text NOT NULL);