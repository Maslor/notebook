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

	)

