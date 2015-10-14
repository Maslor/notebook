/* Entidades */

create table Log_Registo
	(
	data_registo datetime not null unique,
	pergunta1 varchar(255),
	pergunta2 varchar(255),
	primary key (data_registo)
	);

create table Login
	(
	data_login timestamp not null unique,
	sucesso varchar(10),
	primary key (data_login)
	);

create table Pessoas
	(
	mail varchar(100) not null unique,
	nome varchar(255),
	password varchar(255),
	data_nasc date,
	resposta1 varchar(255),
	resposta2 varchar(255),
	primary key (mail)
	);

create table Registos
	(
	nome_registo varchar(50) not null unique,
	nome_tipo varchar(50) not null,
	primary key (nome_registo, nome_tipo),
	foreign key(nome_tipo) references Tipos_Registo (nome_tipo)
	);

create table Paginas
	(
	nome_pagina varchar(100) not null,
	primary key (nome_pagina)
	);

create table Tipos_Registo
	(
	nome_tipo varchar(100) not null,
	primary key (nome_tipo)
	);

create table Logs
	(
	l_date timestamp not null,
	primary key (l_date)
	);

create table Campos
	(
	nome_campo varchar(100) not null,
	nome_tipo varchar(100) not null,
	primary key (nome_campo, nome_tipo),
	foreign key (nome_tipo) references Tipos_Registo (nome_tipo)
	);


/* Associacoes */

