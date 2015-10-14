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

create table Regista
	(
	mail varchar(100) not null,
	data_registo datetime not null,
	primary key (mail, data_registo),
	foreign key (data_registo) references Log_Registo (data_registo)	
	);

create table Loga
	(
	data_login timestamp not null,
	mail varchar(100) not null,
	primary key (data_login, mail),
	foreign key (data_login) references Login(data_login),
	foreign key (mail) references Pessoas (mail)
	);

create table Editam
	(
	nome_pagina varchar(50) not null;
	mail varchar(100) not null,
	primary key (nome_pagina, mail),
	foreign key nome_pagina references Paginas (nome_pagina),
	foreign key mail references Pessoas (mail)
	);

create table Contem_Registos
	(
	nome_pagina varchar(50) not null,
	nome_registo varchar(50) not null,
	nome_tipo varchar(50) not null,
	primary key (nome_pagina, nome_registo, nome_tipo),
	foreign key nome_tipo references Tipos_Registo (nome_tipo),
	foreign key nome_pagina references Paginas (nome_pagina),
	foreign key (nome_registo, nome_tipo) references Registos(nome_registo, nome_tipo)
	);

create table Pertence_Tipo
	(
	nome_registo varchar(50) not null,
	nome_tipo varchar(50) not null,
	primary key (nome_registo, nome_tipo),
	foreign key nome_tipo references Tipos_Registo (nome_tipo),
	foreign key (nome_registo, nome_tipo) references Registos(nome_registo, nome_tipo)
	);

create table Tem_Campos
	(
	nome_tipo varchar(50) not null,
	nome_campo varchar(50) not null,
	primary key (nome_tipo, nome_campo),
	foreign key (nome_tipo) references Tipos_Registo (nome_tipo),
	foreign key (nome_campo, nome_tipo) references Campos (nome_campo, nome_tipo)
	);

create table Altera_Campo
	(
	nome_campo varchar(50) not null,
	nome_tipo varchar(50) not null,
	data timestamp not null,
	alteracao_c varchar(255)
	primary key (nome_campo, nome_tipo, data),
	foreign key (nome_tipo) references Tipos_Registo (nome_tipo),
	foreign key (nome_campo, nome_tipo) references Campos (nome_campo, nome_tipo),
	foreign key (data) references Logs(l_date)	
	);

create table Altera_Pagina
	(
	nome_pagina varchar(50) not null,
	data datetime not null,
	alteracao_p varchar(255)
	primary key (nome_pagina, data)
	foreign key (nome_pagina) references Paginas (nome_pagina),
	foreign key (data) references Logs(l_date)
	);

create table Altera_Registo
	(
	nome_registo varchar(50) not null,
	nome_tipo varchar(50) not null,
	data timestamp not null,
	alteracao_r varchar(255) not null,
	primary key (nome_registo, nome_tipo, data),
	foreign key (data) references Logs(l_date),
	foreign key (nome_registo, nome_tipo) references Registos(nome_registo, nome_tipo)
	foreign key (nome_tipo) references Tipos_Registo(nome_tipo)
	);

create table Altera_Tipo
	(
	data timestamp not null,
	nome_tipo varchar(50) not null,
	alteracao_t varchar(255),
	primary key (data, nome_tipo),
	foreign key (data) references Logs(l_date),
	foreign key (nome_tipo) references Tipos_Registo(nome_tipo)
	);

