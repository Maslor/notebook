select nome_tipo 
from Editam natural join Contem_Registos
where mail='comba@mal.com';

select mail
from Loga natural join Login
where sucesso='nao';

select data_nasc
from Pessoas natural join Contem_Registos natural join Editam
where nome_pagina='facebook' and nome_registo='facebook';

