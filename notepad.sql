/*
Pessoas(mail, nome, password, data_nasc)
Blocos_Notas(app_id)
Registos(nome_registo)
Paginas(nome_pagina)
Tipos_Registo(nome_tipo)
Logs(date)
Campos(<<nome_campo>>)

Regista(app_id, mail, data_registo, pergunta1, pergunta2, resposta1, resposta2)
	app_id: FK(Bloco_Notas(app_id))
	mail: FK(Pessoa(mail))
Contem(nome_pagina, nome_registo, nome_tipo)
	nome_pagina: FK(Paginas(nome_pagina)
	nome_registo, nome_tipo: FK(Registos(nome_registo, nome_tipo))
	nome_tipo: FK(Tipos_Registo(nome_tipo))
Pertence(nome_registo, nome_tipo)
	nome_registo, nome_tipo: FK(Registos(nome_registo, nome_tipo))
	nome_tipo: FK(Tipo_Registo(nome_tipo))
Tem(nome_tipo, nome_campo)
	nome_tipo: FK(Tipos_Registo(nome_tipo))
	nome_tipo, nome_campo: FK(Campos(nome_campo))
Altera_Campo(nome_campo, nome_tipo, data)
	data: FK(Logs(data))
	nome_tipo: FK(Tipos_Registo(nome_tipo))
Altera_Pagina(nome_pagina, data)
 	nome_pagina: FK(Paginas(nome_pagina))
	data: FK(Logs(data))
Altera_Registo(nome_registo, nome_tipo, data)
	nome_tipo, nome_registo: FK(Registos(nome_tipo, nome_registo))
	data: FK(data: FK(Logs(data))
Altera_Tipo(data, nome_tipo)
	data: FK(Logs(data))
	nome_tipo: FK(Tipos_Registo(nome_tipo))
Login(data, mail)
	data: FK(Logs(data))
	mail: FK(Pessoas(mail))
Editam(nome_pagina, app_id, mail)
	mail: FK(Pessoas(mail))
	app_id: FK(Bloco_Notas(app_id))
	
*/

create table People
	(
	P_mail varchar(50) not null unique,
	P_name varchar(20),
	P_password varchar(100),
	P_bdate varchar(11),
	primary key (P_mail)
	);

create table Notepads
	(
	N_id int not null unique,
	primary key (N_id)
	);

create table Logs
	(
	L_date timestamp not null unique,
	primary key (L_date)
	);

create table Pages
	(
	PG_name varchar(50) not null,
	primary key(PG_name)
	);

create table Record_Types
	(
	T_name varchar(50) not null,
	primary key (T_id)
	);

create table Records
	(
	R_name varchar(50) not null
	);

create table Fields
	(
	F_name varchar(50) not null
	);

create table Registers
	(
	app_id int not null,
	mail varchar(50) not null,
	r_date varchar(50),
	question1 varchar(255),
	question2 varchar(255),
	answer1 varchar(255),
	answer2 varchar(255),
	primary key (app_id, mail),
	foreign key (app_id) references Notepads(N_id)
	);

create table Contains
	(
	page_name varchar(50) not null,
	reg_name varchar(50) not null,
	type_name varchar(50) not null,
	primary key (page_name, reg_name, type_name),
	foreign key (page_name) references Pages (PG_name),
	foreign key (reg_name) references Records (R_name),
	foreign key (type_name) references Record_Types (T_name)	
	);

create table Belongs
	(
	reg_name varchar(50) not null,
	type_name varchar(50) not null,
	primary key (reg_name, type_name),
	foreign key (reg_name) references Records (R_name),
	foreign key (type_name) references Record_Types (T_name)
	);

create table Has_Fields
	(
	type_name varchar(50) not null,
	field_name varchar(50) not null,
	primary key (type_name, field_name),
	foreign key (type_name) references Record_Types (T_name),
	foreign key (type_name, field_name) references (Record_Types(T_name), Fields(F_name))
	);

create table Alters_Field
	(
	field_name varchar(50) not null,
	type_name varchar(50) not null,
	a_date timestamp not null,
	primary key (field_name, type_name, a_date),
	foreign key (a_date) references Logs (L_date),
	foreign key (type_name) references Record_Types(R_name)
	);

create table Alters_Page
	(
	page_name varchar(50) not null,
	a_date timestamp not null,
	primary key (page_name, a_date),
	foreign key (a_date) references Logs(L_date)
	);
	
create table Alters_Record
	(
	reg_name varchar(50) not null,
	type_name varchar(50) not null,
	a_date timestamp not null,
	primary key (reg_name, type_name, a_date),
	foreign key (type_name, reg_name) references (Record_Types(T_name), Records(R_name)),
	foreign key (a_date) references Logs(L_date)
	);

create table Alters_Type
	(
	a_date timestamp not null,
	type_name varchar(50) not null,
	primary key (a_date, type_name),
	foreign key (a_date) references Logs(L_date),
	foreign key (type_name) references Record_Types(R_name)
	);

create table Login
	(
	s_date timestamp not null,
	mail varchar(100) not null,
	primary key (s_date, mail),
	foreign key (s_date) references Logs(L_date),
	foreign key (mail) references People(P_mail)
	);

create table Edits
	(
	page_name varchar(50) not null,
	app_id int not null,
	mail varchar(100) not null,
	primary key(page_name, app_id, mail),
	foreign key (mail) references People(P_mail),
	foreign key (app_id) references Notepads(N_id)
	);



insert into People values ('gffsac@hotmail.com','Gabriel Freire', '1234', 'Quem é o gato?','wat?','27/07/1995');
insert into People values ('vultas@lol.com','João Vultos', '1234', 'Quem é o Champ?','huehue?','xx/xx/xxxx');
insert into People values ('ffernandes@saca.com','Filipe Fernandes', '1234', 'Quem cortou o pão?', 'eh?','xx/xx/xxxx');

insert into Notepad values (1,'gffsac@hotmail.com');
insert into Notepad values (2,'vultas@lol.com');
insert into Notepad values (3,'ffernandes@saca.com');
insert into Notepad values (4,'toni@fake.com');

insert into Record_Types values ('amigos',1);
insert into Record_Types values ('damas',1);
insert into Record_Types values ('gajas',3);
insert into Record_Types values ('champs',2);	
insert into Record_Types values ('madskillz',2);
insert into Record_Types values ('strippers',3);

insert into Records values ('monica','strippers');
