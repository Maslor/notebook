select nome_tipo 
from Editam natural join Contem_Registos
where mail='comba@mal.com';

select distinct mail
from Loga natural join Login
where sucesso='nao';

select data_nasc 
from Pessoas 
where mail in (
	select mail 
	from Contem_Registos 
	natural join Editam
	where nome_pagina = 'facebook' 
	and mail in (
		select mail 
		from Contem_Registos 
		natural join Editam 
		where nome_registo = 'facebook'));
