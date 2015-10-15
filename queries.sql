insert into Pessoas values ('gffsac@hotmail.com', 'Gabriel', '1234', '1995-07-27', 'resposta1', 'resposta2');
insert into Pessoas values ('fabricio@hotmail.com', 'Fabricio', '1234', '1997-01-30', 'resposta1', 'resposta2');
insert into Pessoas values ('comba@mal.com', 'Matue', '1234', '1994-09-06', 'resposta1', 'resposta2');
insert into Pessoas values ('afinfa@naco.com', 'Jose', '1234', '1969-06-09', 'resposta1', 'resposta2');

insert into Paginas values ('As minhas contas');
insert into Paginas values ('aulas no tecnico');
insert into Paginas values ('notas provas aval');
insert into Paginas values ('amigos e companhia');
insert into Paginas values ('a minha horta');

insert into Tipos_Registo values ('contas');
insert into Tipos_Registo values ('aulas');
insert into Tipos_Registo values ('notas');
insert into Tipos_Registo values ('amigos');
insert into Tipos_Registo values ('galinhas');

insert into Registos values ('maria', 'galinhas');
insert into Registos values ('poedeira', 'galinhas');
insert into Registos values ('casa', 'contas');
insert into Registos values ('ferias', 'contas');
insert into Registos values ('EO - Facil', 'notas');
insert into Registos values ('EO - Facil', 'aulas');
insert into Registos values ('filipao', 'amigos');

insert into Campos values ('divida', 'contas');
insert into Campos values ('lucro', 'contas');
insert into Campos values ('balance', 'contas');
insert into Campos values ('disciplina', 'aulas');
insert into Campos values ('prof', 'aulas');
insert into Campos values ('trabalho', 'aulas');
insert into Campos values ('idade', 'galinhas');
insert into Campos values ('tipo', 'galinhas');
insert into Campos values ('tropas', 'amigos');
insert into Campos values ('colegas', 'amigos');
insert into Campos values ('falsos', 'amigos');
insert into Campos values ('positiva', 'notas');
insert into Campos values ('negativa', 'notas');

insert into Editam values ('aulas no tecnico', 'gffsac@hotmail.com');
insert into Editam values ('As minhas contas', 'gffsac@hotmail.com');
insert into Editam values ('notas provas aval', 'fabricio@hotmail.com');
insert into Editam values ('amigos e companhia', 'comba@mal.com');
insert into Editam values ('a minha horta', 'afinfa@naco.com');

insert into Contem_Registos values ('amigos e companhia', 'filipao', 'amigos');

insert into Login values ('2015-08-12 14:23:01', 'sim');
insert into Login values ('2015-09-03 16:41:23', 'sim');
insert into Login values ('2015-10-07 22:43:38', 'sim');
insert into Login values ('2015-10-10 23:55:56', 'nao');
insert into Login values ('2015-10-10 23:56:59', 'nao');
insert into Login values ('2015-10-10 23:57:30', 'sim');

insert into Loga values ('2015-08-12 14:23:01', 'gffsac@hotmail.com');
insert into Loga values ('2015-09-03 16:41:23', 'fabricio@hotmail.com');
insert into Loga values ('2015-10-07 22:43:38', 'afinfa@naco.com');
insert into Loga values ('2015-10-10 23:55:56', 'comba@mal.com');
insert into Loga values ('2015-10-10 23:56:59', 'comba@mal.com');
insert into Loga values ('2015-10-10 23:57:30', 'comba@mal.com');

