/*
Páginas(bid, trid, name)
	bid: FK(Bloco_de_Notas)
	trid: FK(Tipo_de_Registo)

Tipo_de_Registo(bid, trid)
	bid: FK(Bloco_de_Notas)

Bloco_de_Notas(uid, bid)
	uid: FK(Pessoas) 

Pessoas(uid, nome, data_nasc, password, safety_question)

Logs(uid)
	uid: FK(Pessoas) 
*/

create table Pessoas
	(
	P_Id varchar(50) not null unique,
	P_Name varchar(20),
	P_Password varchar(100) not null,
	P_SQuestion1 varchar(100) not null,
	P_SQuestion2 varchar(100),
	P_Date varchar(11),
	primary key (P_Id)
	);

create table Blocos_de_Notas
	(
	BN_Id int not null unique,
	BN_User varchar(50) not null,
	primary key (BN_Id),
	foreign key (BN_User) references Pessoas(P_Id)
	);

create table Logs
	(
	L_uid varchar(50) not null,
	L_id int not null unique,
	L_description varchar(255),
	primary key (L_id),
	foreign key (L_uid) references Pessoas(P_Id)
	);

create table Tipo_de_Registo
	(
	T_id varchar(50) not null,
	T_bid int not null,
	primary key (T_id),
	foreign key (T_bid) references Blocos_de_Notas(BN_Id)
	);


insert into Pessoas values ('gffsac@hotmail.com','Gabriel Freire', '1234', 'Quem é o gato?','wat?','27/07/1995');
insert into Pessoas values ('vultas@lol.com','João Vultos', '1234', 'Quem é o Champ?','huehue?','xx/xx/xxxx');
insert into Pessoas values ('ffernandes@saca.com','Filipe Fernandes', '1234', 'Quem cortou o pão?', 'eh?','xx/xx/xxxx');

insert into Blocos_de_Notas values (1,'gffsac@hotmail.com');
insert into Blocos_de_Notas values (2,'vultas@lol.com');
insert into Blocos_de_Notas values (3,'ffernandes@saca.com');

insert into Tipo_de_Registo values ('amigos',1);
insert into Tipo_de_Registo values ('damas',1);
insert into Tipo_de_Registo values ('gajas',3);
insert into Tipo_de_Registo values ('champs',2);	
insert into Tipo_de_Registo values ('madskillz',2);
insert into Tipo_de_Registo values ('monica',3);
